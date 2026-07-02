<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class PurchaseController extends Controller
{
    public function store(Product $product): RedirectResponse
    {
        if ($product->stock > 0) {
            $product->decrement('stock');
        } else {
            return back()->withErrors(['stock' => 'This product is out of stock.']);
        }

        return back()->with('success', 'Purchase complete!');
    }
}
