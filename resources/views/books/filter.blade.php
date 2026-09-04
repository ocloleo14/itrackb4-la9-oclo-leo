<!DOCTYPE html>
<html>
<head>
    <title>Book Filter</title>
</head>
<body>

    <h1>Book Collection</h1>

    <h2>Active Filter: {{ $activeFilter }}</h2>

    @if (count($books) > 0)

        <table border="1" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Year</th>
            </tr>

            @foreach ($books as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>

                    <td>
                        <a href="{{ route('books.show', $item['id']) }}">
                            {{ $item['title'] }}
                        </a>
                    </td>

                    <td>{{ $item['author'] }}</td>
                    <td>{{ $item['genre'] }}</td>
                    <td>{{ $item['year'] }}</td>
                </tr>
            @endforeach

        </table>

    @else

        <p>No books found for this filter.</p>

    @endif

    <br>

    <a href="{{ route('books.index') }}">
        Back to Book List
    </a>

</body>
</html>