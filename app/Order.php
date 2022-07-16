<?php

namespace App;

use App\User; // Modello relativo allo User
use App\Product; // Modello relativo allo Product


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function user(): BelongsTo
    {
    return $this->belongsTo(User::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
