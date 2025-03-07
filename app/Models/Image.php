<?php

// app/Models/Image.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'product_id'];

    // Relación inversa con Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
