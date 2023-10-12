<?php

namespace App\Modules\BaseApp\Providers;

use Illuminate\Support\ServiceProvider;
use Swis\JsonApi\Client\Interfaces\ParserInterface;
use Swis\JsonApi\Client\Parsers\DocumentParser;

class MattressServiceProvider  extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->scoped(ParserInterface::class, DocumentParser::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
