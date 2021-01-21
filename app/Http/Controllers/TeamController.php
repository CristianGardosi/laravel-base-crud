<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Model di riferimento DB
use App\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // !ARCHIVIO/TABELLA DATI + BOTTONI MODIFICA
    public function index()
    {   
        // Get data from DB
        $teams = Team::all();
        // Entro nella cartellina teams all'interno delle mie views e hitto il file index.blade.php creato ad hoc per contenere l'archivio dati con struttura tabellare
        // Passo i dati con il metodo compact
        return view('teams.index', compact('teams'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // !DETAILS PAGE PER IL SINGOLO DATO
    public function show($id)
    {
        $team = Team::find($id);
        
        return view('teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
