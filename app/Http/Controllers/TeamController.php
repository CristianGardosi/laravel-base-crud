<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Model di riferimento DB
use App\Team;
// Validation control for unique(edit)
use Illuminate\Validation\Rule;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // !ARCHIVIO/TABELLA DATI + BOTTONI MODIFICA (get)
    public function index()
    {   
        // Get data from DB

        // Tutti in una pagina
        // $teams = Team::all();

        // Paginazione gestita custom (20 per pagina)
        $teams = Team::paginate(20);
        
        // Entro nella cartellina teams all'interno delle mie views e hitto il file index.blade.php creato ad hoc per contenere l'archivio dati con struttura tabellare
        // Passo i dati con il metodo compact
        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  !PAGINA CREAZIONALE (FORM) (get)
    public function create()
    {   
        // Ritorno la vista con form per creazione nuovo dato
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // !STORE DATI INVIATI DALL'UTENTE TRAMITE FORM
    public function store(Request $request)
    {
        // Richiedi tutti i dati inviati dall'utente tramite form
        $data = $request->all();

        // Validazione dati inseriti dall'utente
        $request->validate([
            'name' => 'required|unique:teams|max:30',
            'city' => 'required|max:30',  
            'superstar' => 'required|unique:teams|max:50' 
        ]);

        // Salvataggio dati se corretti
        $newteam = new Team();
        $newteam->name = $data['name'];
        $newteam->city = $data['city'];
        $newteam->superstar = $data['superstar'];  

        $saved = $newteam->save();

        // Se tutto è andato a buon fine faccio andare il mio utente alla pagina index con la tabella aggiornata w/ nuovo elemento
        if($saved) {
            return redirect()->route('teams.index');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // !DETAILS PAGE PER IL SINGOLO DATO (get)
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

    // !EDIT DI DATO ESISTENTE
    public function edit($id)
    {
        $team = Team::find($id);
        
        return view('teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // !"STORE" DATI DI UPDATE INVIATI DALL'UTENTE TRAMITE FORM DI EDIT 
    public function update(Request $request, $id)
    {
        // Data pick dalla form edit
        $data = $request->all();
        // Istanza specifica editata
        $team = Team::find($id);

        // Validazion (+ unique issue)
        $request->validate([
            'name' => [
                'required',
                Rule::unique('teams')->ignore($id),
                'max:30'
            ],
            'city' => 'required|max:30',  
            'superstar' => 'required|unique:teams|max:50'
        ]);
        // Aggiornare dati
        $updated = $team->update($data); // FILLABLE MODEL
        // Redirecting
        if($updated) {
            return redirect()->route('teams.show', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // !ELIMINARE ELEMENTO
    public function destroy($id)
    {   
        // Id riferimento
        $team = Team::find($id);
        // Operazione di delete
        $deleted = $team->delete();
        // Redirecting con avviso a schermo di cancellazione
        $deletedEl = $team->name;
        if ($deleted) {
            return redirect()->route('teams.index')->with('deleted', $deletedEl);
        }
    }
}
