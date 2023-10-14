<?php

namespace App\Modules\Transaction\UseCase;

use App\Modules\Transaction\Enum\FactoryEnum;
use Illuminate\Support\Facades\File;

class TransactionUseCase
{
    public function syncDataFromDataProvider(): void
    {
        $providers = FactoryEnum::getProvidersPrefixes();
        foreach ($providers as $provider) {
            try {
                $providerDataSourcePath = database_path('seeders/data/' . $provider . '.json');
                if (!File::exists($providerDataSourcePath)) {
                    continue;
                }
                $jsonContent = json_decode(file_get_contents($providerDataSourcePath));
                $providerHandlerClass = FactoryEnum::getProviderHandlerClass($provider);
                app($providerHandlerClass)->prepareObjectBeforeCreate(providerData: $jsonContent);
            } catch (\Throwable $throwable) {
                continue;
            }
        }
    }
}
