<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $table = "product";
    protected $primaryKey = "id";

    protected $fillable = [
        'name',
        'price',
        'description',
        'category',
        'rating',
        'quantity',
        'rating',
        'status',
    ];

    // One product can have many order items
    public function orderItem(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // One product can have many cart items
    public function cartItem(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // Many products belong to one category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // One product can have many product images
    public function productImage(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }
}
