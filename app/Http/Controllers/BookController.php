<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private array $authors = [
        'F.H. Batacan',
        'Lualhati Bautista',
        'Jose Rizal',
        'F. Sionil Jose',
        'Miguel Syjuco',
        'Nick Joaquin',
    ];

    private array $genres = ['Mystery', 'Drama', 'Classic', 'Historical', 'Literary'];

    public function index(Request $request)
    {
        $books = Book::all();

        $genre = $request->query('genre', 'all');
        $author = $request->query('author', 'all');

        return view('books.index', compact('books', 'genre', 'author'));
    }

    public function create()
    {
        return view('books.create', [
            'authors' => $this->authors,
            'genres' => $this->genres,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|in:' . implode(',', $this->authors),
            'genre' => 'required|in:' . implode(',', $this->genres),
            'year' => 'required|numeric|min:1500|max:2026'
        ]);

        Book::create($data);

        return redirect()->route('books.index')
            ->with('success', 'Book added successfully.');
    }

    public function show(string $id)
    {
        $book = Book::findOrFail($id);

        return view('books.show', ['item' => $book]);
    }

    public function featured()
    {
        $item = Book::findOrFail(3);

        return view('books.featured', ['item' => $item]);
    }
}