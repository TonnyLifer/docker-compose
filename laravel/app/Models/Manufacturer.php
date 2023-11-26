<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    public function models_auto(){
        return $this->hasManyThrough(
            ModelAuto::class,
            Product::class,
            'model_id',
            'id',
            'id',
            'id',
        );
    }
}
