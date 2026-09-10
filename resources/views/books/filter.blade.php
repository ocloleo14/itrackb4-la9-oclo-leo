@extends('layouts.app')

@section('title', 'Book Filter')

@section('content')

    <div class="card shadow-sm">

        <div class="card-body">

            <h2 class="card-title mb-4">
                Book Filter
            </h2>

            <div class="alert alert-info">
                <strong>Active Filter:</strong> {{ $activeFilter }}
            </div>

            @forelse ($books as $item)

                @if ($loop->first)
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Genre</th>
                                <th>Year</th>
                            </tr>
                        </thead>

                        <tbody>
                @endif

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
                            </tr>

                @if ($loop->last)
                        </tbody>
                    </table>
                @endif

            @empty

                <div class="alert alert-warning">
                    No books found for this filter.
                </div>

            @endforelse

            <a href="{{ route('books.index') }}" class="btn btn-primary">
                Back to Book List
            </a>

        </div>

    </div>

@endsection