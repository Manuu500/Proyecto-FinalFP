<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('imagenes/patitas_solidarias.jpg') }}" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        body {
            background-color: #e6f0ff; /* Soft blue background */
            padding-top: 60px; /* Space for fixed header */
            font-family: Arial, sans-serif;
            color: #333;
        }

        .header {
            background-color: #e6f0ff;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            padding: 1rem;
            text-align: center;
        }

        .header img {
            transition: transform 0.3s ease;
        }

        .header img:hover {
            transform: scale(1.1);
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        .card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background: rgba(255, 255, 255, 0.8); /* Slightly transparent white */
        }

        .card-header, .card-footer {
            background-color: #6593F5; /* Cornflower blue */
            color: white;
            text-align: center;
        }

        .card-body {
            padding: 2rem;
        }

        .form-group label {
            font-weight: bold;
            color: #6593F5; /* Cornflower blue */
        }

        .form-control {
            border-radius: 0.25rem;
            border: 1px solid #6593F5; /* Cornflower blue */
        }

        .form-control:focus {
            box-shadow: 0 0 5px rgba(101, 147, 245, 0.5);
            border-color: #6593F5;
        }

        .btn-custom {
            background-color: #6593F5;
            color: white;
            border: none;
            border-radius: 0.25rem;
        }

        .btn-custom:hover {
            background-color: #4a7bd4;
        }

        .page-title {
            color: #6593F5;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .text-center {
            text-align: center;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }
    </style>
    <title>Editar Usuario</title>
</head>
<body>
    <div class="header">
        <img src="{{ asset('imagenes/blob-modified.png') }}" alt="Logo" width="50">
    </div>
    <div class="container mt-5">
        <h1 class="mb-4 page-title text-center">Editar Usuario</h1>
        <div class="card">
            <div class="card-header">
                <h2>Información del Usuario</h2>
            </div>
            <div class="card-body">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <!-- Nombre -->
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" value="{{$user->nombre}}" class="form-control" type="text" name="nombre" required autofocus autocomplete="nombre">
                        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                    </div>

                    <!-- DNI -->
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input id="dni" value="{{$user->dni}}" class="form-control" type="text" name="dni" required autocomplete="dni">
                        <x-input-error :messages="$errors->get('dni')" class="mt-2" />
                    </div>

                    <!-- Primer apellido -->
                    <div class="form-group">
                        <label for="apellido1">Primer Apellido</label>
                        <input id="apellido1" value="{{$user->apellido1}}" class="form-control" type="text" name="apellido1" required autocomplete="apellido1">
                        <x-input-error :messages="$errors->get('apellido1')" class="mt-2" />
                    </div>

                    <!-- Segundo apellido -->
                    <div class="form-group">
                        <label for="apellido2">Segundo Apellido</label>
                        <input id="apellido2" value="{{$user->apellido2}}" class="form-control" type="text" name="apellido2" required autocomplete="apellido2">
                        <x-input-error :messages="$errors->get('apellido2')" class="mt-2" />
                    </div>

                    <!-- Fecha de nacimiento -->
                    <div class="form-group">
                        <label for="fechaNacimiento">Fecha de Nacimiento</label>
                        <input id="fechaNacimiento" value="{{$user->fechaNacimiento}}" class="form-control" type="date" name="fechaNacimiento" required autocomplete="fechaNacimiento">
                        <x-input-error :messages="$errors->get('fechaNacimiento')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" value="{{$user->email}}" class="form-control" type="email" name="email" required autocomplete="email">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Telefono -->
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input id="telefono" value="{{$user->telefono}}" class="form-control" type="text" name="telefono" required autocomplete="telefono">
                        <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                    </div>

                    <!-- Código Postal -->
                    <div class="form-group">
                        <label for="codPostal">Código Postal</label>
                        <input id="codPostal" value="{{$user->codPostal}}" class="form-control" type="text" name="codPostal" required autocomplete="codPostal">
                        <x-input-error :messages="$errors->get('codPostal')" class="mt-2" />
                    </div>

                    <!-- Tipo -->
                    <div class="form-group">
                        <label for="tipo">Tipo de Usuario</label>
                        <select id="tipo" class="form-control" name="tipo" required>
                            <option value="admin" {{ $user->tipo == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="cliente" {{ $user->tipo == 'cliente' ? 'selected' : '' }}>User</option>
                            <!-- Agrega más opciones según sea necesario -->
                        </select>
                        <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
                    </div>

                    <div class="mt-5 text-center">
                        <button type="submit" class="btn btn-custom btn-lg">Actualizar Usuario</button>
                        <button class="btn btn-custom btn-lg" onclick="window.location.href='{{ route('gestion_usuarios') }}'">Volver</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <p>&copy; 2024 Patitas Solidarias</p>
            </div>
        </div>
    </div>
</body>
</html>
