<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista książek</title>
</head>
<body>
    <main>
        <h1>Lista książek</h1>

        @if (session('status'))
            <p role="status">{{ session('status') }}</p>
        @endif

        @if ($books->isEmpty())
            <p>Brak zapisanych książek.</p>
        @else
            <ul>
                @foreach ($books as $book)
                    <li>
                        <strong>{{ $book->title }}</strong> ({{ $book->year }})
                        <span>{{ $book->category }}</span>
                        <p>{{ $book->description }}</p>
                        <span>{{ $book->is_available ? 'Dostępna' : 'Niedostępna' }}</span>
                        <a href="{{ route('books.edit', $book) }}">Edytuj</a>
                    </li>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('books.create') }}">Dodaj książkę</a>
    </main>
</body>
</html>