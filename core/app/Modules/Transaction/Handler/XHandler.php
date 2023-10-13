<?php

namespace App\Modules\Transaction\Handler;

use App\Modules\Transaction\Enum\FactoryEnum;
use App\Modules\Transaction\Enum\TransactionEnum;
use App\Modules\Transaction\Repositories\TransactionRepository;
use App\Modules\User\Repositories\UserRepository;
use Carbon\Carbon;

class XHandler implements ProviderHandlerInterface
{

    public function prepareObjectBeforeCreate($providerData): void
    {
        if (is_array($providerData) && count($providerData)) {
            foreach ($providerData as $providerDataObject) {
                $user = (new UserRepository())->firstOrCreate($providerDataObject->parentEmail);
                $data = [
                    'amount' => $providerDataObject->parentAmount,
                    'currency' => $providerDataObject->Currency,
                    'user_id' => $user->id,
                    'status' => $this->parseStatus($providerDataObject->statusCode),
                    'created_at' => Carbon::parse($providerDataObject->registerationDate)->format('Y-m-d'),
                    'parent_id' => $providerDataObject->parentIdentification,
                    'provider' => FactoryEnum::DATA_PROVIDER_X,
                ];
                (new TransactionRepository())->updateOrCreate($data);
            }
        }
    }

    private function parseStatus($statusCode): string
    {
        $statusesMap = [
            '1' => TransactionEnum::AUTHORISED,
            '2' => TransactionEnum::DECLINE,
            '3' => TransactionEnum::REFUNDED,
        ];
        return $statusesMap[$statusCode];
    }
}
