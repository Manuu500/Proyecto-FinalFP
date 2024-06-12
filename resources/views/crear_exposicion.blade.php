<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('imagenes/patitas_solidarias.jpg') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        .custom-bg-color {
            background-color: #fbf2d5;
        }

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
            width: auto; /* Ajusta el ancho automático */
            margin-right: 10px; /* Espacio entre botones */
        }
    </style>
    <title>Crear Exposición</title>
</head>
<body style="background-color: #fbf2d5;">
    <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
        <h1 class="mb-4">Crear Exposición</h1>
        <div class="card" style="width: 34rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('expo.store')}}" class="w-50" enctype="multipart/form-data">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-3">
                        <p style="font-size: 20px">Nombre</p>
                        <x-text-input id="nombre" class="block mt-1 w-full" type="string" name="nombre" :value="old('nombre')" required autocomplete="nombre" />
                        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                    </div>

                    <!-- Descripcion -->
                    <div class="mb-3">
                        <p style="font-size: 20px">Descripcion</p>
                        <textarea id="descripcion" class="block mt-1 w-full" name="descripcion" required autocomplete="descripcion">{{ old('descripcion') }}</textarea>
                        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                    </div>

                    <!-- Aforo -->
                    <div class="mb-3">
                        <p style="font-size: 20px">Aforo</p>
                        <x-text-input id="aforo" class="block mt-1 w-full" type="string" name="aforo" :value="old('aforo')" required autocomplete="aforo" />
                        <x-input-error :messages="$errors->get('aforo')" class="mt-2" />
                    </div>

                    <!-- Fecha de creación de la obra -->
                    <div class="mb-3">
                        <p style="font-size: 20px">Fecha de creación</p>
                        <x-text-input id="fecha_creacion" class="block mt-1 w-full" type="date" name="fecha_creacion" required autocomplete="fecha_creacion" />
                        <x-input-error :messages="$errors->get('fecha_creacion')" class="mt-2" />
                    </div>


                    <div class="mt-5">
                        <input value="Crear nueva exposición" type="submit" class="boton_entradas btn btn-lg"></input>
                        <button value="Volver" class="boton_entradas btn btn-lg" onclick="window.location.href='{{ route('listar_exposiciones') }}'">Volver</button>
                    </div>
                </form>
            </div>
