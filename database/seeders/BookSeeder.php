<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title' => 'Smaller and Smaller Circles ',
            'author' => 'F.H. Batacan ',
            'genre' => ' Mystery',
            'year' =>  2002
        ]);

         Book::create([
            'title' => 'Dekada 70 ',
            'author' => ' Lualhati Bautista',
            'genre' => 'Drama ',
            'year' =>  1983
        ]);

        Book::create([
            'title' => 'Noli Me Tangere ',
            'author' => ' Jose Rizal',
            'genre' => 'Classic ',
            'year' =>  1887
        ]);

         Book::create([
            'title' => ' Po-on',
            'author' => ' F. Sionil Jose',
            'genre' => 'Historical ',
            'year' =>  1984
        ]);

         Book::create([
            'title' => 'Ilustrado ',
            'author' => ' Miguel Syjuco',
            'genre' => 'Literary ',
            'year' =>  2008
        ]);

    
    }
}
