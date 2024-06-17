<x-app-layout>
            {{-- @include('layouts.navigation') --}}

            <!-- Page Content -->
            <main>
                <x-app-layout>
                    <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
                        <h1 class="mb-4">Introducir datos de la reserva</h1>
                        <div class="card" style="width: 34rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <form method="POST" action="{{ route('entradasExpo.store')}}" class="w-75">
                                    @csrf

                                    {{-- <div class="mb-3 mt-4 entry-control-compra">
                                        <h4>Número de entradas:</h4>
                                        <img id="minusButton" class="imagen-menos-compra" width="20px" height="20px" src="{{ asset('imagenes/minus-sign.png') }}" alt="Minus"/>
                                        <label id="entryCount" class="mx-3"><strong>1</strong></label>
                                        <input type="hidden" name="num_entrada" id="numeroEntradas" value="1">
                                        <img id="plusButton" class="imagen-mas-compra" width="20px" height="20px" src="{{ asset('imagenes/plus.png') }}" alt="Plus"/>
                                    </div> --}}
                                    <div class="mb-3 mt-4 entry-control">
                                        <h4>¿Qué día desea venir?</h4>
                                        <input type="date" name="fecha_visita" class="form-control">
                                    </div>

                                    <div id="campoPayPal" class="mb-3" style="display: none;">
                                        <h4>Dirección de correo electrónico a pagar:</h4>
                                        <input type="text" name="cuenta_paypal" class="form-control" value="museoartepictorico@gmail.org" readonly>
                                    </div>
                                    <div id="campoBizum" class="mb-3" style="display: none;">
                                        <h4>Movil donde pagar:</h4>
                                        <input type="text" name="cuenta_bizum" class="form-control" value="648296765" readonly>
                                    </div>
                                    <input style="" type="submit" class="boton_entradas_comprar btn btn-lg" value="Reservar">
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- <script>
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
                        var campoBizum = document.getElementById('campoBizum');
                        var campoTarjeta = document.getElementById('campoTarjeta');
                        metodoPagoSelect.addEventListener('change', function() {
                            if (metodoPagoSelect.value === 'Bizum') {
                                campoBizum.style.display = 'block';
                                campoTarjeta.style.display = 'none';
                            } else if(metodoPagoSelect.value === 'Tarjeta') {
                                campoBizum.style.display = 'none';
                                campoTarjeta.style.display = 'block';
                            } else {
                                campoBizum.style.display = 'none';
                                campoTarjeta.style.display = 'none';
                            }
                        });
                    </script> --}}
                </x-app-layout>
            </main>
        </div>
</x-app-layout>
