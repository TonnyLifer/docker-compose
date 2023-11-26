<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    public function index($name = null){
        if($name){   
            $news = News::where('name', $name)->first();
        }else{
            $news = News::paginate(5);
        }

        return response()->json(['news' => $news]);
    }
}
