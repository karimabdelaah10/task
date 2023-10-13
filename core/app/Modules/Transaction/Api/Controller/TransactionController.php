<?php

namespace App\Modules\Transaction\Api\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Transaction\Enum\FactoryEnum;
use App\Modules\Transaction\Repositories\TransactionRepository;
use App\Modules\User\Repositories\UserRepository;
use Illuminate\Support\Facades\File;

class TransactionController extends Controller
{


    public function index()
    {
        $users = (new UserRepository())->list(
            pagination: true,
            callback: function ($query) {
                $query->whereHas('transactions', function ($quer) {
                    $quer->when(request()->provider, function ($q) {
                        $q->where('provider', request()->provider);
                    });
                    $quer->when(request()->statusCode, function ($q) {
                        $q->where('status_code', request()->statusCode);
                    });
                    $quer->when(request()->currency, function ($q) {
                        $q->where('currency', request()->currency);
                    });
                    $quer->when(request()->balanceMin, function ($q) {
                        $q->where('amount', '>=', request()->balanceMin);
                    });
                    $quer->when(request()->balanceMax, function ($q) {
                        $q->where('amount', '<=', request()->balanceMax);
                    });
                });
            },
            limit: 40);
        dd($users);
    }

    public function ReloadContent()
    {
        $providers = FactoryEnum::getProvidersPerfixes();
        foreach ($providers as $provider) {
            $providerDataSourcePath = database_path('seeders/data/' . $provider . '.json');
            if (!File::exists($providerDataSourcePath)) {
                continue;
            }
            $jsonContent = json_decode(file_get_contents($providerDataSourcePath));
            $providerHandlerClass = FactoryEnum::getProviderHandlerClass($provider);
            app($providerHandlerClass)->prepareObjectBeforeCreate(providerData: $jsonContent);
        }
    }
}
