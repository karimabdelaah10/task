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

    public function findOrFail($id): ?User
    {
        return $this->model->findOrFail($id);
    }

    public function update($data, $id)
    {
        return $this->model->findOrFail($id)->update($data);
    }

    public function findByEmail($mail)
    {
        return $this->model->where('email', $mail)->first();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function findUserByOtp($otp)
    {
        return $this->model->where('otp', $otp)->first();
    }
}
