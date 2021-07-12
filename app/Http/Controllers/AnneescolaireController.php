<?php

namespace App\Http\Controllers;

use App\Models\Anneescolaire;
use Illuminate\Http\Request;

class AnneescolaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $anneescolaire=Anneescolaire::paginate(5);
        return view('admin/anneescolaire/list_anneescolaire',compact('anneescolaire'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/anneescolaire/list_anneescolaire');

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

        $data=$request->validate([
            'lib_anneescolaire'=>'required'
        ]);

        $anneescolaire = new Anneescolaire;
        $anneescolaire->lib_anneescolaire = $request->lib_anneescolaire;
        $anneescolaire->save();
        return back()->with('success_message','Une filière a été ajouté ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Anneescolaire $anneescolaire)
    {
        //
        return view('admin.anneescolaire.edit_anneescolaire', [
            'anneescolaires'=>$anneescolaire
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anneescolaire $anneescolaire)
    {
        //
        $data=$request->validate([
            'lib_anneescolaire'=>'required'
        ]);

     
        $anneescolaire->lib_anneescolaire = $request->lib_anneescolaire;
        $anneescolaire->save();
        return back()->with('updatemessage',' Année modifié avec success ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anneescolaire $anneescolaire)
    {
        //
        $anneescolaire->delete();
        return back()->with('delete_message','Une Année a été supprime ');

    }
}
