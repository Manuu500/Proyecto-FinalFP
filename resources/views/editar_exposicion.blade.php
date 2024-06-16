<x-app-layout>
    <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
        <h1 class="mb-4">Editar exposición</h1>
        <div class="card" style="width: 34rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('expo.update', $exposicion->id) }}" class="w-50" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <!-- Nombre -->
                    <div class="mb-3">
                        <p style="font-size: 20px">Nombre</p>
                        <x-text-input id="nombre" value="{{$exposicion->nombre}}" class="block mt-1 w-full" type="nombre" name="nombre"  required autofocus autocomplete="nombre" />
                        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                    </div>

                    <!-- Descripcion -->
                    <div class="mb-3">
                        <p style="font-size: 20px">Descripcion</p>
                        <x-text-input id="descripcion" value="{{$exposicion->descripcion}}" class="block mt-1 w-full" type="descripcion" name="descripcion" required autocomplete="descripcion" />
                        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                    </div>

                    <!-- Aforo -->
                    <div class="mb-3">
                        <p style="font-size: 20px">Aforo</p>
                        <x-text-input id="aforo" class="block mt-1 w-full" value="{{$exposicion->aforo}}" type="aforo" name="aforo" required autocomplete="aforo" />
                        <x-input-error :messages="$errors->get('aforo')" class="mt-2" />
                    </div>

                    <!-- Fecha de inicio de la exposición -->
                    <div class="mb-3">
                        <p style="font-size: 20px">Fecha de inicio</p>
                        <x-text-input id="fecha_inicio" value="{{$exposicion->fecha_inicio}}" class="block mt-1 w-full" type="date" name="fecha_inicio" required autocomplete="fecha_inicio" />
                        <x-input-error :messages="$errors->get('fecha_inicio')" class="mt-2" />
                    </div>
                    <div class="mt-5">
                        <input value="Actualizar exposicion" type="submit" class="boton_entradas-editarexpo btn btn-lg"></input>
                        <button value="Volver" class="boton_entradas-editarexpo btn btn-lg" onclick="window.location.href='{{ route('listar_exposiciones') }}'">Volver</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
