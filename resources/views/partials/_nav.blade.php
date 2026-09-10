<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">

        <a class="navbar-brand" href="{{ route('books.index') }}">
            My Book Collection
        </a>

        <div class="navbar-nav">

            <a class="nav-link" href="{{ route('books.index') }}">
                All Books
            </a>

            <a class="nav-link" href="{{ route('books.featured') }}">
                Featured Book
            </a>

        </div>

    </div>
</nav>