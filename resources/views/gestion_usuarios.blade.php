<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        body {
            background-color: #f0f4f8;
            color: #333;
            font-family: 'Arial', sans-serif;
        }

        h1 {
            color: cornflowerblue;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .boton_entradas_obra {
            height: 6vh;
            border-radius: 5px;
            background-color: transparent;
            border: 1px solid cornflowerblue;
            color: cornflowerblue;
            width: auto;
            margin-right: 10px;
            transition: background-color 0.3s, color 0.3s;
        }

        .boton_entradas_obra:hover {
            background-color: cornflowerblue;
            color: white;
        }

        .table thead th {
            background-color: cornflowerblue;
            color: white;
            border: none;
        }

        .table tbody td {
            background-color: #fff;
            border: none;
            transition: background-color 0.3s;
        }

        .table tbody tr:hover td {
            background-color: #f0f4f8;
        }

        .form-container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .modal-content {
            background-color: #fff;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
    <title>Panel usuarios</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1>USUARIOS REGISTRADOS EN EL SISTEMA</h1>
                @if (session("status"))
                    <div><h3 style="color:green">{{session("status")}}</h3></div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th class="p-4">Nombre</th>
                                <th class="p-4">Primer apellido</th>
                                <th class="p-4">Segundo apellido</th>
                                <th class="p-4">Email</th>
                                <th class="p-4">Teléfono</th>
                                <th class="p-4">Fecha de Nacimiento</th>
                                <th class="p-4">Código Postal</th>
                                <th class="p-4">DNI</th>
                                <th class="p-4">Tipo</th>
                                <th class="p-4">Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->nombre}}</td>
                                    <td>{{$user->apellido1}}</td>
                                    <td>{{$user->apellido2}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->telefono}}</td>
                                    <td>{{$user->fechaNacimiento}}</td>
                                    <td>{{$user->codPostal}}</td>
                                    <td>{{$user->dni}}</td>
                                    <td>{{$user->tipo}}</td>
                                    <td>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="boton_entradas_obra btn btn-lg">Borrar</button>
                                        </form>
                                        <button class="boton_entradas_obra btn btn-lg" onclick="window.location.href='{{ route('user.edit', ['id' => $user->id]) }}'">Editar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <button class="boton_entradas_obra btn btn-lg mt-4" onclick="window.location.href='{{ route('crear_usuario') }}'">Añadir usuario</button>
                <button class="boton_entradas_obra btn btn-lg mt-4" onclick="window.location.href='{{ route('index') }}'">Volver</button>
            </div>
        </div>
    </div>


</body>
</html>

