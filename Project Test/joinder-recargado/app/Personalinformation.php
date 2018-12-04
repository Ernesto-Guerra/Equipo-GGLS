<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class Personalinformation extends Model
{
    protected $fillable = [
        'user_id', 'career', 'birthday','telephone','type','matricula'
    ];
}
