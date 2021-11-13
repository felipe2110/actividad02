<x-app-layout>
    <x-slot name="header">
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <title>Crear Aprendiz</title>
        </head>

        <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('aprendices.store')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Nombres y Apellidos</label>
                                <input type="text" class="form-control" name="nombre">
                            </div>
                            <div class="form-group">
                                <label for="">Correo</label>
                                <input type="email" class="form-control" name="correo">
                            </div>
                            <div class="form-group">
                                <label for="">Género</label>
                                <input class="form-control" id="description" name="genero" list="genero" rows="3">
                                <datalist id ="genero">
                                    <option value="Femenino"></option>
                                    <option value="Masculino"></option>
                                    <option value="Otro"></option>
                                </datalist>
                            </div>
                            <div class="form-group">
                                <label for="">Ficha</label>
                                <input type="text" class="form-control" name="Ficha">
                            </div>
                            <hr>
                            <div class="form-group">
                                <button class="btn btn-primary">Crear</button>
                                <a href="{{url('aprendices')}}" class="btn btn-dark">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </body>

        </html>
    </x-slot>
</x-app-layout>
