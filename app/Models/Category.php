<?php

// app/Models/Category.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relación uno a muchos con Subcategory
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    // Relación directa con Product
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
