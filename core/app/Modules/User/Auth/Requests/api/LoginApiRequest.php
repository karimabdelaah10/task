<?php

namespace App\Modules\User\Auth\Requests\api;

use App\Modules\BaseApp\Requests\BaseApiParserRequest;

class LoginApiRequest extends BaseApiParserRequest
{

    public function rules()
    {
        return [
            'attributes.email' => 'required|email',
            'attributes.password' => 'required|min:8',
        ];
    }
}
