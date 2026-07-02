<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class TagController extends Controller
{
    public function index()
    {
        return Inertia::render('Tags/Index', [
            'tags' => Tag::orderBy('name')->get(),
        ]);
    }

    public function store(TagRequest $request): RedirectResponse
    {
        Tag::create($request->validated());

        return redirect()->route('tags.index');
    }

    public function update(TagRequest $request, Tag $tag): RedirectResponse
    {
        $tag->update($request->validated());

        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();

        return redirect()->route('tags.index');
    }
}
