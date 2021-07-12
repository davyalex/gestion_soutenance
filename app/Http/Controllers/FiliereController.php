<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filiere=Filiere::paginate(2);
        return view('admin/filiere/list_filiere',compact('filiere'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/filiere/list_filiere');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //verification des données
        $data = $request->validate([
            'lib_filiere'=>'required'
        ]);

         //insertion des données
         $filiere = new Filiere;
         $filiere->lib_filiere = $request->lib_filiere;
         $filiere->save();
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
     *  @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Filiere $filiere)
    {
        //
        return view('admin.filiere.edit_filiere',[
            'filieres'=>$filiere
        ]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filiere $filiere)
    {
        //
        $data = $request->validate([
            'lib_filiere'=>'required'
        ]);

       
        $filiere->lib_filiere=$request->lib_filiere;
        $filiere->save();
        return back()->with('updatemessage', 'filiere modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Filiere $filiere)
    {
        //
        $filiere->delete();
        return back()->with('delete_message','Une filière a été supprimer');
    }
}
