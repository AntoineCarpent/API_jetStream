<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductsResource;
use App\Models\Products;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome() {
        $posts = Products::all();
        return view('welcome', [
            'posts' => $posts,
        ]);
    }
}
