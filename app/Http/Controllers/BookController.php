<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
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

    private function books()
    {
        return [
            1 => [
                'id' => 1,
                'title' => 'Smaller and Smaller Circles',
                'author' => 'F.H. Batacan',
                'genre' => 'Mystery',
                'year' => 2002,
            ],

            2 => [
                'id' => 2,
                'title' => 'Dekada 70',
                'author' => 'Lualhati Bautista',
                'genre' => 'Drama',
                'year' => 1983,
            ],

            3 => [
                'id' => 3,
                'title' => 'Noli Me Tangere',
                'author' => 'Jose Rizal',
                'genre' => 'Classic',
                'year' => 1887,
            ],

            4 => [
                'id' => 4,
                'title' => 'Po-on',
                'author' => 'F. Sionil Jose',
                'genre' => 'Historical',
                'year' => 1984,
            ],

            5 => [
                'id' => 5,
                'title' => 'Ilustrado',
                'author' => 'Miguel Syjuco',
                'genre' => 'Literary',
                'year' => 2008,
            ],

            6 => [
                'id' => 6,
                'title' => 'The Woman Who Had Two Navels',
                'author' => 'Nick Joaquin',
                'genre' => 'Literary',
                'year' => 1961,
            ],
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}