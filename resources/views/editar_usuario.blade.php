<x-app-layout>
    <div class="container-eu mt-5 body-eu">
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
                    </div>
                </form>
                <div class="d-flex align-items-center justify-content-center mt-3">
                    <button class="btn btn-custom btn-lg" onclick="window.location.href='{{ route('gestion_usuarios') }}'">Volver</button>
                </div>
            </div>
            <div class="card-footer">
                <p>&copy; 2024 Museo Arte Pictórico</p>
            </div>
        </div>
    </div>
</x-app-layout>

