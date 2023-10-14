<?php

namespace Tests\Unit\Modules\Transaction\UseCase;

use App\Modules\Transaction\UseCase\TransactionUseCase;
use Illuminate\Support\Facades\File; // Import the File facade
use Tests\TestCase;

class TransactionUseCaseTest extends TestCase
{
    public function testSyncDataFromDataProvider()
    {
        dump('test_sync_data_from_data_provider');
        $provider = 'YourProviderName';

        $jsonContent = [];
        $jsonContentString = json_encode($jsonContent);
        $providerDataSourcePath = database_path('seeders/data/' . $provider . '.json');

        File::shouldReceive('exists')
            ->with($providerDataSourcePath)
            ->andReturn(true);

        File::shouldReceive('get')
            ->with($providerDataSourcePath)
            ->andReturn($jsonContentString);

        $providerHandlerClass = 'App\Providers\YourProviderHandlerClass'; // Replace with the actual provider handler class.
        app()->bind($providerHandlerClass, function () use ($providerHandlerClass) {
            return new class($providerHandlerClass) {
                public function prepareObjectBeforeCreate($providerData) {
                }
            };
        });
        $transactionUseCase = new TransactionUseCase();
        $transactionUseCase->syncDataFromDataProvider();
        $this->assertTrue(true);
    }
}
