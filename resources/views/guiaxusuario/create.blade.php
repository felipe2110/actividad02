<x-app-layout>
    <x-slot name="header">
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <title>Asignar Guia</title>
        </head>

        <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('asignar-guias.storeAsignarGuiaUsuario')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Aprendiz</label>
                                <select id="Select" class="form-select" name="aprendiz_id">
                                    @foreach($users as $aprendiz)
                                    <option  value="{{$aprendiz -> id}}" {{ $aprendiz -> id == $idUserSelected ? 'selected' : '' }}>{{$aprendiz -> name}}</option>
                                    @endforeach()
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Guía</label>
                                <select id="Select" class="form-select" name="guia_id">
                                    @foreach($guias as $guia)
                                    <option  value="{{$guia -> id}}">{{$guia -> nombre}}</option>
                                    @endforeach()
                                </select>
                            </div>
                            <hr>
                            <div class="form-group">
                                <button class="btn btn-primary">Asignar Guia</button>
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
