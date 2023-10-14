<?php

namespace App\Modules\User\Api\Controller;

use App\Modules\BaseApp\Api\BaseApiController;
use App\Modules\BaseApp\Enums\ResourceEnums;
use App\Modules\User\Repositories\UserRepository;
use App\Modules\User\Resources\UserCollection;
use App\Modules\User\Transformers\UserTransformer;

class UsersController extends BaseApiController
{


    public function getUsers()
    {
        $users = (new UserRepository())->list(request()->all());
        //in case you want to see transformer response
        if (request()->returnTransformer) {
            return $this->transformDataModInclude(
                $users,
                'actions',
                new UserTransformer(),
                ResourceEnums::USER,
                ''
            );
        }
        return customResponse(new UserCollection($users), "User Data");

    }
}
