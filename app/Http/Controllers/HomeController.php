<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Promo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            "title" => "Eventnizer - Realisasikan mimpimu!",
            "promos" => Promo::all(),
            "productTops" => [],
            'caterings' => [],
            'randoms' => Product::inRandomOrder()->limit(10)->get()
        ]);
    }
}
