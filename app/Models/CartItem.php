<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    use HasFactory;
    protected $table = "cart_item";
    protected $primaryKey = 'id';
    protected $fillable = ["cart_id", "product_id", "quantity"];

    // Many cart items belongs to one cart
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    // One cart item belongs to one product
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
