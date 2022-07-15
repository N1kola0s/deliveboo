<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'guest_name',
        'guest_surname',
        'guest_phone_number',
        'guest_email',
        'guest_city',
        'guest_zip_code',
        'guest_address',
        'note',
        'total_price',
        'status',
        /* 'id_transaction' */
    ];
}
