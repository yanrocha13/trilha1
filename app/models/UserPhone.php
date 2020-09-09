<?php
declare(strict_types=1);

namespace Models;
use \Illuminate\Database\Eloquent\Model;


class UserPhone extends Model
{
    protected $table = 'user_phone';
    protected $fillable = ['user_id',
        'phone_flag',
        'phone'];
}
