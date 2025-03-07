<?php

// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'price',
        'amount',
        'state',
        'dimension',
        'weight',
        'capacity',
        'ability',
        'color',
        'category_id',
        'subcategory_id',
    ];

    // Relación con Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relación con Subcategory
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    // Relación uno a muchos con Image
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
