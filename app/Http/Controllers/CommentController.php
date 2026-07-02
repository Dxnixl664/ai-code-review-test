<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class CommentController extends Controller
{
    public function index()
    {
        return Inertia::render('Comments/Index', [
            'comments' => Comment::with('user:id,name')->latest()->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'body' => 'required|string|max:2000',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'body' => $request->input('body'),
        ]);

        return redirect()->route('comments.index');
    }
}
