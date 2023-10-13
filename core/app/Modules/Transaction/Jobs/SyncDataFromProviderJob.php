<?php

namespace App\Modules\Transaction\Jobs;

use App\Modules\Transaction\Enum\FactoryEnum;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;

class SyncDataFromProviderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $providers = FactoryEnum::getProvidersPerfixes();
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
