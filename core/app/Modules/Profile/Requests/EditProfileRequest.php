<?php

namespace App\Modules\Profile\Requests;

use App\Modules\BaseApp\Requests\BaseAppRequest;

class EditProfileRequest extends BaseAppRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'password' => 'nullable|min:8|confirmed',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ];
    }
}
