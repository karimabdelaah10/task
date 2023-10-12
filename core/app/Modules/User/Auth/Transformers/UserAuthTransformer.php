<?php

namespace App\Modules\User\Auth\Transformers;

use App\Modules\User\User;
use League\Fractal\TransformerAbstract;

class UserAuthTransformer extends TransformerAbstract
{
    protected array $defaultIncludes = [];
    protected array $availableIncludes = [];

    public function transform(User $user)
    {
        return [
            'id' => (int)$user->id,
            'name' => (string)$user->name,
            'language' => (string)$user->language,
            'mobile_number' => (string)$user->mobimobile_numberle,
            'profile_picture' => (string)image($user->profile_picture , 'large'),
            'email' => (string)$user->email,
            'is_active' => (boolean)$user->is_active,
            'confirmed' => (boolean)$user->confirmed,
        ];
    }
}
