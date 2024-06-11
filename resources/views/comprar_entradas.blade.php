<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    {{-- <link rel="icon" href="{{ asset('imagenes/patitas_solidarias.jpg') }}" type="image/x-icon"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        .entry-control img {
            margin: 0 10px; /* Ajusta el margen según sea necesario */
        }

        .imagen-menos{
            cursor: pointer;
        }

        .imagen-mas{
            cursor: pointer;
        }

        #boton_entradas {
            height: 6vh;
            border-radius: 0;
            background-color: transparent;
            border: 1px solid cornflowerblue;
            color: cornflowerblue;
        }

        #boton_entradas:hover {
            background-image: url('../imagenes/ticketnegro.png'); /* Nueva imagen para el hover */
            background-color: cornflowerblue;
            color: black;
        }
    </style>
    <title>Comprar entradas</title>
</head>
<body style="background-color: #fbf2d5;">
    <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
        {{-- <img src="/imagenes/patitas_solidarias.jpg" style="width: 150px; height: 150px"> --}}
        <h1 class="mb-4">Introducir datos de la compra</h1>
        <div class="card" style="width: 34rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">

                <form method="POST" action="{{ route('entradas.store')}}" class="w-75">
                    @csrf

                    <input type="text" name="tipoEntrada" value="{{$entrada->id}}" hidden>
                    <input type="text" name="precio" value="{{$entrada->precio}}" hidden>


                    {{-- <input type="hidden" name="tipo_entrada_id" value="{{ $tipoEntrada->id }}"> --}}

                    <!-- Número de entradas -->
                    <div class="mb-3 mt-4 entry-control">
                        <h4>Número de entradas:</h4>
                        <img id="minusButton" class="imagen-menos" width="20px" height="20px" src="../imagenes/minus-sign.png" alt="Minus"/>
                        <label id="entryCount" class="mx-3"><strong>1</strong></label>
                        <input type="hidden" name="num_entrada" id="numeroEntradas" value="1">
                        <img id="plusButton" class="imagen-mas" width="20px" height="20px" src="../imagenes/plus.png" alt="Plus"/>
                    </div>

                    <!-- Fecha de visita -->
                    <div class="mb-3 mt-4 entry-control">
                        <h4>¿Qué día desea venir?</h4>
                        <input type="date" name="fecha_hora_visita" class="form-control">
                    </div>

                    <!-- Método pago -->
                    <div class="mb-3">
                        <h4>Método de pago:</h4>
                        <select id="metodoPago" name="metodo_pago" class="form-control">
                            <option value="--">---</option>
                            <option value="PayPal">PayPal</option>
                            <option value="Tarjeta">Tarjeta</option>
                        </select>
                    </div>

                    <!-- Número de cuenta PayPal (dinámico) -->
                    <div id="campoPayPal" class="mb-3" style="display: none;">
                        <h4>Dirección de correo electrónico a pagar:</h4>
                        <input type="text" name="cuenta_paypal" class="form-control" value="museoartepictorico@gmail.org" readonly>
                    </div>

                    <!-- Datos de tarjeta de crédito (dinámico) -->
                    <div id="campoTarjeta" class="mb-3" style="display: none;">
                        <h4>Número de tarjeta:</h4>
                        <input type="text" name="numero_tarjeta" class="form-control">
                        <h4>Fecha de caducidad:</h4>
                        <input type="text" name="fecha_caducidad" class="form-control">
                        <h4>CVV:</h4>
                        <input type="text" name="cvv" class="form-control">
                    </div>


                    <input type="submit" id="boton_entradas" type="button" class="boton_entradas btn btn-lg" value="Comprar"></input>
                    <label><b>Precio:</b> 14,99$</label>
                </form>
            </div>
        </div>
    </div>
</body>



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
    // var campoBizum = document.getElementById('campoBizum');

    metodoPagoSelect.addEventListener('change', function() {
        if (metodoPagoSelect.value === 'PayPal') {
            campoPayPal.style.display = 'block';
            campoTarjeta.style.display = 'none';
        } else if(metodoPagoSelect.value === 'Tarjeta') {
            campoPayPal.style.display = 'none';
            campoTarjeta.style.display = 'block';
        } else if(metodoPagoSelect.value === 'Bizum'){

        } else {
            campoPayPal.style.display = 'none';
            campoTarjeta.style.display = 'none';
        }
    });
</script>

</html>






