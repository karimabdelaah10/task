<?php

namespace App\Modules\Country\Api\Controllers;

use App\Modules\BaseApp\Api\BaseApiController;
use App\Modules\BaseApp\Enums\ResourceEnums;
use App\Modules\Country\Repositories\CountryRepository;
use App\Modules\Country\Transformers\CountriesTransformer;
use Illuminate\Http\Request;
use Swis\JsonApi\Client\Interfaces\ParserInterface;

class CountryApiController extends BaseApiController
{
    public function __construct(
        private ParserInterface   $parserInterface,
        private CountryRepository $countryRepository
    )
    {
    }

    public function index()
    {
        $countries = $this->countryRepository->list(pagination: true, active: true);
        return $this->transformDataModInclude(
            $countries,
            '',
            CountriesTransformer::class,
            ResourceEnums::COUNTRY,
            ''
        );
    }

    public function stor(Request $request)
    {
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();
        $data = $data->getAttributes();
        $this->countryRepository->create($data);
        return response()->json([
            'meta' => [
                'message' => 'Country Created Successfully'
            ]
        ]);
    }
}
