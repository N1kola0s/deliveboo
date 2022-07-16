<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'name', 
        'slug',
        'cover_img',
        'price',
        'visibility',
        'description'
        
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    
}
