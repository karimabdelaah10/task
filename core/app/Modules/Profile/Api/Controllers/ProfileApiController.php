<?php

namespace App\Modules\Profile\Api\Controllers;

use App\Modules\BaseApp\Api\BaseApiController;
use Swis\JsonApi\Client\Interfaces\ParserInterface;

class ProfileApiController extends BaseApiController
{
    public function __construct(
        private ParserInterface $parserInterface,
    )
    {
    }

    public function index()
    {

    }

}
