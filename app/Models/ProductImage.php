<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
 use HasFactory;
 protected $table = "image";
 protected $primaryKey = "id";

 protected $fillable = [
  'product_id',
  'image_url'
 ];

 // Many products belong to one category
 public function product(): BelongsTo
 {
  return $this->belongsTo(Category::class);
 }
}
