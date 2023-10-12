<?php

namespace App\Modules\Country\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\BaseApp\Enums\BaseAppEnums;
use App\Modules\Country\Admin\Requests\CountryRequest;
use App\Modules\Country\Country;
use App\Modules\Country\Repositories\CountryRepository;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function __construct(
        private readonly string $moduleParent = 'admin',
        private readonly string $moduleName = BaseAppEnums::COUNTRY_MODULE_PREFIX,
        private Country         $model = new Country()
    )
    {
    }

    public function index()
    {
        $data['pageTitle'] = __($this->moduleName . '.list_countries');
        $data['breadcrumb'] = [
            $this->moduleName => null
        ];
        $data['moduleName'] = str($this->moduleName)->upper();
        $data['rows'] = (new CountryRepository())->list(pagination: true);
        return view($this->moduleParent . '.' . $this->moduleName . '.index', $data);
    }

    public function show()
    {
        dd('show country');
    }

    public function getCreate()
    {
        $data['pageTitle'] = __($this->moduleName . '.create_new_country');
        $data['breadcrumb'] = [
            $this->moduleName => route($this->moduleName . '.index'),
            __($this->moduleName . '.create_new_country') => null
        ];
        $data['moduleName'] = str($this->moduleName)->upper();
        $data['row'] = $this->model;
        return view($this->moduleParent . '.' . $this->moduleName . '.create', $data);

    }

    public function postCreate(CountryRequest $request)
    {
        if ((new CountryRepository())->create($request->all())) {
            return back()->with('toastr', [
                'type' => BaseAppEnums::SUCCESS,
                'message' => __(BaseAppEnums::COUNTRY_MODULE_PREFIX . '.create_new_country_success_message'),
                'title' => __('app.success_message_title'),
            ]);
        }
        return back()->with('toastr', [
            'type' => BaseAppEnums::ERROR,
            'message' => __('app.something_went_wrong_message'),
            'title' => __('app.something_went_wrong_title'),
        ]);
    }

    public function getEdit($countryId)
    {
        $data['pageTitle'] = __($this->moduleName . '.edit_country_details');
        $data['breadcrumb'] = [
            $this->moduleName => route($this->moduleName . '.index'),
            __($this->moduleName . '.edit_country_details') => null
        ];
        $data['moduleName'] = str($this->moduleName)->upper();
        $data['row'] = (new CountryRepository())->findOrFail($countryId);
        return view($this->moduleParent . '.' . $this->moduleName . '.edit', $data);
    }

    public function postUpdate(CountryRequest $request, $countryId)
    {
        if ((new CountryRepository())->update($request->all(), $countryId)) {
            return back()->with('toastr', [
                'type' => BaseAppEnums::SUCCESS,
                'message' => __(BaseAppEnums::COUNTRY_MODULE_PREFIX . '.create_new_country_success_message'),
                'title' => __('app.success_message_title'),
            ]);
        }
        return back()->with('toastr', [
            'type' => BaseAppEnums::ERROR,
            'message' => __('app.something_went_wrong_message'),
            'title' => __('app.something_went_wrong_title'),
        ]);
    }

    public function delete($countryId)
    {
        if ((new CountryRepository())->delete($countryId)) {
            return back()->with('toastr', [
                'type' => BaseAppEnums::SUCCESS,
                'message' => __(BaseAppEnums::COUNTRY_MODULE_PREFIX . '.delete_country_success_message'),
                'title' => __('app.success_message_title'),
            ]);
        }
        return back()->with('toastr', [
            'type' => BaseAppEnums::ERROR,
            'message' => __('app.something_went_wrong_message'),
            'title' => __('app.something_went_wrong_title'),
        ]);
    }
}
