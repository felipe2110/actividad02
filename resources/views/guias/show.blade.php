<x-app-layout>
    <x-slot name="header">
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <title>Guía: {{$guias->name}}</title>
        </head>

        <body>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <br />
                        <a href="{{url('guias')}}" class="btn btn-warning">Ir al inicio</a>
                        <div class="table-responsive">
                            <table class="table table-striped mt-3">
                                <tr>
                                    <th>NOMBRE</th>
                                    <td>{{$guias->nombre}}</td>
                                </tr>
                                <tr>
                                    <th>TEMA</th>
                                    <td>{{$guias->tema}}</td>
                                </tr>
                                <tr>
                                    <th>DESCRIPCIÓN</th>
                                    <td>{{$guias->descripcion}}</td>
                                </tr>
                                <tr>
                                    <th>DURACIÓN</th>
                                    <td>{{$guias->duracion}}</td>
                                </tr>
                                <tr>
                                    <th>Guía de Aprendizaje</th>
                                    <td>
                                        <iframe src="{{ asset('uploads/guias/'. $guias->guia_aprendizaje)}}" width="500px" height="800px">
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>
    </x-slot>


</x-app-layout>
