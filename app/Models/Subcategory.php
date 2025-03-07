<?php

// app/Models/Subcategory.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id'];

    // Relación inversa con Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relación uno a muchos con Product
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
