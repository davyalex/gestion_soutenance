<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salle;

class SalleController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $salle=Salle::paginate(5);
        return view('admin.salle.list_salle', compact('salle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.salle.list_salle');
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
            'lib_salle'=>'required'
        ]);

        $salle = new Salle;
        $salle->lib_salle=$request->lib_salle;
        $salle->save();
        return back()->with('success_message', 'Un element ajouté avec success');
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
    public function edit( Salle $salle)
    {
        //
        return view('admin.salle.edit_salle',[
            'salles'=>$salle
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Salle $salle)
    {
        //
        $data=$request->validate([
            'lib_salle'=>'required'
        ]);

     
       
        $salle->lib_salle=$request->lib_salle;
        $salle->save();
        return back()->with('update_message', 'Un element modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salle $salle)
    {
        //
        $salle->delete();
        return back()->with('delete_message', 'Un element a éte supprimé');


    }
}