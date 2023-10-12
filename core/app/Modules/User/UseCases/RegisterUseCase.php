<?php

namespace App\Modules\User\UseCases;

use App\Modules\BaseApp\Enums\BaseAppEnums;
use App\Modules\Notification\UseCases\SendUserNotifications;
use App\Modules\User\Repositories\UserRepository;
use App\Modules\User\UsersEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUseCase
{
    public function register($data)
    {
        $data['language'] = config('app.locale');
        $user =  (new UserRepository())->create($data);
        (new SendUserNotifications())->sendActivationCode($user);
        return [
            'status' => BaseAppEnums::SUCCESS,
            'message' => 'User Registered successfully.',
            'code' => 200,
            'data' => [
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
                'detail' => trans('auth.There is no account with this email'),
                'code' => 404,
                'data' => []
            ];
        }

        if ($user->type != UsersEnum::USER) {
            return [
                'status' => BaseAppEnums::ERROR,
                'message' => 'Trying to login with not valid user type account',
                'detail' => trans('auth.Trying to login with not valid user type account'),
                'code' => 406,
                'data' => []
            ];
        }


        if (!Hash::check(trim($request['password']), $user->password)) {
            return [
                'status' => BaseAppEnums::ERROR,
                'message' => 'Trying to login with invalid password',
                'detail' => trans('auth.Trying to login with invalid password'),
                'code' => 406,
                'data' => []
            ];
        }

//        if (!$user->is_active) {
//            return [
//        'status' => BaseAppEnums::ERROR,
//                'message' => 'This account is banned',
//                'detail' => trans('auth.This account is banned'),
//                'code' => 406,
//                'data' => []
//            ];
//        }

//        if (!$user->confirmed) {
//            return [
//        'status' => BaseAppEnums::ERROR,
//                'message' => 'This account is not confirmed',
//                'detail' => trans('auth.This account is not confirmed'),
//                'code' => 406,
//                'data' => []
//            ];
//        }
        return [];
    }

}
