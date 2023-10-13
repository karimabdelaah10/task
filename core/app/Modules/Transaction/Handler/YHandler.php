<?php

namespace App\Modules\Transaction\Handler;

use App\Modules\Transaction\Enum\FactoryEnum;
use App\Modules\Transaction\Enum\TransactionEnum;
use App\Modules\Transaction\Repositories\TransactionRepository;
use App\Modules\User\Repositories\UserRepository;
use Carbon\Carbon;

class YHandler implements ProviderHandlerInterface
{

    public function prepareObjectBeforeCreate($providerData): void
    {
        if (is_array($providerData) && count($providerData)) {
            foreach ($providerData as $providerDataObject) {
                $user = (new UserRepository())->firstOrCreate($providerDataObject->email);
                $data = [
                    'amount' => $providerDataObject->balance,
                    'currency' => $providerDataObject->currency,
                    'user_id' => $user->id,
                    'status' => $this->parseStatus($providerDataObject->status),
                    'created_at' => Carbon::createFromFormat('d/m/Y', $providerDataObject->created_at)->format('Y-m-d'),
                    'parent_id' => $providerDataObject->id,
                    'provider' => FactoryEnum::DATA_PROVIDER_Y,
                ];
                (new TransactionRepository())->updateOrCreate($data);
            }
        }
    }

    private function parseStatus($statusCode): string
    {
        $statusesMap = [
            '100' => TransactionEnum::AUTHORISED,
            '200' => TransactionEnum::DECLINE,
            '300' => TransactionEnum::REFUNDED,
        ];
        return $statusesMap[$statusCode];
    }
}
