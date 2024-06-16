<x-app-layout>
    <div class="divTexto div d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col">
                <h1 class="text-center">ENTRADAS</h1>
                <h2 class="text-center">En esta sección podrá consultar las entradas disponibles.</h2>
            </div>
        </div>
    </div>


    <div class="divEntradas">
        <div class="col">
            <div class="d-flex flex-column align-items-center">
                @foreach($tiposEntradas as $tipoEntrada)
                <div class="card mt-5 w-100" style="max-width: 850px;">
                    <div class="card-header d-flex flex-column align-items-center">
                        <h3 class="mb-0">{{ $tipoEntrada->nombre }}</h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <img class="img-responsive" width="300px" height="300px" src="../imagenes/imagenMuseo.jpg"/>
                        </div>
                        <div class="col-sm-8 d-flex justify-content-center align-items-center">
                            <div class="card-body align-items-center">
                                <p class="card-text">Incluye acceso a todas las exposiciones disponibles. </p>
                                <p><b>PRECIO:</b> {{ $tipoEntrada->precio }}$</p>
                                @auth
                                    <button type="button" class="boton_entradas_entrada btn btn-lg" onclick="window.location.href='{{ route('comprar_entradas', ['tipoEntrada' => $tipoEntrada->id, 'precio' => $tipoEntrada->precio]) }}'">
                                        <label>Comprar</label>
                                    </button>
                                @else
                                    <button type="button" class="boton_entradas_entrada btn btn-lg" onclick="window.location.href='{{ route('login') }}'">
                                        <label>Comprar</label>
                                    </button>
                                @endauth
                                <p style="font-size: 12px; color: grey;" class="mt-3">La entrada caduca en un plazo de 1 año</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
