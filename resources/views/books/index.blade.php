<!DOCTYPE html>
<html>
<head>
    <title>Book Collection</title>
</head>
<body>

    <h1>My Book Collection</h1>

    <p>Created by: Rosalio Oclo</p>

    <p>
        <a href="{{ route('books.featured') }}">
            ⭐ View Featured Book
        </a>
    </p>

    <p>
        <a href="{{ route('books.filter') }}">
            View All Books
        </a>
    </p>

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

</body>
</html>