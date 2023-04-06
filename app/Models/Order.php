<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $primaryKey = 'id';

    protected $fillable = ['user_id', "is_confirmed", 'total'];

    public function orderItem(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // one
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
