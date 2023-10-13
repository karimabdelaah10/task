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

    public function list(
        $pagination = false,
        $callback = null,
        $limit = null,
    )
    {
        return $this->model
            ->query()
            ->when($callback, $callback)
            ->orderBy('id', 'desc')
            ->when($pagination, function ($quer) use ($limit) {
                $quer->when($limit,
                    function ($q) use ($limit) {
                        return $q->paginate($limit);
                    },
                    function ($q) {
                        return $q->paginate(env('DEFAULT_PER_PAGE') ?? 40);
                    });
            }, function ($que) use ($limit) {
                $que->when($limit, function ($q) use ($limit) {
                    $q->take($limit);
                });
            })
            ->get();
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

