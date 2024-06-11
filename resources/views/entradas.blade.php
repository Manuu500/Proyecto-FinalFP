<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <title>Entradas</title>
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
            height: 600px;
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

        #boton_entradas:hover {
            background-image: url('../imagenes/ticketnegro.png'); /* Nueva imagen para el hover */
            background-color: cornflowerblue;
            color: black;
        }
    </style>
</head>
<body>

<!-- HEADER -->
<header class="container-fluid header">
    <div class="row">
        <div class="col-sm-12 d-flex">
            <div class="d-flex flex-grow-1 justify-content-around align-items-center">
                <a href="{{route('index')}}">
                    <img class="m-2" width="100px" height="100px" src="../imagenes/blob-modified.png" />
                </a>
            </div>
        </div>
    </div>
</header>


<div class="divTexto div d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col">
            <h1 class="text-center">ENTRADAS</h1>
            <h2 class="text-center">En esta sección podrá consultar las entradas disponibles.</h2>
        </div>
    </div>
</div>


<div class="bg-primary divEntradas">
    <div class="col">
        <div class="row-sm-12 container-center">
            @foreach($tiposEntradas as $tipoEntrada)
            <div style="width: 850px" class="card mt-5">
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
                                <button type="button" class="boton_entradas btn btn-lg" onclick="window.location.href='{{ route('comprar_entradas', ['tipoEntrada' => $tipoEntrada->id], ['precio' => $tipoEntrada->precio]) }}'">
                                    <label>Comprar</label>
                                </button>
                            @else
                                <button type="button" class="boton_entradas btn btn-lg" onclick="window.location.href='{{ route('login') }}'">
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
</body>
</html>
