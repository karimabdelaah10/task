<?php

namespace App\Modules\User;

use App\Modules\Transaction\Transaction;
use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id');
    }
}
