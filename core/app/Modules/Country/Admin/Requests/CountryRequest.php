<?php

namespace App\Modules\Country\Admin\Requests;

use App\Modules\BaseApp\Requests\BaseAppRequest;

class CountryRequest extends BaseAppRequest
{
    public function rules()
    {
        $rules = [
            'name:ar' => 'required|min:3|max:191',
            'name:en' => 'required|min:3|max:191',
            'currency_code:ar' => 'required|min:3|max:191',
            'currency_code:en' => 'required|min:3|max:191',
            'country_code' => 'required|min:2|max:3|unique:countries,country_code,' . $this->id,
            'is_active' => 'required|in:0,1',
        ];
        if (empty($this->id)) {
            $rules['flag'] = 'required|image|mimes:jpg,png,jpeg|max:2048';
        }

        return $rules;
    }
}
