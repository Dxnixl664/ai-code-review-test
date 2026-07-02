<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class TicketController extends Controller
{
    public function create()
    {
        return Inertia::render('Tickets/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Ticket::create([
            'user_id' => auth()->id(),
            'subject' => $validated['subject'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('tickets.create')->with('success', 'Ticket submitted!');
    }
}
