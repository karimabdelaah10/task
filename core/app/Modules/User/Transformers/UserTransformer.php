<?php

namespace App\Modules\User\Transformers;

use App\Modules\BaseApp\Enums\ResourceEnums;
use App\Modules\Country\Transformers\CountryTransformer;
use App\Modules\User\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    protected array $defaultIncludes = [
        'transactions',
    ];
    protected array $availableIncludes = [];

    public function transform(User $user)
    {
        return [
            'id' => (int)$user->id,
            'name' => (string)$user->name,
            'email' => (string)$user->email,
        ];
    }

    public function includeTransactions(User $user)
    {
        $transactions = [];
        if (count($user->transactions)) {
            $transactions = $user->transactions;
        }
        return $this->collection($transactions, new TransactionTransformer(), ResourceEnums::TRANSACTION);
    }
}
