<?php

namespace App\Modules\Transaction\Enum;

enum TransactionEnum
{
    public const AUTHORISED = "authorised",
        DECLINE = "decline",
        REFUNDED = "refunded";
}
