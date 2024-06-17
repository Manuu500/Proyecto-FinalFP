<x-app-layout>

    @if (session('success'))
        {{-- <div class="alert alert-success">

        </div> --}}
        <div class="modal fade" id="bienvenidaModal" tabindex="-1" aria-labelledby="bienvenidaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                   <strong>{{ session('success') }}</strong>
                </div>
                <button id="botonCerrarModal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var myModal = new bootstrap.Modal(document.getElementById('bienvenidaModal'));
                myModal.show();
            });
        </script>
    @endif

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
            <div class="div-obras text-center col-sm-6" onclick="location.href='{{route('listar_obras')}}';">
                    <div class="row">
                        <div class="col">
                            <h1>Obras</h1>
                            <h2>En esta sección podrá consultar todas las obras existentes en nuestro museo.</h2>
                        </div>
                    </div>
            </div>
            <div class="div-expos text-center col-sm-6" onclick="location.href='{{route('listar_exposiciones')}}';">
                <div class="row">
                    <div class="col">
                        <h1>Exposiciones</h1>
                        <h2>Aquí podrás consultar todas las exposiciones disponibles.</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="div-aboutus" onclick="location.href='{{route('sobrenosotros')}}';">
        <div class="col">
            <div class="row-sm-12">
                <h1 class="text-center">Sobre Nosotros</h1>
                <h2 class="text-center">Aquí encontrarás todo sobre nuestro museo, nuestra historia, localización y mucho más!</h2>
            </div>
        </div>
    </section>


</x-app-layout>
