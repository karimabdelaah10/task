<?php

namespace App\Modules\User\Auth\Requests\api;

use App\Modules\BaseApp\Requests\BaseApiParserRequest;

class RegisterApiRequest extends BaseApiParserRequest
{

    public function rules()
    {
        return [
            'attributes.name' => 'required|min:3|max:255',
            'attributes.mobile_number' => 'required|numeric|unique:users,mobile_number',
            'attributes.country_id' => 'required|exists:countries,id',
            'attributes.email' => 'required|email|unique:users,email',
            'attributes.password' => 'required|min:8|confirmed',
        ];
    }
}
