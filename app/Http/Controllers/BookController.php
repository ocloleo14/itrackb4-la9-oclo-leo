<?php

namespace App\Http\Controllers;

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
        $books = $this->books();

        $genre = $request->query('genre', 'all');
        $author = $request->query('author', 'all');

        $filtered = [];

        foreach ($books as $item) {
            $genreMatch = $genre === 'all' || $item['genre'] === $genre;
            $authorMatch = $author === 'all' || $item['author'] === $author;

            if ($genreMatch && $authorMatch) {
                $filtered[] = $item;
            }
        }

        return view('books.index', [
            'books' => $filtered,
            'genre' => $genre,
            'author' => $author
        ]);
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

        $books = $this->books();

        $id = 1;

        foreach ($books as $item) {
            if ($item['id'] >= $id) {
                $id = $item['id'] + 1;
            }
        }

        $data['id'] = $id;

        $books[$id] = $data;

        $this->saveBooks($books);

        return redirect()->route('books.index')
            ->with('success', 'Book added successfully.');
    }

    public function show(string $id)
    {
        $books = $this->books();

        if (!isset($books[$id])) {
            abort(404);
        }

        $item = $books[$id];

        return view('books.show', [
            'item' => $item
        ]);
    }

    public function featured()
    {
        $books = $this->books();

        $item = $books[3] ?? reset($books);

        if (!$item) {
            abort(404);
        }

        return view('books.featured', [
            'item' => $item
        ]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    private function books()
    {
        $path = storage_path('app/private/books.json');

        // If books.json does not exist yet (it is git-ignored),
        // create it from the starting data.
        if (!file_exists($path)) {
            $this->saveBooks($this->defaultBooks());
        }

        return json_decode(file_get_contents($path), true);
    }

    private function saveBooks(array $books)
    {
        file_put_contents(
            storage_path('app/private/books.json'),
            json_encode($books, JSON_PRETTY_PRINT)
        );
    }

    private function defaultBooks()
    {
        return [
            1 => ['id' => 1, 'title' => 'Smaller and Smaller Circles', 'author' => 'F.H. Batacan', 'genre' => 'Mystery', 'year' => 2002],
            2 => ['id' => 2, 'title' => 'Dekada 70', 'author' => 'Lualhati Bautista', 'genre' => 'Drama', 'year' => 1983],
            3 => ['id' => 3, 'title' => 'Noli Me Tangere', 'author' => 'Jose Rizal', 'genre' => 'Classic', 'year' => 1887],
            4 => ['id' => 4, 'title' => 'Po-on', 'author' => 'F. Sionil Jose', 'genre' => 'Historical', 'year' => 1984],
            5 => ['id' => 5, 'title' => 'Ilustrado', 'author' => 'Miguel Syjuco', 'genre' => 'Literary', 'year' => 2008],
            6 => ['id' => 6, 'title' => 'The Woman Who Had Two Navels', 'author' => 'Nick Joaquin', 'genre' => 'Literary', 'year' => 1961],
        ];
    }
}