<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    public function size(){

        return $this->belongsTo(Size::class,'size_id','id');
    }
}

