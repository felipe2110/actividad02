<x-app-layout>
    <x-slot name="header">
        <!DOCTYPE html>
        <html lang="en">


        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="{{url('resources/css/guias_styles.css')}}" rel="stylesheet">
            <title>Mis Guias Asignadas</title>
        </head>

        <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <br />
                        <figure class="text-center">
                            <h1> Mis Guías Asignadas</h1>
                        </figure>
                        <div class="table-responsive">
                            <table class="table table-striped mt-1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NOMBRE</th>
                                        <th>TEMA</th>
                                        <th>DESCRIPCIÓN</th>
                                        <th>DURACIÓN</th>
                                        <th>ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($guias as $guia)
                                    <tr>
                                        <td>{{$guia -> id}}</td>
                                        <td>{{$guia -> nombre}}</td>
                                        <td>{{$guia -> tema}}</td>
                                        <td>{{$guia -> descripcion}}</td>
                                        <td>{{$guia -> duracion}}</td>
                                        <td>
                                                <a href="{{route('guias.show',$guia->id)}}" class="btn btn-sm btn-info">Detalles</a>
                                        </td>

                                    </tr>
                                    @endforeach()
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>
    </x-slot>


</x-app-layout>
