<?php

namespace App\Http\Controllers;

use App\Models\guias;
use App\Models\guiasxusuarios;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class guiasxusuarioController extends Controller
{
    public function index($id)
    {
        $guias  = DB::table('guiasxsuarios')
            ->join('guias', 'guias.id', '=', 'guiasxsuarios.guias_id')
            ->select('guias.id', 'guias.nombre', 'guias.descripcion', 'guias.tema', 'guias.duracion')
            ->where('users_id', $id)
            ->get();

        return view('guiaxusuario.index', compact('guias'));
    }

    public function asignarGuiaUsuario($id)
    {
        $users = DB::table('users')
            ->join('aprendices', 'users.id', '=', 'aprendices.users_id')
            ->select('users.id', 'users.name', 'users.email', 'aprendices.genero', 'aprendices.ficha')
            ->get();
        $guias = guias::all();
        $idUserSelected = $id;
        return view('guiaxusuario.create')->with(compact('users'))->with(compact('guias'))->with(compact('idUserSelected'));
    }

    public function storeAsignarGuiaUsuario(Request $request)
    {
        if (guiasxusuarios::where([
            ['users_id', '=', $request->input('aprendiz_id')],
            ['guias_id', '=', $request->input('guia_id')],
        ])->exists()) {
            return redirect('aprendices')->with('status', 'El aprendiz ya cuenta con la guía asignada');
        } else {
            $user = guiasxusuarios::create([
                'users_id' => $request->input('aprendiz_id'),
                'guias_id' => $request->input('guia_id'),
            ]);
            return redirect('aprendices')->with('status', 'Guía Asignada correctamente');
        }

    }

    public function asignarGuiaFicha()
    {
        $ficha = DB::table('users')
            ->join('aprendices', 'users.id', '=', 'aprendices.users_id')
            ->select('aprendices.ficha')
            ->groupBy('aprendices.ficha')
            ->get();
        $guias = guias::all();
        return view('guiaxFicha.create')->with(compact('ficha'))->with(compact('guias'));
    }
    public function guardarAsignarGuiaFicha(Request $request)
    {
        $ficha = $request->input('aprendiz_id');

        $users = User::join('aprendices', 'users.id', '=', 'aprendices.users_id')
            ->where('aprendices.ficha', $ficha)
            ->get(['users.id']);

        foreach ($users as $user) {
            if (guiasxusuarios::where([
                ['users_id', '=', $user->id],
                ['guias_id', '=', $request->input('guia_id')],
            ])->exists()) {
            } else {
                guiasxusuarios::create([
                    'users_id' => $user->id,
                    'guias_id' => $request->input('guia_id'),
                ]);
            }
        }
        return redirect('aprendices')->with('status', 'Guía Asignada correctamente');
    }
}
