<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialite;

class SpecialiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $specialite=specialite::paginate(5);
        return view('admin.specialite.list_specialite', compact('specialite'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.specialite.list_specialite');
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
            'lib_specialite'=>'required'
        ]);

        $specialite = new specialite;
        $specialite->lib_specialite=$request->lib_specialite;
        $specialite->save();
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
    public function edit( specialite $specialite)
    {
        //
        return view('admin.specialite.edit_specialite',[
            'specialites'=>$specialite
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,specialite $specialite)
    {
        //
        $data=$request->validate([
            'lib_specialite'=>'required'
        ]);

     
       
        $specialite->lib_specialite=$request->lib_specialite;
        $specialite->save();
        return back()->with('update_message', 'Un element modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(specialite $specialite)
    {
        //
        $specialite->delete();
        return back()->with('delete_message', 'Un element a éte supprimé');


    }
}