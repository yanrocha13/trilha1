<?php
declare(strict_types=1);

namespace Models;
use \Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $fillable = ['email',
                            'password',
                            'name',
                            'identification_flag',
                            'identification',
                            'registration_flag',
                            'registration',
                            'birth_date'];
}
