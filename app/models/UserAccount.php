<?php
declare(strict_types=1);

namespace Models;
use \Illuminate\Database\Eloquent\Model;


class UserAccount extends Model
{
    protected $table = 'user_account';
    protected $fillable = ['user_id',
        'account_number',
        'funds'];
}
