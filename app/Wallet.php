<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'users_nickname', 'in_time', 'currency', 'money_amount',
    ];
}
