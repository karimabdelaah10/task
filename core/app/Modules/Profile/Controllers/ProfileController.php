<?php

namespace App\Modules\Profile\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\BaseApp\Enums\BaseAppEnums;
use App\Modules\Profile\Requests\EditProfileRequest;
use App\Modules\User\Repositories\UserRepository;
use App\Modules\User\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(
        private readonly string $moduleParent = 'admin',
        private readonly string $moduleName = BaseAppEnums::PROFILE_MODULE_PREFIX,
        private User            $model = new User()
    )
    {
    }


    public function getEdit()
    {
        $data['pageTitle'] = __($this->moduleName . '.edit_profile');
        $data['breadcrumb'] = [
            __($this->moduleName . '.edit_profile') => null
        ];
        $data['moduleName'] = str($this->moduleName)->upper();
        $data['row'] = auth()->user();
        return view($this->moduleParent . '.' . $this->moduleName . '.edit', $data);
    }

    public function postUpdate(EditProfileRequest $request)
    {
        $user = auth()->user();
        if ((new UserRepository())->update($request->all(), $user->id)) {
            $toastr = [
                'type' => BaseAppEnums::SUCCESS,
                'message' => __(BaseAppEnums::PROFILE_MODULE_PREFIX . '.profile_updated_message'),
                'title' => __(BaseAppEnums::PROFILE_MODULE_PREFIX . '.profile_updated_title'),
            ];
            return back()->with('toastr', $toastr);
        }
        $toastr = [
            'type' => BaseAppEnums::ERROR,
            'message' => __(BaseAppEnums::APP_PREFIX . '.something_went_wrong_message'),
            'title' => __(BaseAppEnums::APP_PREFIX . '.something_went_wrong_title'),
        ];


        return back()->with('toastr', $toastr);
    }
}
