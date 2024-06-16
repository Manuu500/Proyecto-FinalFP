<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seleccionar Entrada</title>
</head>
<body>
    <h1>Seleccionar Entrada para la Exposición {{ $id }}</h1>

    <form action="{{ route('procesar_seleccion', $id) }}" method="POST">
        @csrf
        <label for="entrada">Selecciona una entrada:</label>
        <select name="entrada_id" id="entrada">
            @foreach ($entradas as $entrada)
                <option value="{{ $entrada->id }}">{{ $entrada->id }} - {{ $entrada->tipoEntrada->nombre }}</option>
            @endforeach
        </select>
        <button type="submit">Seleccionar entrada</button>
    </form>
</body>
</html>
