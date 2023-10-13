<?php

namespace App\Modules\User\Repositories;


use App\Modules\User\User;

class UserRepository
{
    public function __construct($user = null)
    {
        if ($user instanceof User) {
            $this->model = $user;
        } else {
            $this->model = new User();
        }
    }

    public function list($queryParams = [])
    {
        return $this->model
            ->query()
            ->whereHas('transactions', function ($quer) use ($queryParams) {
                $quer->when(!empty($queryParams['provider']), function ($q) use ($queryParams) {
                    $q->where('provider', $queryParams['provider']);
                });
                $quer->when(!empty($queryParams['statusCode']), function ($q) use ($queryParams) {
                    $q->where('status_code', $queryParams['statusCode']);
                });
                $quer->when(!empty($queryParams['currency']), function ($q) use ($queryParams) {
                    $q->where('currency', $queryParams['currency']);
                });
                $quer->when(!empty($queryParams['balanceMin']), function ($q) use ($queryParams) {
                    $q->where('amount', '>=', $queryParams['balanceMin']);
                });
                $quer->when(!empty($queryParams['balanceMax']), function ($q) use ($queryParams) {
                    $q->where('amount', '<=', $queryParams['balanceMax']);
                });
                return $quer;
            })
            ->with('transactions', function ($quer) use ($queryParams) {
                $quer->when(!empty($queryParams['provider']), function ($q) use ($queryParams) {
                    $q->where('provider', $queryParams['provider']);
                });
                $quer->when(!empty($queryParams['statusCode']), function ($q) use ($queryParams) {
                    $q->where('status_code', $queryParams['statusCode']);
                });
                $quer->when(!empty($queryParams['currency']), function ($q) use ($queryParams) {
                    $q->where('currency', $queryParams['currency']);
                });
                $quer->when(!empty($queryParams['balanceMin']), function ($q) use ($queryParams) {
                    $q->where('amount', '>=', $queryParams['balanceMin']);
                });
                $quer->when(!empty($queryParams['balanceMax']), function ($q) use ($queryParams) {
                    $q->where('amount', '<=', $queryParams['balanceMax']);
                });
                return $quer;
            })
            ->orderBy('id', 'desc')
            ->paginate(40);
    }

    public function firstOrCreate($email)
    {
        return $this->model->query()->firstOrCreate(
            ['email' => $email],
            [
                'name' => $email,
                'email' => $email,
            ]

        );
    }
}

