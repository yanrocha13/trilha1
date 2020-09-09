<?php
declare(strict_types=1);

namespace Models;
use \Illuminate\Database\Eloquent\Model;


class UserAddress extends Model
{
    protected $table = 'user_address';
    protected $fillable = ['user_id',
        'cep',
        'address',
        'number',
        'reference',
        'observation'];
}
