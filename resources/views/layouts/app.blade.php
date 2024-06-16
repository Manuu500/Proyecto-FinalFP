<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

    <meta charset="UTF-8">
    <link rel="icon" href="/public/imagenes/blob-modified.png" type="image/x-icon">
        {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    {{-- <link rel="stylesheet" href="{{ asset('css/listarobras.css') }}">
    <link rel="stylesheet" href="{{ asset('css/comprarentradas.css') }}"> --}}


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/sobrenosotros.css',
     'resources/css/listarobras.css', 'resources/css/index.css', 'resources/css/entradas.css', 'resources/css/entradasadquiridas.css',
     'resources/css/gestionusuarios.css', 'resources/css/listarexposiciones.css','resources/css/login.css','resources/css/register.css',
     'resources/css/editarusuario.css', 'resources/css/comprarentradas.css', 'resources/css/editarexposicion.css', 'resources/css/crearexposicion.css',
     'resources/css/añadirusuario.css', 'resources/css/crearobra.css','resources/css/editarobra.css'])

        <style>

            .boton_entradas {
                height: 8vh;
                border-radius: 0;
                background-color: transparent;
                border: 1px solid rgb(255, 174, 0);
                color: rgb(255, 174, 0);
            }

            .boton_entradas:hover {
                background-image: url('../../public/imagenes/ticketnegro.png'); /* Nueva imagen para el hover */
                background-color: rgb(255, 174, 0);
                color: black;
            }

            .header {
                position: fixed;
                color: cornflowerblue;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
                top: 0;
                width: 100%;
                z-index: 3;
            }

            .tituloMuseo{
                cursor: pointer;
            }

            .header img {
                transition: transform 0.3s ease;
            }

            .header img:hover {
                transform: scale(1.1);
            }
        </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Museo Arte Pictórico') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/sobrenosotros.css','resources/css/listarobras.css']) --}}


    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            {{-- @include('layouts.navigation') --}}




            <header class="container-flex">
                <div class="row m-4 align-items-center">
                    <div class="col-sm-4 mx-auto d-flex justify-content-end">
                        <h1 onclick="window.location.href='{{route('index')}}'" class="text-center tituloMuseo">MUSEO ARTE PICTÓRICO</h1>
                    </div>
                    <div class="col-sm-8 text-end">
                        <div class="btn-group" role="group" aria-label="Botones">
                            @auth
                                <form id="formCerrarSesion" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button id="botonCerrarSesion" type="submit" class="btn btn-lg boton_normal">Cerrar sesión</button>
                                </form>
                                @if (Auth::user()->tipo == "admin")
                                    <button id="boton_normal" type="button" class="boton_normal btn btn-lg" onclick="window.location.href='{{ route('gestion_usuarios') }}'">
                                        <label>Gestión de Usuarios</label>
                                        {{-- <img class="ml-2" width="30px" height="30px" src="../imagenes/ticketazul.png"/> --}}
                                    </button>
                                @endif
                                <button type="button" class="boton_entradas btn btn-lg" onclick="window.location.href='{{ route('entradas') }}'">
                                    <label>Entradas</label>
                                    {{-- <img class="ml-2" width="30px" height="30px" src="../imagenes/ticketazul.png"/> --}}
                                </button>
                                <button id="boton_normal" type="button" class="boton_normal btn btn-lg" onclick="window.location.href='{{ route('entradas_compradas', ['id' => auth()->id()]) }}'">
                                    <label>Ver entradas adquiridas</label>
                                    {{-- <img class="ml-2" width="30px" height="30px" src="../imagenes/ticketazul.png"/> --}}
                                </button>
                            @else
                                <button type="button" class="boton_entradas btn btn-lg" onclick="window.location.href='{{ route('entradas') }}'">
                                    <label>Entradas</label>
                                    {{-- <img class="ml-2" width="30px" height="30px" src="../imagenes/ticketazul.png"/> --}}
                                </button>
                                <button id="boton_normal" type="button" class="boton_normal btn btn-lg" onclick="window.location.href='{{ route('login') }}'">
                                    <label>Iniciar sesión</label>
                                </button>
                            @endauth
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
