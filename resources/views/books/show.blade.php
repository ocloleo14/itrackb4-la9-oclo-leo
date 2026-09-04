<!DOCTYPE html>
<html>
<head>
    <title>Book Details</title>
</head>
<body>

    <h1>{{ $item['title'] }}</h1>

    <p><strong>ID:</strong> {{ $item['id'] }}</p>
    <p><strong>Title:</strong> {{ $item['title'] }}</p>
    <p><strong>Author:</strong> {{ $item['author'] }}</p>
    <p><strong>Genre:</strong> {{ $item['genre'] }}</p>
    <p><strong>Year:</strong> {{ $item['year'] }}</p>

    <p>Created by: Rosalio Oclo</p>

    <a href="{{ route('books.index') }}">
        Back to Book List
    </a>

</body>
</html>