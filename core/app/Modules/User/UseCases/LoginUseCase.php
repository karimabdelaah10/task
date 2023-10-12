<?php

namespace App\Modules\User\UseCases;

use App\Modules\BaseApp\Enums\BaseAppEnums;
use App\Modules\User\Repositories\UserRepository;
use App\Modules\User\UsersEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginUseCase
{
    public function login($data)
    {
        $user = (new UserRepository())->findByEmail($data['email']);
        $validateLogin = $this->validateLogin($data, $user);

        if ($validateLogin) {
            return $validateLogin;
        }
        if (!$token = Auth::guard('api')->attempt($data)) {
            return [
                'status' => BaseAppEnums::ERROR,
                'message' => 'Unauthorized',
                'code' => 401,
                'data' => []
            ];
        }
        return [
            'status' => BaseAppEnums::SUCCESS,
            'message' => 'User Logged in successfully.',
            'code' => 200,
            'data' => [
                'token' => $token,
                'user' => $user,
            ]
        ];
    }

    private function validateLogin(array $request, $user): array
    {
        if (!$user) {
            return [
                'status' => BaseAppEnums::ERROR,
                'message' => 'There is no account with this email',
                'detail' => trans('app.There is no account with this email'),
                'code' => 404,
                'data' => []
            ];
        }

        if ($user->type != UsersEnum::USER) {
            return [
                'status' => BaseAppEnums::ERROR,
                'message' => 'Trying to login with not valid user type account',
                'detail' => trans('app.Trying to login with not valid user type account'),
                'code' => 406,
                'data' => []
            ];
        }


        if (!Hash::check(trim($request['password']), $user->password)) {
            return [
                'status' => BaseAppEnums::ERROR,
                'message' => 'Trying to login with invalid password',
                'detail' => __('app.Trying to login with invalid password'),
                'code' => 406,
                'data' => []
            ];
        }

        if (!$user->is_active) {
            return [
        'status' => BaseAppEnums::ERROR,
                'message' => 'This account is banned',
                'detail' => trans('app.This account is banned'),
                'code' => 406,
                'data' => []
            ];
        }

        if (!$user->confirmed) {
            return [
                'status' => BaseAppEnums::ERROR,
                'message' => 'This account is not confirmed',
                'detail' => __('app.This account is not confirmed'),
                'code' => 406,
                'data' => []
            ];
        }
        return [];
    }

    public function confirmOtp($otp)
    {
        $user = (new UserRepository())->findUserByOtp($otp);
        if (!$user) {
            return [
                'status' => BaseAppEnums::ERROR,
                'detail' => __('app.not valid otp'),
                'code' => 404,
                'data' => []
            ];
        }
        $user->update(
            [
                'confirmed' => true,
                'otp' => null
            ]);
        return [
            'status' => BaseAppEnums::SUCCESS,
            'detail' => __('app.User Confirmed in successfully'),
            'code' => 200,
        ];
    }

}
