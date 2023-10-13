<?php

namespace Database\Seeders;

use App\Modules\Transaction\Jobs\SyncDataFromProviderJob;
use Illuminate\Database\Seeder;

class TransactionsSeeder extends Seeder
{
    public function run(): void
    {
        dump('Start Seeding Transactions Data From Providers In Background');
        SyncDataFromProviderJob::dispatch();
        dump('Seeding Transactions Data From Providers Job Started , The process Will Be Done Soon');

    }
}
