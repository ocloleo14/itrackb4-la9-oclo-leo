# ITRACKB4 - Laboratory Activity 3

## Book Collection

This project is a simple Laravel application about books.
It has a book list, detail pages, a featured book, and a filter
for book genres.

## Routes

- `/books` - shows all books.
- `/books/featured` - shows the featured book.
- `/books/{id}` - shows the details of a book.
- `/books/filter/{value}` - filters books by genre.
- `/books/filter` - shows all books when there is no filter.

## Questions

### 1. Why must `/books/featured` be placed before `/books/{id}`?

The featured route should be placed first because Laravel checks routes
from top to bottom. If the `{id}` route comes first, Laravel may treat
"featured" as an ID. Placing the featured route first makes sure that
the correct page is displayed.

### 2. What happens when a nonexistent ID is requested?

The controller checks if the ID exists in the book data. If the ID does
not exist, `abort(404)` is used. This displays a 404 Not Found page.

### 3. Why are named routes useful? What can break if we do not use them?

Named routes make links easier to manage because we can use the route
name instead of typing the URL directly. If a URL changes later,
hard-coded links may stop working. Named routes make the application
easier to maintain.

## How to Run

1. Open the project folder in the terminal.
2. Run `php artisan serve`.
3. Open the local Laravel URL in a browser.
4. Visit `/books` to view the book collection.

## Author

Rosalio Oclo