<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function SubCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function Products()
    {
        return $this->hasMany(Product::class);
    }
}
