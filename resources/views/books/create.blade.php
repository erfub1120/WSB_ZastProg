<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj książkę</title>
</head>
<body>
    <main>
        <h1>Dodaj książkę</h1>

        @if ($errors->any())
            <div role="alert" style="border: 1px solid #dc2626; color: #b91c1c; margin-bottom: 1rem; padding: 1rem;">
                <h2>Proszę poprawić błędy w formularzu</h2>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('books.store') }}">
            @csrf

            <label for="title">Tytuł książki</label>
            <input id="title" name="title" type="text" value="{{ old('title') }}" required>

            @error('title')
                <p role="alert" style="color: #b91c1c;">{{ $message }}</p>
            @enderror

            <label for="year">Rok wydania</label>
            <input id="year" name="year" type="number" value="{{ old('year') }}">

            @error('year')
                <p role="alert" style="color: #b91c1c;">{{ $message }}</p>
            @enderror

            <label for="category">Kategoria</label>
            <select id="category" name="category" required>
                <option value="">Wybierz kategorię</option>
                @foreach (['Literatura piękna', 'Sci-Fi / Fantasy', 'Biografie', 'Naukowe'] as $category)
                    <option value="{{ $category }}" @selected(old('category') === $category)>{{ $category }}</option>
                @endforeach
            </select>

            @error('category')
                <p role="alert">{{ $message }}</p>
            @enderror

            <label for="description">Opis książki</label>
            <textarea id="description" name="description" rows="5">{{ old('description') }}</textarea>

            @error('description')
                <p role="alert">{{ $message }}</p>
            @enderror

            <label>
                <input name="is_available" type="checkbox" value="1" @checked(old('is_available'))>
                Dostępność w bibliotece
            </label>

            <button type="submit">Zapisz książkę</button>
        </form>
    </main>
</body>
</html>