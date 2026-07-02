<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Inertia\Inertia;

class SubscriptionController extends Controller
{
    public function index()
    {
        $active = array_values(array_filter(
            Subscription::all()->toArray(),
            fn (array $subscription) => $subscription['status'] === 'active'
        ));

        return Inertia::render('Subscriptions/Index', [
            'subscriptions' => $active,
        ]);
    }
}
