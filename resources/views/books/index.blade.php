@extends('layouts.app')

@section('title', 'Book Collection')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2>My Book Collection</h2>
            <p class="text-muted">
                Browse the books in the collection.
            </p>
        </div>

        <a href="{{ route('books.featured') }}" class="btn btn-primary">
            View Featured Book
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <h3 class="card-title mb-3">All Books</h3>

            <p>
                <strong>Genre:</strong> {{ $genre }}
                |
                <strong>Author:</strong> {{ $author }}
            </p>

            <h5>Filter by Genre</h5>

            @if ($author === 'all')
                <a href="{{ route('books.index') }}">All Genres</a>
                <a href="{{ route('books.index', ['genre'=>'Mystery']) }}">Mystery</a>
                <a href="{{ route('books.index', ['genre'=>'Drama']) }}">Drama</a>
                <a href="{{ route('books.index', ['genre'=>'Classic']) }}">Classic</a>
                <a href="{{ route('books.index', ['genre'=>'Historical']) }}">Historical</a>
                <a href="{{ route('books.index', ['genre'=>'Literary']) }}">Literary</a>
            @else
                <a href="{{ route('books.index', ['author'=>$author]) }}">All Genres</a>
                <a href="{{ route('books.index', ['genre'=>'Mystery','author'=>$author]) }}">Mystery</a>
                <a href="{{ route('books.index', ['genre'=>'Drama','author'=>$author]) }}">Drama</a>
                <a href="{{ route('books.index', ['genre'=>'Classic','author'=>$author]) }}">Classic</a>
                <a href="{{ route('books.index', ['genre'=>'Historical','author'=>$author]) }}">Historical</a>
                <a href="{{ route('books.index', ['genre'=>'Literary','author'=>$author]) }}">Literary</a>
            @endif

            <br><br>

            <h5>Filter by Author</h5>

            @if ($genre === 'all')
                <a href="{{ route('books.index') }}">All Authors</a>
                <a href="{{ route('books.index', ['author'=>'F.H. Batacan']) }}">F.H. Batacan</a>
                <a href="{{ route('books.index', ['author'=>'Lualhati Bautista']) }}">Lualhati Bautista</a>
                <a href="{{ route('books.index', ['author'=>'Jose Rizal']) }}">Jose Rizal</a>
                <a href="{{ route('books.index', ['author'=>'F. Sionil Jose']) }}">F. Sionil Jose</a>
                <a href="{{ route('books.index', ['author'=>'Miguel Syjuco']) }}">Miguel Syjuco</a>
                <a href="{{ route('books.index', ['author'=>'Nick Joaquin']) }}">Nick Joaquin</a>
            @else
                <a href="{{ route('books.index', ['genre'=>$genre]) }}">All Authors</a>
                <a href="{{ route('books.index', ['genre'=>$genre,'author'=>'F.H. Batacan']) }}">F.H. Batacan</a>
                <a href="{{ route('books.index', ['genre'=>$genre,'author'=>'Lualhati Bautista']) }}">Lualhati Bautista</a>
                <a href="{{ route('books.index', ['genre'=>$genre,'author'=>'Jose Rizal']) }}">Jose Rizal</a>
                <a href="{{ route('books.index', ['genre'=>$genre,'author'=>'F. Sionil Jose']) }}">F. Sionil Jose</a>
                <a href="{{ route('books.index', ['genre'=>$genre,'author'=>'Miguel Syjuco']) }}">Miguel Syjuco</a>
                <a href="{{ route('books.index', ['genre'=>$genre,'author'=>'Nick Joaquin']) }}">Nick Joaquin</a>
            @endif

            <p class="mt-3">
                <a href="{{ route('books.index') }}" class="btn btn-secondary">
                    Clear Both Filters
                </a>
            </p>

            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th>Year</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($books as $item)

                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <a href="{{ route('books.show', $item['id']) }}">
                                    {{ $item['title'] }}
                                </a>
                            </td>

                            <td>{{ $item['author'] }}</td>

                            <td>{{ $item['genre'] }}</td>

                            <td>{{ $item['year'] }}</td>

                            <td>
                                @if ($item['year'] < 2000)
                                    <span class="badge bg-secondary">
                                        Classic
                                    </span>
                                @else
                                    <span class="badge bg-success">
                                        Modern
                                    </span>
                                @endif
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center">
                                No books are available in the collection right now.
                            </td>
                        </tr>

                    @endforelse

                </tbody>
            </table>

        </div>
    </div>

@endsection