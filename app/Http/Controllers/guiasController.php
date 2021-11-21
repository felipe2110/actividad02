<?php

namespace App\Http\Controllers;

use App\Models\guias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class guiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guias = guias::paginate(8);
        // select * from products
        return view('guias.index', compact('guias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('guia')) {
            $file = $request->file('guia');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/guias/', $filename);
        }
        $guias = guias::create([
            'nombre' => $request->input('nombre'),
            'tema' => $request->input('tema'),
            'descripcion' => $request->input('descripcion'),
            'duracion' => $request->input('duracion'),
            'guia_aprendizaje' => $filename,
        ]);
        return redirect('guias')->with('status', 'Se ha creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\guias  $guias
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guias = guias::find($id);
        return view('guias.show', compact('guias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\guias  $guias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guias = guias::find($id);
        return view('guias.edit', compact('guias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\guias  $guias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $guias = guias::find($id);
        $guias->nombre = $request->input('nombre');
        $guias->tema = $request->input('tema');
        $guias->descripcion = $request->input('descripcion');
        $guias->duracion = $request->input('duracion');

        if ($request->hasFile('fileImage')) {
            $destination = 'uploads/guias/' . $guias->guia_aprendizaje;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('fileImage');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/guias/', $filename);
            $guias->image = $filename;
        }

        $guias->update();
        return redirect('guias')->with('status', 'Se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\guias  $guias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guias = guias::find($id);
        $destination = 'uploads/guias/' . $guias->guia_aprendizaje;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $guiasxusuario = DB::table('guiasxsuarios')
            ->where('guias_id', $id)
            ->delete();
        $guias = guias::find($id)->delete();
        return redirect(('guias'))->with('status', 'Se ha eliminado correctamente');
    }
}
