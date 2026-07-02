<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $term = $request->query('search', '');

        if ($term !== '') {
            $products = DB::select("SELECT * FROM products WHERE name LIKE '%$term%' ORDER BY name ASC");
        } else {
            $products = DB::select('SELECT * FROM products ORDER BY name ASC');
        }

        return Inertia::render('Products/Index', [
            'products' => $products,
            'search' => $term,
        ]);
    }
}
