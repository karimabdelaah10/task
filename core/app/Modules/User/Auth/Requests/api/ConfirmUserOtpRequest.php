<?php

namespace App\Modules\User\Auth\Requests\api;


use App\Modules\BaseApp\Requests\BaseApiParserRequest;

class ConfirmUserOtpRequest extends BaseApiParserRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'attributes.otp' => 'required|string|exists:users,otp'
        ];
    }
}
