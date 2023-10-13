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

    public function list()
    {
        return $this->model
            ->query()
            ->whereHas('transactions', function ($quer) {
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
                return $quer;
            })
            ->with('transactions', function ($quer) {
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

