<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class NoteController extends Controller
{
    public function index()
    {
        return Inertia::render('Notes/Index', [
            'notes' => Note::where('user_id', auth()->id())->latest()->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // Default the owner to the current user, then layer in the request data
        $data = array_merge(['user_id' => auth()->id()], $request->all());

        Note::create($data);

        return redirect()->route('notes.index');
    }
}
