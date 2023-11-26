<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\ModelAuto;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CatalogController extends Controller
{
    public function index($manufacturer = null, $model_auto = null, $product = null){
        Log::alert($manufacturer);
        if($product){
            $item = Product::where('name', $product)->with('model_auto','manufacturer')->first();
            return response()->json(['product' => $item]);
        }
        if($model_auto){
            $item = ModelAuto::where('name', $model_auto)->with('products')->first();
            return response()->json(['model_auto' => $item]);
        }
        if($manufacturer){
            $item = Manufacturer::where('name', $manufacturer)->with('models_auto')->first();
            return response()->json(['manufacturer' => $item]);
        }
        
        return response()->json(['manufacturer' => Manufacturer::all()]);
    }

    public function filter($width = null, $height = null, $diameter = null){
        
        $product = Product::when($width, function ($query, $width) {
            return $query->where('width', $width);
        })->when($height, function ($query, $height) {
            return $query->where('height', $height);
        })->when($diameter, function ($query, $diameter) {
            return $query->where('diameter', $diameter);
        })->with('model_auto','manufacturer')->first();

        return response()->json(['product' => $product]); 
    }
}
