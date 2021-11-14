<?php

namespace App\Http\Controllers;

use App\Models\aprendices;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class aprendicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
        ->join('aprendices', 'users.id', '=', 'aprendices.users_id')
        ->select('users.id', 'users.name', 'users.email', 'aprendices.genero','aprendices.ficha')
        ->get();
        return view('aprendices.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ficha = DB::table('users')
        ->join('aprendices', 'users.id', '=', 'aprendices.users_id')
        ->select('aprendices.ficha')
        ->groupBy('aprendices.ficha')
        ->get();
        return view('aprendices.create',compact('ficha'));
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
            'name'=>$request->input('name'),
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
        $user = User::find($id);
        $aprendiz = aprendices::where('users_id', $user->id)->first();
        return view('aprendices.show', compact('user'), compact('aprendiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\aprendices  $aprendices
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $user = User::find($id);
        $aprendiz = aprendices::where('users_id', $user->id)->first();
        $ficha = DB::table('users')
        ->join('aprendices', 'users.id', '=', 'aprendices.users_id')
        ->select('aprendices.ficha')
        ->groupBy('aprendices.ficha')
        ->get();
        return view('aprendices.edit')->with(compact('ficha'))->with(compact('user'))->with(compact('aprendiz'));
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
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
        ]);
        $aprendiz = aprendices::where('users_id', $id)->first()->update([
            'genero' => $request->input('genero'),
            'ficha' => $request->input('ficha'),
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
        $aprendiz = aprendices::where('users_id', $id)->first()->delete();
        $user = User::find($id)->delete();
        return redirect('aprendices')->with('status', 'Se ha eliminado correctamente');
    }


}
