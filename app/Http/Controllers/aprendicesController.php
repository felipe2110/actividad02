<?php

namespace App\Http\Controllers;

use App\Models\aprendices;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class aprendicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::join('aprendices', 'users.id', '=', 'aprendices.users_id')
               ->get(['users.*', 'aprendices.*'])::paginate(8);

        return view('aprendices.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aprendices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    
    {
        $user = User::create([
            'name'=>$request->input('nombre'),
            'email'=>$request->input('email'),
            'password'=> Hash::make('SENAaprendiz2021'),
        ]);
        $user->assignRole('aprendiz');
        
        $aprendiz = aprendices::create([
            'genero' => $request->input('genero'),
            'ficha' => $request->input('ficha'),
            'users_id'=>$user->id,
        ]);
        return redirect('aprendices')->with('status', 'Se ha creado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\aprendices  $aprendices
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $aprendiz = User::find($id)::join('aprendices', 'users.id', '=', 'aprendices.users_id')
        ->get(['users.*', 'aprendices.*']);
        return view('apendices.show', compact('apendiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\aprendices  $aprendices
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $aprendiz = User::find($id)::join('aprendices', 'users.id', '=', 'aprendices.users_id')
        ->get(['users.*', 'aprendices.*']);
        return view('apendices.edit', compact('apendiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\aprendices  $aprendices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $user =User::find($id)->update([
            'name'=>$request->input('nombre'),
            'email'=>$request->input('email'),
        ]);
        $user->assignRole('aprendiz');
        
        $aprendiz =aprendices::find( $user->id)->update([
            'genero' => $request->input('genero'),
            'ficha' => $request->input('ficha'),
            'users_id'=>$user->id,
        ]);
        return redirect('aprendices')->with('status', 'Se ha actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\aprendices  $aprendices
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    
    {
        $user = User::find($id)->delete();
        $apendiz = User::find($user->Id)->delete();
        return redirect('aprendices')->with('status', 'Se ha eliminado correctamente');
    }
    public function asignar_guia(Request $request, $id)
    
    {
        $user =User::find($id)->update([
            'name'=>$request->input('nombre'),
            'email'=>$request->input('email'),
        ]);
        $user->assignRole('aprendiz');
        
        $aprendiz =aprendices::find( $user->id)->update([
            'genero' => $request->input('genero'),
            'ficha' => $request->input('ficha'),
            'users_id'=>$user->id,
        ]);
        return redirect('aprendices')->with('status', 'Se ha actualizado correctamente');
    }
}
