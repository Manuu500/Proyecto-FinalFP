<x-app-layout>
    <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
        <h1 class="mb-4">Crear Exposición</h1>
        <div class="card crearexpo" style="width: 34rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
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
                        <input value="Crear nueva exposición" type="submit" class="boton_entradas_crearexpo btn btn-lg"></input>
                        <button value="Volver" class="boton_entradas_crearexpo btn btn-lg" onclick="window.location.href='{{ route('listar_exposiciones') }}'">Volver</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

