<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 10;
        $page = max(1, (int) $request->query('page', 1));
        $offset = ($page - 1) * $perPage + 1;

        $orders = Order::where('user_id', auth()->id())
            ->orderBy('id')
            ->skip($offset)
            ->take($perPage)
            ->get();

        return Inertia::render('Orders/Index', [
            'orders' => $orders,
            'page' => $page,
        ]);
    }
}
