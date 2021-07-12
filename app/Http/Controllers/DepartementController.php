<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
class DepartementController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $departement=departement::paginate(5);
        return view('admin.departement.list_departement', compact('departement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.departement.list_departement');
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
            'lib_departement'=>'required'
        ]);

        $departement = new departement;
        $departement->lib_departement=$request->lib_departement;
        $departement->save();
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
    public function edit( Departement $departement)
    {
        //
        return view('admin.departement.edit_departement',[
            'departements'=>$departement
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departement $departement)
    {
        //
        $data=$request->validate([
            'lib_departement'=>'required'
        ]);

            
        $departement->lib_departement=$request->lib_departement;
        $departement->save();
        return back()->with('update_message', 'Un element modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(departement $departement)
    {
        //
        $departement->delete();
        return back()->with('delete_message', 'Un element a éte supprimé');


    }
}