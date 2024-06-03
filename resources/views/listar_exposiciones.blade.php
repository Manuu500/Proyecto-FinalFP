<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <title>Listar Exposiciones</title>
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
            background-color: #007bff;
            padding: 2rem 0;
        }

        .divExpo {
            background-color: #6c757d;
            padding: 1.5rem;
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

        .boton_entradas_exposicion_crear{
            height: 6vh;
            border-radius: 0;
            background-color: rgb(0, 255, 0);
            border: 1px solid rgb(0, 0, 0);
            color: rgb(0, 0, 0);
            width: auto; /* Ajusta el ancho automático */
            margin-right: 10px; /* Espacio entre botones */
        }

        .boton_borrar_expo{
            height: 6vh;
            border-radius: 0;
            background-color: rgb(255, 0, 0);
            border: 1px solid rgb(0, 0, 0);
            color: rgb(0, 0, 0);
            width: auto; /* Ajusta el ancho automático */
            margin-right: 10px; /* Espacio entre botones */
        }

        .boton_borrar_expo:hover{
            /* background-image: url('../imagenes/ticketnegro.png'); */
            background-color: rgb(255, 0, 0);
            color: rgb(0, 0, 0);
        }


    </style>
</head>
<body>
    <header class="container-fluid header">
        <div class="row">
            <div class="col-sm-12 d-flex">
                <div class="d-flex flex-grow-1 justify-content-around align-items-center">
                    <a href="{{ route('index') }}">
                        <img class="m-2" width="100px" height="100px" src="../imagenes/blob-modified.png" />
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="divTexto div d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col">
                <h1 class="text-center">EXPOSICIONES</h1>
                <h2 class="text-center">En esta sección podrá consultar todas las secciones disponibles en nuestro museo.</h2>
            </div>
        </div>
    </div>

    <div class="bg-primary divEntradas py-5">
        <div class="container">
            @foreach ($exposiciones as $exposicion)
                <div class="row mb-4">
                    <div class="divExpo bg-secondary w-100 p-4 rounded shadow-sm">
                        <div class="row d-flex align-items-center justify-content-between">
                            <div class="col-sm-3">
                                <h4 class="text-center">
                                    <img class="img-fluid rounded-circle" src="../imagenes/blob-modified.png" alt="Exposition Image"/>
                                </h4>
                            </div>
                            <div class="col">
                                <div class="row mb-2">
                                    <h2 class="text-center">{{ $exposicion->nombre }}</h2>
                                </div>
                                <div class="row">
                                    <p class="text-center">{{ $exposicion->descripcion }}</p>
                                </div>
                                <div class="row botones-comprar-container">
                                    @if (Auth::check())
                                        @if (session('entrada'))
                                            <button class="boton_entradas btn btn-lg" onclick="window.location.href='{{ route('comprar_entradas_directo', ['id' => $exposicion->id]) }}'">Comprar la entrada</button>
                                            @if (Auth::user()->tipo == "admin")
                                            <form action="{{ route('expo.destroy', $exposicion->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="boton_entradas_obra btn btn-lg" onclick="">Borrar Exposicion</button>
                                            </form>
                                            @endif
                                        @else
                                            <button class="boton_entradas btn btn-lg" onclick="window.location.href='{{ route('comprar_entradas_directo', ['id' => $exposicion->id]) }}'">Comprar la entrada</button>
                                            @if (Auth::user()->tipo == "admin")
                                            <form action="{{ route('expo.destroy', $exposicion->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="boton_borrar_expo btn btn-lg" onclick="">Borrar Exposicion</button>
                                            </form>

                                            <button class="boton_borrar_expo btn btn-lg" onclick="window.location.href='{{ route('expo.edit', ['id' => $exposicion->id]) }}'">Editar </button>

                                            @endif
                                        @endif
                                    @else
                                        <button class="boton_borrar_expo btn btn-lg" onclick="window.location.href='{{ route('login') }}'">Comprar la entrada</button>
                                        {{-- <form action="{{ route('expo.destroy', $exposicion->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="boton_borrar_expo btn btn-lg" onclick="">Borrar Exposicion</button>
                                        </form> --}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @auth
            @if (Auth::user()->tipo == "admin")
            <button class="boton_entradas_exposicion_crear btn btn-lg" onclick="window.location.href='{{ route('crear_exposiciones') }}'">Crear nueva exposición</button>
            @endif
            @endauth
        </div>
    </div>
</body>

<script>
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function(event) {
            if (!confirm('¿Estás seguro de que deseas eliminar esta exposición?')) {
                event.preventDefault();
            }
        });
    });
</script>
</html>
