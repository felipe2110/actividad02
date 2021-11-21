<x-app-layout>
    <x-slot name="header">
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <title>Aprendiz: {{$user->name}}</title>
        </head>

        <body>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <br />
                        <a href="{{url('aprendices')}}" class="btn btn-warning">Ir al inicio</a>
                        <br />
                        <figure class="text-center">
                            <h5>Aprendiz</h5>
                        </figure>
                        <div class="table-responsive">
                            <table class="table table-striped mt-3">
                                <tr>
                                    <th>NOMBRE</th>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <th>CORREO</th>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <th>GÉNERO</th>
                                    <td>{{$aprendiz->genero}}</td>
                                </tr>
                                <tr>
                                    <th>FICHA</th>
                                    <td>{{$aprendiz->ficha}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <br />
                        <figure class="text-center">
                            <h5>Guías Asignadas</h5>
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
