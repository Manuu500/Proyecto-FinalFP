<x-app-layout>
    <div class="container-fluid d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
        {{-- <img src="../imagenes/blob-modified.png" style="width: 100px; height: 100px"> --}}
        <h1 class="mb-4">Registro de cuenta</h1>
        <div class="card" style="width: 34rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- DNI -->
                    <div class="mb-2">
                        <label for="dni" class="form-label" style="font-size: 18px">DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni') }}">
                        <x-input-error :messages="$errors->get('dni')" class="mt-2" />

                    </div>

                    <!-- Nombre y Teléfono -->
                    <div class="row mb-2">
                        <div class="col">
                            <label for="nombre" class="form-label" style="font-size: 18px">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
                            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                        </div>
                        <div class="col">
                            <label for="telefono" class="form-label" style="font-size: 18px">Teléfono</label>
                            <input type="text" maxlength="9" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}">
                            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />

                        </div>
                    </div>

                    <!-- Primer y Segundo Apellido -->
                    <div class="row mb-2">
                        <div class="col">
                            <label for="apellido1" class="form-label" style="font-size: 18px">Primer apellido</label>
                            <input type="text" class="form-control" id="apellido1" name="apellido1" value="{{ old('apellido1') }}">
                            <x-input-error :messages="$errors->get('apellido1')" class="mt-2" />

                        </div>
                        <div class="col">
                            <label for="apellido2" class="form-label" style="font-size: 18px">Segundo apellido</label>
                            <input type="text" class="form-control" id="apellido2" name="apellido2" value="{{ old('apellido2') }}">
                            <x-input-error :messages="$errors->get('apellido2')" class="mt-2" />

                        </div>
                    </div>

                    <!-- Fecha de Nacimiento y Email -->
                    <div class="row mb-2">
                        <div class="col">
                            <label for="fechaNacimiento" class="form-label" style="font-size: 18px">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" value="{{ old('fecha_nacimiento') }}">
                            <x-input-error :messages="$errors->get('fechaNacimiento')" class="mt-2" />

                        </div>
                        <div class="col">
                            <label for="codPostal" class="form-label" style="font-size: 18px">Código postal</label>
                            <input type="text" class="form-control" id="codPostal" name="codPostal" value="{{ old('codPostal') }}">
                            <x-input-error :messages="$errors->get('codPostal')" class="mt-2" />

                        </div>
                        {{-- <div class="col">
                            <label for="email" class="form-label" style="font-size: 18px">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}
                    </div>

                    <!-- Código Postal -->
                    <div class="col">
                        <label for="email" class="form-label" style="font-size: 18px">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </div>

                    <!-- Contraseña y Confirmar Contraseña -->
                    <div class="row mb-2">
                        <div class="col">
                            <label for="password" class="form-label" style="font-size: 18px">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                        </div>
                        <div class="col">
                            <label for="password_confirmation" class="form-label" style="font-size: 18px">Confirmar contraseña</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <a class="text-decoration-none" href="{{ route('login') }}" style="font-size: 16px">¿Ya estás registrado?</a>
                        <input id="boton_entradas" type="submit" class="boton_entradas btn btn-lg" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
