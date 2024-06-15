<x-app-layout>
    <div class="divTexto div d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Mis compras</h1>
                <h2 class="text-center">En esta sección podrá consultar todas las entradas que usted haya adquirido.</h2>
            </div>
        </div>
    </div>

    <div class="divEntradas py-5 bg-white">
        <div class="container">
            <h1 class="mb-4">Registro de compras</h1>
            @if($entradas->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Método de pago</th>
                            <th scope="col">Fecha de compra</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entradas as $index =>$entrada)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $entrada->tipoEntrada->nombre }}</td>
                                <td>{{ $entrada->tipoEntrada->precio }}</td>
                                <td>{{ $entrada->num_entrada}}</td>
                                <td>{{ $entrada->metodo_pago}}</td>
                                <td>{{ $entrada->fecha_compra}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No se encontraron entradas compradas.</p>
            @endif
        </div>
    </div>

</x-app-layout>
