<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    public function create(): View
    {
        return view('books.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $title = $request->input('title');
        $allData = $request->all();
        $selectedData = $request->only(['title', 'category']);


        $validated = $request->validated();

        $validated['is_available'] = $request->boolean('is_available');

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('status', 'Książka została zapisana w bazie danych: '.$title.'.');
    }

    public function index(): View
    {
        return view('books.index', [
            'books' => Book::latest()->get(),
        ]);
    }

    public function edit(Book $book): View
    {
        return view('books.edit', [
            'book' => $book,
        ]);
    }

    public function update(Request $request, Book $book): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
                'year' => ['nullable', 'integer', 'between:1450,2100'],
            'category' => ['required', 'string', 'in:Literatura piękna,Sci-Fi / Fantasy,Biografie,Naukowe'],
                'description' => ['nullable', 'string', 'max:2000'],
            'is_available' => ['nullable', 'boolean'],
        ]);

        $validated['is_available'] = $request->boolean('is_available');
        $book->update($validated);

        return redirect()
            ->route('books.index')
            ->with('status', 'Książka została zaktualizowana.');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('status', 'Książka została usunięta.');
    }
}