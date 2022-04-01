<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    public function color(){

        return $this->belongsTo(Color::class,'color_id','id');
    }
}
