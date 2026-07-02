<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Inertia\Inertia;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::all()->map(function (Order $order) {
            return [
                'id' => $order->id,
                'total' => $order->total,
                'customer_name' => $order->customer->name,
            ];
        });

        return Inertia::render('Admin/Orders/Index', [
            'orders' => $orders,
        ]);
    }
}
