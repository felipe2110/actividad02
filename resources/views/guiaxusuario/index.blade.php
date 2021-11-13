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
            <title>Guias</title>
        </head>

        <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <br />
                        @role('instructor')
                        <a href="{{url('guias/create')}}" class="btn btn-primary">Crear Guia</a>
                        @endrole
                        @if(session('status'))
                        <div class="alert alert-success mt-3">
                            {{session('status')}}
                        </div>
                        @endif
                        <figure class="text-center">
                            <h1>Guias</h1>
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
                                            <form action="{{route('guias.destroy',$guia->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('guias.show',$guia->id)}}" class="btn btn-sm btn-info">Detalles</a>
                                                <a href="{{route('guias.edit',$guia->id)}}" class="btn btn-sm btn-warning">Editar</a>
                                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                            </form>
                                        </td>

                                    </tr>
                                    @endforeach()
                                </tbody>
                            </table>
                        </div>
                        {{$guias-> links()}}
                    </div>
                </div>
            </div>
        </body>

        </html>
    </x-slot>


</x-app-layout>
