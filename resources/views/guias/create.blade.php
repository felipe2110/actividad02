<x-app-layout>
    <x-slot name="header">
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <title>Crear Guia</title>
        </head>

        <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('guias.store')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" name="nombre">
                            </div>
                            <div class="form-group">
                                <label for="">Tema</label>
                                <input type="text" class="form-control" name="tema">
                            </div>
                            <div class="form-group">
                                <label for="">Descripcion</label>
                                <input class="form-control" id="description" name="descripcion" rows="3"></input>
                            </div>
                            <div class="form-group">
                                <label for="">Duración en Horas</label>
                                <input type="number" class="form-control" name="duracion">
                            </div>
                            <div class="form-group">
                                <label for="">Guia en pdf</label>
                                <input class="form-control" type="file" id="formFile" name="guia">
                            </div>
                            <hr>
                            <div class="form-group">
                                <button class="btn btn-primary">Crear nueva Guia</button>
                                <a href="{{url('guias')}}" class="btn btn-dark">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </body>

        </html>
    </x-slot>
</x-app-layout>
