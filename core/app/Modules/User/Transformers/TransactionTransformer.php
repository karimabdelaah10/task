<?php

namespace App\Modules\User\Transformers;

use App\Modules\BaseApp\Enums\ResourceEnums;
use App\Modules\Country\Transformers\CountryTransformer;
use App\Modules\Transaction\Transaction;
use App\Modules\User\User;
use League\Fractal\TransformerAbstract;

class TransactionTransformer extends TransformerAbstract
{
    protected array $defaultIncludes = [];
    protected array $availableIncludes = [];

    public function transform(Transaction $transaction)
    {
        return [
            'id'=>$transaction->id,
            'parent_id' => $transaction->parent_id,
            'amount' => $transaction->amount,
            'currency' => $transaction->currency,
            'status' => $transaction->status,
            'provider' => $transaction->provider,
            'created_at' => $transaction->created_at,
        ];
    }
}
