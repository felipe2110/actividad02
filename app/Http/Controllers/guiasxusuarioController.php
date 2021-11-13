<?php

namespace App\Http\Controllers;

use App\Models\guiasxusuarios;
use App\Models\User;
use Illuminate\Http\Request;

class guiasxusuarioController extends Controller
{
    public function index($id)
    {
        $guiasxusuarios = guiasxusuarios::join('guias', 'guias.id', '=', 'guiasxusuarios.guias_id')->where('guiasxusuarios.aprendices_id =' . $id)
            ->get(['guias.*', 'aprendices.*']);

        return view('guiasxusuarios.index', compact('guiasxusuarios'));
    }

    public function create()
    {
        return view('guias.create');
    }
    public function store(Request $request, $id)

    {
        $user = guiasxusuarios::create([
            'aprendices_id' => $request->input('aprendiz'),
            'guias_id' => $request->$id,
        ]);
        return redirect('guisxusuario')->with('status', 'Se ha creado correctamente');
    }
    public function storexficha(Request $request, $id, $ficha)
    {

        $users = User::join('aprendices', 'users.id', '=', 'aprendices.users_id')
            ->get(['users.*', 'aprendices.*']);

        foreach ($users as $key => $data) {
            guiasxusuarios::create([
                'aprendices_id'       =>  $data->$id,
                'guias_id' => $request->$id,
            ]);
        }
        return redirect('guisxusuario')->with('status', 'Se ha creado correctamente');
    }
}
