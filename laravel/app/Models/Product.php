<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function manufacturer(){
        return $this->belongsTo(Manufacturer::class);
    }

    public function model_auto(){
        return $this->belongsTo(ModelAuto::class, 'model_id');
    }
}
