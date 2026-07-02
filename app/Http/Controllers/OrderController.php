<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function cancel(Order $order): RedirectResponse
    {
        if ($order->status === 'cancelled') {
            return back()->withErrors(['status' => 'Order is already cancelled.']);
        }

        if ($order->status === 'shipped') {
            return back()->withErrors(['status' => 'Cannot cancel a shipped order.']);
        }

        $order->status = 'cancelled';
        $order->cancelled_at = now();
        $order->save();

        return back()->with('success', 'Order cancelled.');
    }
}
