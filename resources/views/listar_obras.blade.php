<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <title>Obras</title>
    <style>
        /* Estilos para el encabezado */
        .header {
            background-color: transparent;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            padding: 1rem;
        }

        .header img {
            transition: transform 0.3s ease;
        }

        .header img:hover {
            transform: scale(1.1);
        }

        /* Estilos para la sección de texto */
        .divTexto {
            background-image: url('../imagenes/article.jpg');
            background-size: cover;
            background-position: center;
            padding: 3rem 0;
            height: 50vh;
            /* margin-top: 5rem; Añadido para dejar espacio para el header fijo */
        }

        .divTexto h1, .divTexto h2 {
            color: cornflowerblue;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            -webkit-text-stroke: 0.5px black;
            text-align: center;
            margin-bottom: 1rem;
        }

        .divEntradas {
            /* background-color: #007bff; */
            padding: 2rem 0;
        }

        .divExpo {
            border: 2px solid cornflowerblue; /* Agrega un borde azul cornflower */
            background-color: transparent; /* Fondo transparente */
            padding: 1.5rem; /* Ajusta el padding según sea necesario */
            border-radius: 0.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .divExpo:hover {
            transform: translateY(-10px);
        }

        .divExpo h2 {
            color: #ffffff;
            text-align: center;
        }

        .divExpo p {
            color: #dcdcdc;
            text-align: center;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
            border-radius: 50%;
        }

        .img-responsive {
            width: 100%;
            height: auto;
        }

        .container-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .boton_entradas {
            height: 6vh;
            border-radius: 0;
            background-color: transparent;
            border: 1px solid cornflowerblue;
            color: cornflowerblue;
            width: auto; /* Ajusta el ancho automático */
            margin-right: 10px; /* Espacio entre botones */
        }

        .botones-comprar-container {
            display: flex; /* Flexbox para alinear botones en la misma línea */
            justify-content: center; /* Alinea los botones a la izquierda */
        }

        .boton_entradas:hover {
            background-image: url('../imagenes/ticketnegro.png');
            background-color: cornflowerblue;
            color: black;
        }

        .boton_entradas_obra{
            height: 6vh;
            border-radius: 0;
            background-color: transparent;
            border: 1px solid rgb(255, 0, 0);
            color: rgb(255, 0, 0);
            width: auto; /* Ajusta el ancho automático */
            margin-right: 10px; /* Espacio entre botones */
        }

        .boton_entradas_obra:hover{
            background-image: url('../imagenes/ticketnegro.png');
            background-color: rgb(255, 0, 0);
            color: rgb(0, 0, 0);
        }

        .boton_entradas_obra_crear{
            height: 6vh;
            border-radius: 0;
            background-color: rgb(0, 255, 0);
            border: 1px solid rgb(0, 0, 0);
            color: rgb(0, 0, 0);
            width: auto;
            margin-right: 10px;
        }

        .image-container {
            max-width: 100%; /
            /* max-width: 300px; Define el ancho máximo del contenedor */
            max-height: 300px;
            width: auto;
            height: auto;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .color-letra{
            color: black; /* Cambia el color del texto a negro */
        }

        .input-group {
            margin-bottom: 20px; /* Espacio inferior entre la barra de búsqueda y el contenido */
        }

        .form-control {
            border-radius: 25px; /* Bordes redondeados para la barra de búsqueda */
        }

        .btn-primary {
            border-radius: 25px; /* Bordes redondeados para el botón de búsqueda */
            padding: 10px 20px; /* Aumenta el espacio interno del botón */
        }
    </style>
</head>
<body>
    <header class="container-fluid header">
        <div class="row">
            <div class="col-sm-12 d-flex">
                <div class="d-flex flex-grow-1 justify-content-around align-items-center">
                    <a href="{{ route('index') }}">
                        <img class="m-2" width="100px" height="100px" src="../storage/imagenes/blob-modified.png" />
                    </a>
                </div>
            </div>
        </div>
    </header>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="divTexto div d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col">
                <h1 class="text-center">OBRAS</h1>
                <h2 class="text-center">En esta sección podrá consultar todas las obras disponibles en nuestra página web.</h2>
            </div>
        </div>
    </div>

    <div class="mb-3 mt-5">
        <form id="form-buscar" action="{{ route('buscar_obras') }}" method="GET" class="input-group">
            <input type="text" class="form-control" placeholder="Buscar por nombre..." name="nombre">
            <button type="submit" class="btn btn-primary px-4">Buscar</button>
        </form>
    </div>

    <div class="divEntradas py-5">
        <div class="container">
            @foreach ($obras as $obra)
            <div class="row mb-4">
                <div class="divExpo w-100 p-4 rounded shadow-sm" style="background-color: #1a1a1a; color: #ffffff;">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-sm-3">
                            <h4 class="text-center">
                                <div class="image-container">
                                    <img class="custom-image" src="{{ asset('/storage/imagenes/' . $obra->foto) }}" alt="Exposition Image"/>
                                </div>
                            </h4>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <h2 class="text-center">{{ $obra->nombre }}</h2>
                            </div>
                            <div class="row">
                                <p class="text-center">{{ $obra->descripcion }}</p>
                            </div>
                            <div class="row">
                                <p class="text-center"><strong>El artista:</strong> {{ $obra->artista }}</p>
                            </div>

                            <div class="row">
                                <p class="text-center">Fecha de creación: {{ $obra->fecha_creacion }}</p>
                            </div>
                            <div class="row botones-comprar-container">
                                @if (Auth::user()->tipo == "admin")
                                    <form action="{{ route('obra.destroy', $obra->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="boton_entradas_obra btn btn-lg">Borrar Obra</button>
                                    </form>
                                    <button class="boton_entradas_obra_crear btn btn-lg" onclick="window.location.href='{{ route('obra.edit', ['id' => $obra->id])}}'">Editar obra</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            @if (Auth::user()->tipo == "admin")
            <button class="boton_entradas_obra_crear btn btn-lg" onclick="window.location.href='{{ route('crear_obras') }}'">Crear nueva obra</button>
            @endif
        </div>
    </div>
</body>

<script>
    document.querySelectorAll('form:not(#form-buscar)').forEach(form => {
        form.addEventListener('submit', function(event) {
            if (!confirm('¿Estás seguro de que deseas eliminar esta obra?')) {
                event.preventDefault();
            }
        });
    });
</script>
</html>
