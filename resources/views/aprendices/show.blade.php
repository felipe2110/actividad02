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
        </body>

        </html>
    </x-slot>


</x-app-layout>
