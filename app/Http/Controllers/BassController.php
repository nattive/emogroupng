<?php

namespace App\Http\Controllers;

use App\blog;
use App\category;
use Illuminate\Http\Request;

class BassController extends Controller
{
    public function __construct()
    {
        $G_categories = category::where('categoryToSub', true)->get();
       
        return view()->share(compact('G_categories', 'G_posts'));
    }
}
