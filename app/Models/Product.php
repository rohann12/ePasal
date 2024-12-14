<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'quantity',        
    ];

    /**
     * Relationship: A product belongs to a category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function photos(){
        return $this->hasMany(Photo::class);
    }
}
