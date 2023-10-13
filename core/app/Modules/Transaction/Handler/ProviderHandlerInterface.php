<?php

namespace App\Modules\Transaction\Handler;

interface ProviderHandlerInterface
{

    public function prepareObjectBeforeCreate($providerData): void;
}
