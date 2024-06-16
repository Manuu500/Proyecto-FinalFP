<x-app-layout>
    <div class="container vh-200 mt-custom"> <!-- La clase mt-custom proporciona el margen superior -->
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">USUARIOS REGISTRADOS EN EL SISTEMA</h1>

                @if (session("status"))
                    <div><h3 style="color:green">{{session("status")}}</h3></div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered text-center table-sm">
                        <thead>
                            <tr>
                                <th class="p-4">Nombre</th>
                                <th class="p-4">Primer apellido</th>
                                <th class="p-4">Segundo apellido</th>
                                <th class="p-4">Email</th>
                                <th class="p-4">Fecha de Nacimiento</th>
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
                                    <td>{{$user->fechaNacimiento}}</td>
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
                    {{ $users->links() }}
                </div>
                <button class="boton_entradas_obra btn btn-lg mt-4" onclick="window.location.href='{{ route('crear_usuario') }}'">Añadir usuario</button>
                <button class="boton_entradas_obra btn btn-lg mt-4" onclick="window.location.href='{{ route('index') }}'">Volver</button>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('form:not(#form-buscar)').forEach(form => {
            form.addEventListener('submit', function(event) {
                if (!confirm('¿Estás seguro de que deseas eliminar esta usuario?')) {
                    event.preventDefault();
                }
            });
        });
    </script>
</x-app-layout>
