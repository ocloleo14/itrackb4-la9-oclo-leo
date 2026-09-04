<?php

namespace App\Http\Controllers;

class BookController extends Controller
{
    public function index()
    {
        $books = $this->books();

        return view('books.index', [
            'books' => $books
        ]);
    }

    public function show($id)
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

        $item = $books[3];

        return view('books.featured', [
            'item' => $item
        ]);
    }

    public function filter($value = null)
    {
        $books = $this->books();

        if ($value === null) {
            return view('books.filter', [
                'books' => $books,
                'activeFilter' => 'All'
            ]);
        }

        $filtered = [];

        foreach ($books as $item) {
            if ($item['genre'] === $value) {
                $filtered[] = $item;
            }
        }

        return view('books.filter', [
            'books' => $filtered,
            'activeFilter' => $value
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
}