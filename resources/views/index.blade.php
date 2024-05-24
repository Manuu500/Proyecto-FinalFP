<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <title>Museo Arte Pictórico</title>
    <link rel="stylesheet" href="..\resources\css\app.css">

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>-->
    <style>
        header {
            position: fixed;
            color: cornflowerblue;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            top: 0;
            width: 100%;
            z-index: 3;
        }

        .div-fondo {
            /* filter: brightness(0.7); */
            width: 100%;
            height: 80vh;
            background-image: url('../imagenes/Museo2.png');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: cornflowerblue;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            -webkit-text-stroke: 0.5px black; /* Para navegadores WebKit (Safari, Chrome, etc.) */
            transition: background-size 0.3s ease;
            background-size: 100%;
        }

        .div-fondo:hover {
            background-size: 110%; /* Hacer zoom en la imagen al pasar el ratón */
        }


        .div-obras {
            /* filter: brightness(0.7); */
            background-image: url('../imagenes/persistencia.png');
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50%;
            height: 60vh;
            background-color: aqua;
            color: cornflowerblue;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            -webkit-text-stroke: 0.5px black; /* Para navegadores WebKit (Safari, Chrome, etc.) */
            transition: background-size 0.3s ease;
            background-size: 100%;
        }

        .div-obras:hover {
            background-size: 110%;
            cursor: pointer !important;
        }

        .div-expos{
            /* filter: brightness(0.7); */
            background-image: url('../imagenes/perro_exposicion.png');
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50%;
            height: 60vh;
            background-color: coral;
            color: cornflowerblue;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            -webkit-text-stroke: 0.5px black; /* Para navegadores WebKit (Safari, Chrome, etc.) */
            transition: background-size 0.3s ease;
            background-size: 100%;
        }

        .div-expos:hover{
            background-size: 110%;
            cursor: pointer !important;
        }

        .div-aboutus{
            /* filter: brightness(0.7); */
            background-color: aquamarine;
            background-image: url('../imagenes/exposicionfamosa.png');
            width: 100%;
            height: 70vh;
            background-color: aqua;
            color: cornflowerblue;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            -webkit-text-stroke: 0.5px black; /* Para navegadores WebKit (Safari, Chrome, etc.) */
            background-size: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-size 0.3s ease;
            background-size: 100%;
        }

        .div-aboutus:hover{
            background-size: 110%;
            cursor: pointer !important;
        }

        #boton_entradas {
            height: 8vh;
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
</head>
<body>

<!-- HEADER -->
<header class="container-flex">
    <div class="row m-4 align-items-center">
        <div class="col-sm-7 mx-auto d-flex justify-content-end">
            <h1 class="text-center">MUSEO ARTE PICTÓRICO</h1>
        </div>
        <div class="col text-end">
        <button id="boton_entradas" type="button" class="boton_entradas btn btn-lg" onclick="window.location.href='{{ route('entradas') }}'">
            <label>Entradas</label>
            <img class="ml-2" width="30px" height="30px" src="../imagenes/ticketazul.png"/>
        </button>
        </div>
    </div>
</header>

<section class="div-fondo">
    <div class="row">
        <div class="col-sm-12 align-items-center">
            <h1 class="texto text-center">Bienvenidos!</h1>
            <h2 class="texto text-center ">Horario: 8:00am - 12:30am / 16:00pm - 22:00pm</h2>
        </div>
    </div>
</section>

<!-- CONTENIDOS -->
<section class="div-servicios">
    <div class="row">
        <div class="div-obras text-center col-sm-6" onclick="location.href='url_destino';">
                <div class="row">
                    <div class="col">
                        <h1>Obras</h1>
                        <h2>En esta sección podrá consultar todas las obras existentes en nuestro museo.</h2>
                    </div>
                </div>
        </div>
        <div class="div-expos text-center col-sm-6" onclick="location.href='url_destino';">
                <div class="row">
                    <div class="col">
                        <h1>Exposiciones</h1>
                        <h2>Aquí podrás consultar todas las exposiciones disponibles.</h2>
                    </div>
                </div>
        </div>
    </div>
</section>

<section class="div-aboutus">
    <div class="col">
        <div class="row-sm-12">
            <h1 class="text-center">Sobre Nosotros</h1>
            <h2 class="text-center">Aquí encontrarás todo sobre nuestro museo, nuestra historia, localización y mucho más!</h2>
        </div>
    </div>
</section>




</body>