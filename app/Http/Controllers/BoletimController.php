<?php

namespace App\Http\Controllers;

use App\Boletim;
use Illuminate\Http\Request;

class BoletimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json([
            'boletins' =>
                Boletim::where(['aluno_id' => $request->get('alunoid')])->get(),
        ], 200);
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
        $boletimToSave = new Boletim();
        $boletimToSave->aluno_id = $request->get('alunoid');
        $boletimToSave->materia = $request->get('materia');
        $boletimToSave->nota = $request->get('nota');
        $boletimToSave->faltas = $request->get('faltas');
        $boletimToSave->save();
        return response()->json($boletimToSave);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Boletim  $boletim
     * @return \Illuminate\Http\Response
     */
    public function show(Boletim $boletim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Boletim  $boletim
     * @return \Illuminate\Http\Response
     */
    public function edit(Boletim $boletim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Boletim  $boletim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boletim $boletim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Boletim  $boletim
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boletim $boletim)
    {
        $boletim->delete();
    }
}
