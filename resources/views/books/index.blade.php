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