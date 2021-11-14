<x-app-layout>
    <x-slot name="header">
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <title>Editar Aprendiz</title>
        </head>

        <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('aprendices.update',$user->id)}}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Nombres y Apellidos</label>
                                <input type="text" class="form-control" name="name" value="{{$user->name}}">
                            </div>
                            <div class="form-group">
                                <label for="">Correo</label>
                                <input type="email" class="form-control" name="email" value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <label for="">Género</label>
                                <input class="form-control" id="description" name="genero" list="genero" rows="3" value="{{$aprendiz->genero}}">
                                <datalist id ="genero">
                                    <option value="Femenino"></option>
                                    <option value="Masculino"></option>
                                    <option value="Otro"></option>
                                </datalist>
                            </div>
                            <div class="form-group">
                                <label for="">Ficha</label>
                                <input type="text" class="form-control" name="ficha" value="{{$aprendiz->ficha}}">
                                <datalist id ="ficha">
                                @foreach($ficha as $ficha)
                                    <option  value="{{$ficha -> ficha}}">{{$ficha -> ficha}}</option>
                                    @endforeach()
                                </datalist>
                            </div>
                            <hr>
                            <div class="form-group">
                                <button class="btn btn-primary">Editar Aprendiz</button>
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
