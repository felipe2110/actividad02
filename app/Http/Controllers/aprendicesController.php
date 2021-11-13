<?php

namespace App\Http\Controllers;

use App\Models\aprendices;
use App\Models\User;
use Illuminate\Http\Request;

class aprendicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aprendices = User::paginate(8);
        return view('aprendices.index', compact('aprendices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\aprendices  $aprendices
     * @return \Illuminate\Http\Response
     */
    public function show(aprendices $aprendices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\aprendices  $aprendices
     * @return \Illuminate\Http\Response
     */
    public function edit(aprendices $aprendices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\aprendices  $aprendices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, aprendices $aprendices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\aprendices  $aprendices
     * @return \Illuminate\Http\Response
     */
    public function destroy(aprendices $aprendices)
    {
        //
    }
}
