<x-app-layout>
    <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
        <h1 class="mb-4">Editar obra</h1>
        <div class="card" style="width: 34rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('obra.update', $obra->id) }}" class="w-50" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <!-- Nombre -->
                    <div class="mb-3">
                        <p style="font-size: 20px">Nombre</p>
                        <x-text-input id="nombre" value="{{$obra->nombre}}" class="block mt-1 w-full" type="nombre" name="nombre" required autofocus autocomplete="nombre" />
                        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                    </div>

                    <!-- Descripcion -->
                    <div class="mb-3">
                        <p style="font-size: 20px">Descripcion</p>
                        <x-text-input id="descripcion" value="{{$obra->descripcion}}" class="block mt-1 w-full" type="descripcion" name="descripcion" required autocomplete="descripcion" />
                        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                    </div>

                    <!-- Artista -->
                    <div class="mb-3">
                        <p style="font-size: 20px">Artista</p>
                        <x-text-input id="artista" value="{{$obra->artista}}" class="block mt-1 w-full" type="artista" name="artista" required autocomplete="artista" />
                        <x-input-error :messages="$errors->get('artista')" class="mt-2" />
                    </div>

                    <!-- Fecha de creación de la obra -->
                    <div class="mb-3">
                        <p style="font-size: 20px">Fecha de creación</p>
                        <x-text-input id="fecha_creacion" value="{{$obra->fecha_creacion}}" class="block mt-1 w-full" type="date" name="fecha_creacion" required autocomplete="fecha_creacion" />
                        <x-input-error :messages="$errors->get('fecha_creacion')" class="mt-2" />
                    </div>

                    <!-- Foto -->
                    <div class="mb-3">
                        <p style="font-size: 20px">Foto de la obra</p>
                        <x-text-input id="foto" value="{{$obra->foto}}" class="block mt-1 w-full" type="file" name="foto" autocomplete="foto" />
                        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    </div>

                    <!-- Exposiciones -->
                    <div class="mb-3">
                        <p style="font-size: 20px">Seleccionar exposiciones</p>
                        @foreach ($exposiciones as $exposicion)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="exposicion_{{ $exposicion->id }}" name="exposiciones[]" value="{{ $exposicion->id }}" {{ $obra->exposiciones->contains($exposicion->id) ? 'checked' : '' }}>
                                <label class="form-check-label" for="exposicion_{{ $exposicion->id }}">
                                    {{ $exposicion->nombre }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-5">
                        <input value="Actualizar obra" type="submit" class="boton_entradas_editobra btn btn-lg"></input>
                        <button value="Volver" class="boton_entradas_editobra btn btn-lg" onclick="window.location.href='{{ route('listar_obras') }}'">Volver</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
