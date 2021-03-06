<x-app-layout>
    <x-slot name="header">
        <!DOCTYPE html>
        <html lang="en">


        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <title>Aprendices</title>
        </head>

        <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <br />
                        @role('instructor')
                        <a href="{{url('aprendices/create')}}" class="btn btn-primary">Crear Aprendiz</a>
                        <a href="{{url('asignar-guias/asignarGuiaFicha')}}" class="btn btn-success">Asignar Guía a una Ficha</a>
                        @endrole
                        @if(session('status'))
                        <div class="alert alert-success mt-3">
                            {{session('status')}}
                        </div>
                        @endif
                        <figure class="text-center">
                            <h1>Aprendices</h1>
                        </figure>
                        <div class="table-responsive">
                            <table class="table table-striped mt-1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NOMBRE</th>
                                        <th>EMAIL</th>
                                        <th>GÉNERO</th>
                                        <th>FICHA</th>
                                        <th>ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $aprendiz)
                                    <tr>
                                        <td>{{$aprendiz -> id}}</td>
                                        <td>{{$aprendiz -> name}}</td>
                                        <td>{{$aprendiz -> email}}</td>
                                        <td>{{$aprendiz -> genero}}</td>
                                        <td>{{$aprendiz -> ficha}}</td>
                                        <td>
                                            <form action="{{route('aprendices.destroy',$aprendiz->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('asignar-guias.asignarGuiaUsuario',$aprendiz->id)}}" class="btn btn-sm btn-success">Asignar Guía</a>
                                                <a href="{{route('aprendices.show',$aprendiz->id)}}" class="btn btn-sm btn-info">Detalles</a>
                                                <a href="{{route('aprendices.edit',$aprendiz->id)}}" class="btn btn-sm btn-warning">Editar</a>
                                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                            </form>
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
