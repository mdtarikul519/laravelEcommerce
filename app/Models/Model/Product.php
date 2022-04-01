<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){

        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function brand(){

        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function colors(){

        return $this->belongsToMany(Color::class,'product_colors');
    }

    public function sizes(){

        return $this->belongsToMany(Size::class,'product_sizes');
    }

    

}
