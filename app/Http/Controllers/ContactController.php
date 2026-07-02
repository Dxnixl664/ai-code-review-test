<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function create()
    {
        return Inertia::render('Contact/Create');
    }

    public function store(ContactRequest $request): RedirectResponse
    {
        ContactMessage::create($request->validated());

        return redirect()->route('contact.create')->with('success', 'Message sent!');
    }
}
