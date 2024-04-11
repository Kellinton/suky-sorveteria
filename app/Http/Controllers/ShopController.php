<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
        return view ('site.shop');
    }

    public function shopDetalhes() {
        return view ('site.shop-detalhes');
    }

    public function carrinho() {
        return view ('site.carrinho');
    }
}
