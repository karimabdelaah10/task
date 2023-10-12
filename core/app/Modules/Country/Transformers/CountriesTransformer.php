<?php

namespace App\Modules\Country\Transformers;

use App\Modules\Country\Country;
use League\Fractal\TransformerAbstract;

class CountriesTransformer extends TransformerAbstract
{
    protected array $availableIncludes = [
        'government'
    ];
    protected array $defaultIncludes = [
    ];
    public function transform(Country $country){
        return[
            'id' => $country->id,
            'name' => $country->name,
            'country_code'=> $country->country_code,
            'flag'=> image($country->flag , 'large'),
            'is_active'=> $country->is_active,
            'created_at' => $country->created_at,
            'updated_at' => $country->updated_at,
        ];
    }

    public function includeGovernment(Country $country)
    {
        return $this->collection($country->government, new GovernmentTransformer() , 'government');
    }

}
