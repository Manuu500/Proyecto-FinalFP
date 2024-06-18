{{-- <x-app-layout> --}}
    {{-- <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            {{-- @include('layouts.navigation') --}}

            <!-- Page Content -->
            <main>
                <x-app-layout>
                    <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
                        <h1 class="mb-4">Introducir datos de la compra</h1>
                        <div class="card" style="width: 34rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <form method="POST" action="{{ route('entradas.store')}}" class="w-75">
                                    @csrf
                                    <input type="text" name="tipoEntrada" value="{{$entrada->id}}" hidden>
                                    <input type="text" name="precio" value="{{$entrada->precio}}" hidden>
                                    <div class="mb-3 mt-4 entry-control-compra">
                                        <h4>Número de entradas:</h4>
                                        <img id="minusButton" class="imagen-menos-compra" width="20px" height="20px" src="{{ asset('imagenes/minus-sign.png') }}" alt="Minus"/>
                                        <label id="entryCount" class="mx-3"><strong>1</strong></label>
                                        <input type="hidden" name="num_entrada" id="numeroEntradas" value="1">
                                        <img id="plusButton" class="imagen-mas-compra" width="20px" height="20px" src="{{ asset('imagenes/plus.png') }}" alt="Plus"/>
                                    </div>
                                    <div class="mb-3 mt-4 entry-control">
                                        <h4>¿Qué día desea venir?</h4>
                                        <input type="date" name="fecha_hora_visita" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <h4>Método de pago:</h4>
                                        <select id="metodoPago" name="metodo_pago" class="form-control">
                                            <option value="--">---</option>
                                            <option value="PayPal">PayPal</option>
                                            <option value="Tarjeta">Tarjeta</option>
                                        </select>
                                    </div>
                                    <div id="campoPayPal" class="mb-3" style="display: none;">
                                        <h4>Dirección de correo electrónico a pagar:</h4>
                                        <input type="text" name="cuenta_paypal" class="form-control" value="museoartepictorico@gmail.org" readonly>
                                    </div>
                                    <div id="campoTarjeta" class="mb-3" style="display: none;">
                                        <h4>Número de tarjeta:</h4>
                                        <input type="text" name="numero_tarjeta" class="form-control">
                                        <h4>Fecha de caducidad:</h4>
                                        <input type="text" name="fecha_caducidad" class="form-control">
                                        <h4>CVV:</h4>
                                        <input type="text" name="cvv" class="form-control">
                                    </div>
                                    <input style="" type="submit" class="boton_entradas_comprar btn btn-lg" value="Comprar">
                                    <label><b>Precio:</b> {{$entrada->precio}}$</label>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var minusButton = document.getElementById('minusButton');
                            var plusButton = document.getElementById('plusButton');
                            var entryCount = document.getElementById('entryCount');
                            minusButton.addEventListener('click', function() {
                                var currentValue = parseInt(entryCount.textContent);
                                if (currentValue > 1) {
                                    entryCount.innerHTML = '<strong>' + (currentValue - 1) + '</strong>';
                                    document.getElementById('numeroEntradas').value = currentValue - 1;
                                }
                            });
                            plusButton.addEventListener('click', function() {
                                var currentValue = parseInt(entryCount.textContent);
                                entryCount.innerHTML = '<strong>' + (currentValue + 1) + '</strong>';
                                document.getElementById('numeroEntradas').value = currentValue + 1;
                            });
                        });
                        var metodoPagoSelect = document.getElementById('metodoPago');
                        var campoPayPal = document.getElementById('campoPayPal');
                        var campoTarjeta = document.getElementById('campoTarjeta');
                        metodoPagoSelect.addEventListener('change', function() {
                            if (metodoPagoSelect.value === 'PayPal') {
                                campoPayPal.style.display = 'block';
                                campoTarjeta.style.display = 'none';
                            } else if(metodoPagoSelect.value === 'Tarjeta') {
                                campoPayPal.style.display = 'none';
                                campoTarjeta.style.display = 'block';
                            } else {
                                campoPayPal.style.display = 'none';
                                campoTarjeta.style.display = 'none';
                            }
                        });
                    </script>
                {{-- </x-app-layout> --}}
            {{-- </main>
        </div>
    </body> --}}
</x-app-layout>
