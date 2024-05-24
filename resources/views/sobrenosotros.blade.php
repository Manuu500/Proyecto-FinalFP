<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <title>Sobre nosotros</title>

    <style>
        .divTexto{
            background-image: url('../imagenes/article.jpg');
            background-size: cover;
            background-position: center;
        }

        .header{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        .img-responsive {
            width: 100%;
            height: auto;
        }

        .div{
            color: cornflowerblue;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            -webkit-text-stroke: 0.5px black; /* Para navegadores WebKit (Safari, Chrome, etc.) */
            height: 500px;
        }

        .letra{
            color: cornflowerblue;
            /* text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); */ */
            /* -webkit-text-stroke: 0.5px black; Para navegadores WebKit (Safari, Chrome, etc.) */ */
        }

        .letra2{
            /* color: rgb(0, 0, 0); */
            /* text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); */ */
            /* -webkit-text-stroke: 0.5px black; Para navegadores WebKit (Safari, Chrome, etc.) */ */
        }

        .divEntradas{
            height: 500px;
            /* overflow-y: auto; */
        }

        .container-center {
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100vh; */
        }

        #boton_entradas {
            height: 6vh;
            border-radius: 0;
            background-color: transparent;
            border: 1px solid cornflowerblue;
            color: cornflowerblue;
        }

        .div-fondo {
            /* filter: brightness(0.7); */
            width: 100%;
            height: 80vh;
            background-image: url('../imagenes/imagen-museo-oscura.png');
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

        .div-aboutus{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            /* background-color: grey; */
        }

        .div-imagen{
            background-image: url('../imagenes/creador_museo.jpg');
            width: 100%;
            height: 300px; /* Ajusta la altura según tus necesidades */
            background-size: cover; /* La imagen se ajusta al tamaño del div */
            background-repeat: no-repeat; /* Evita la repetición de la imagen */
            background-position: center; /* Centra la imagen dentro del div */
        }


        #boton_entradas:hover {
            background-image: url('../imagenes/ticketnegro.png'); /* Nueva imagen para el hover */
            background-color: cornflowerblue;
            color: black;
        }

        .img-container {
            width: 100%;
            height: auto;
            overflow: hidden;
        }

    </style>
</head>
<body>


<!-- HEADER -->
<header class="container-fluid header">
    <div class="row justify-content-center align-items-center">
        <div class="col-sm-12 text-center">
            <a href="{{route('index')}}">
                <img class="m-2" width="100px" height="100px" src="../imagenes/blob-modified.png" />
            </a>
        </div>
    </div>
</header>


<section class="container-fluid div-fondo">
    <div class="row">
        <div class="col-sm-12 align-items-center">
            <h1 class="texto text-center">¿Quiénes somos?</h1>
            <h2 class="texto text-center mt-5">En Museo de arte pictórico, nos enorgullece ofrecerte exposiciones y obras de la más alta calidad. Ubicados en la hermosa zona de Paseo del Parque en Málaga, nos esforzamos por combinar innovación y tradición para superar tus expectativas.</h2>
        </div>
    </div>
</section>

<section class="div-aboutus">
    <div class="row">
        <div class="col-sm-6 d-flex align-items-center justify-content-center">
            <div class="col letra2">
                <div class="row m-4 mt-3 text-center"> <!-- Ajuste del margen superior aquí -->
                    <h1 style="margin-top: 20px;">¿Cuál es nuestra historia?</h1> <!-- Ajuste del margen superior aquí -->
                </div>
                <div class="row m-4 mt-5 mb-5">
                    <h4>
                        <p>El Museo Urbano de Málaga tiene una historia tan fascinante como las exposiciones que
                            alberga. Fue fundado en el año 1984 por Manuel Urbano, un apasionado coleccionista y amante
                            del arte con una visión única.
                        </p>
                        <p class="mt-5">
                            Desde su inauguración, el Museo Urbano se ha convertido en un pilar cultural de Málaga. Las
                            exposiciones, que abarcan desde arte renacentista hasta arte contemporáneo, así como una
                            vasta colección de artefactos históricos, reflejan la pasión y dedicación de Manuel.
                        </p>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-sm-6 d-flex align-items-center justify-content-center">
            <img src="../imagenes/creador_museo.jpg" class="img-fluid"
                style="width: 100%; height: 100%; object-fit: cover;" />
        </div>
    </div>
</section>





</body>
</html>
