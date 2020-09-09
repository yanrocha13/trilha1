<?php
declare(strict_types=1);

namespace Models;
use \Illuminate\Database\Eloquent\Model;


class AccountTransactions extends Model
{
    protected $table = 'account_transactions';
    protected $fillable = ['account_origin_id',
        'account_destination_id',
        'value',
        'transaction_type_enum',
        'transaction_date'];
}
