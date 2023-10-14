<?php

namespace Feature\User\Api\Controller;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersControllerTest extends TestCase
{
    use WithFaker;
    public function testGetUsersResponseTransformerCase()
    {
        dump('test_get_users_response_transformer_case');
        $url = "/api/v1/users?returnTransformer=true";
        $response = $this->getJson($url);
        $response->assertOk();
        $response->assertJsonStructure(
            [
                "data" => [
                    [
                        "type",
                        "id",
                        "attributes" => [
                            "name",
                            "email"
                        ],
                        "relationships" => [
                            "transactions" => [
                                "data" => [
                                    [
                                        "type",
                                        "id"
                                    ]
                                ]
                            ]
                        ]
                    ]
                ],
                "included" => [

                ]
            ]
        );
    }
    public function testGetUsersResponseResourceCase()
    {
        dump('test_get_users_response_resource_case');
        $url = "/api/v1/users";
        $response = $this->getJson($url);
        $response->assertOk();
        $response->assertJsonStructure(
            [
                "data" => [
                    "data" => [
                        [
                            "id",
                            "name",
                            "email",
                            "transactions"=>[
                                [
                                    "id",
                                    "currency",
                                    "amount",
                                    "status",
                                    "parent_id",
                                    "provider"
                                ]
                            ]
                        ]
                    ],
                    "current_page",
                    "is_last_page",
                    "is_last_page",
                    "path",
                    "per_page",
                    "total"
                ],
                "message",
                "status_code"
            ]
        );
    }
    public function testGetUsersFilterByProviderCase()
    {
        dump('test_get_users_filter_by_provider_case');
        $url = "/api/v1/users?provider=DataProviderX";
        $response = $this->getJson($url);
        $response->assertOk();
        $response->assertJsonStructure(
            [
                "data" => [
                    "data" => [
                        [
                            "id",
                            "name",
                            "email",
                            "transactions"=>[
                                [
                                    "id",
                                    "currency",
                                    "amount",
                                    "status",
                                    "parent_id",
                                    "provider"
                                ]
                            ]
                        ]
                    ],
                    "current_page",
                    "is_last_page",
                    "is_last_page",
                    "path",
                    "per_page",
                    "total"
                ],
                "message",
                "status_code"
            ]
        );
    }
    public function testGetUsersFilterByStatusCodeCase()
    {
        dump('test_get_users_filter_by_status_code_case');
        $url = "/api/v1/users?statusCode=authorised";
        $response = $this->getJson($url);
        $response->assertOk();
        $response->assertJsonStructure(
            [
                "data" => [
                    "data" => [
                        [
                            "id",
                            "name",
                            "email",
                            "transactions"=>[
                                [
                                    "id",
                                    "currency",
                                    "amount",
                                    "status",
                                    "parent_id",
                                    "provider"
                                ]
                            ]
                        ]
                    ],
                    "current_page",
                    "is_last_page",
                    "is_last_page",
                    "path",
                    "per_page",
                    "total"
                ],
                "message",
                "status_code"
            ]
        );
    }
    public function testGetUsersFilterByCurrencyCodeCase()
    {
        dump('test_get_users_filter_by_currency_code_case');
        $url = "/api/v1/users?currency=USD";
        $response = $this->getJson($url);
        $response->assertOk();
        $response->assertJsonStructure(
            [
                "data" => [
                    "data" => [
                        [
                            "id",
                            "name",
                            "email",
                            "transactions"=>[
                                [
                                    "id",
                                    "currency",
                                    "amount",
                                    "status",
                                    "parent_id",
                                    "provider"
                                ]
                            ]
                        ]
                    ],
                    "current_page",
                    "is_last_page",
                    "is_last_page",
                    "path",
                    "per_page",
                    "total"
                ],
                "message",
                "status_code"
            ]
        );
    }
    public function testGetUsersFilterByBalanceOfAmountCase()
    {
        dump('test_get_users_filter_by_balance_of_amount_case');
        $url = "/api/v1/users?balanceMin=10&balanceMax=100";
        $response = $this->getJson($url);
        $response->assertOk();
        $response->assertJsonStructure(
            [
                "data" => [
                    "data" => [
                        [
                            "id",
                            "name",
                            "email",
                            "transactions"=>[
                                [
                                    "id",
                                    "currency",
                                    "amount",
                                    "status",
                                    "parent_id",
                                    "provider"
                                ]
                            ]
                        ]
                    ],
                    "current_page",
                    "is_last_page",
                    "is_last_page",
                    "path",
                    "per_page",
                    "total"
                ],
                "message",
                "status_code"
            ]
        );
    }

    public function testGetUsersFilterByAllFiltersCase()
    {
        dump('test_get_users_filter_by_all_filters_case');
        $url = "/api/v1/users?provider=DataProviderX&statusCode=authorised&currency=USD&balanceMin=10&balanceMax=100";
        $response = $this->getJson($url);
        $response->assertOk();
    }

}
