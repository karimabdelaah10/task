<?php

namespace App\Modules\User\Auth\Api\Controllers;

use App\Modules\BaseApp\Api\BaseApiController;
use App\Modules\BaseApp\Enums\BaseAppEnums;
use App\Modules\BaseApp\Enums\ResourceEnums;
use App\Modules\User\Auth\Requests\api\ConfirmUserOtpRequest;
use App\Modules\User\Auth\Requests\api\LoginApiRequest;
use App\Modules\User\Auth\Requests\api\RegisterApiRequest;
use App\Modules\User\Auth\Transformers\UserAuthTransformer;
use App\Modules\User\UseCases\LoginUseCase;
use App\Modules\User\UseCases\LogoutUseCase;
use App\Modules\User\UseCases\RegisterUseCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Swis\JsonApi\Client\Interfaces\ParserInterface;

class AuthApiController extends BaseApiController
{
    public function __construct(
        public ParserInterface $parserInterface
    )
    {
        $this->middleware('auth:api', ['only' => ['logout']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginApiRequest $request)
    {
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();
        $userData['email'] = $data['attributes']['email'];
        $userData['password'] = $data['attributes']['password'];
        $useCase = (new LoginUseCase())->login($userData);
        if ($useCase['code'] == 200) {

            $meta = [
                'token' => $useCase['data']['token'],
                'message' => $useCase['message'],
            ];
            //send data to transformer
            return $this->transformDataModInclude($useCase['data']['user'],
                '',
                new UserAuthTransformer(),
                ResourceEnums::USER,
                $meta
            );
        } else {
            $errorArray = [
                'status' => $useCase['status'] ?? 422,
                'title' => $useCase['message'],
                'detail' => $useCase['detail'],
            ];
            return formatErrorValidation($errorArray);
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::guard('api')->logout();
            return response()->json(
                [
                    "meta" => [
                        'message' => trans('api.Successfully Logged Out')
                    ]
                ]
            );
        } catch (\Exception $e) {
            $errorArray = [
                'status' => $e->getCode(),
                'title' => $e->getMessage(),
                'detail' => $e->getTrace()
            ];
            return formatErrorValidation($errorArray, 500);
        }
    }

    public function register(RegisterApiRequest $request)
    {
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();
        $userData = [
            'name' => $data['attributes']['name'],
            'email' => $data['attributes']['email'],
            'password' => bcrypt(trim($data['attributes']['password'])),
            'mobile_number' => $data['attributes']['mobile_number'],
            'country_id' => $data['attributes']['country_id'],
        ];
        $useCase = (new RegisterUseCase())->register($userData);
        if ($useCase['code'] == 200) {
            return response()->json(
                [
                    'message' => trans('app.Thanks for registration')
                ]
            );
        } else {
            $errorArray = [
                'status' => $useCase['status'] ?? 422,
                'title' => $useCase['message'],
                'detail' => $useCase['detail'],
            ];
            return formatErrorValidation($errorArray);
        }
    }

    public function confirmOtp(ConfirmUserOtpRequest $request)
    {
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();
        $userData = [
            'otp' => $data['attributes']['otp'],
        ];
        $useCase = (new LoginUseCase())->confirmOtp($userData);
        if ($useCase['code'] == 200) {
            return response()->json(
                [
                    'message' => $useCase['detail']
                ]
            );
        } else {
            $errorArray = [
                'status' => $useCase['status'] ?? 422,
                'title' => $useCase['message'],
                'detail' => $useCase['detail'],
            ];
            return formatErrorValidation($errorArray);
        }
    }
}
