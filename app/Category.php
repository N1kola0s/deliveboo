<?php

namespace App;
use App\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public function Products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
