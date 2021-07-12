<?php

namespace App\Http\Controllers;

use App\Models\Jury;
use App\Models\Niveau;
use App\Models\Specialite;
use App\Models\Departement;
use Illuminate\Http\Request;

class JuryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $jury=Jury::paginate(2);
          $specialite = Specialite::all();   
          $departement = Departement::all();
          $jury = Jury::paginate(5) ; 
        return view('admin/jury/list_jury',compact('specialite','departement','jury'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $specialite = Specialite::all();   
        $departement = Departement::all();  
      return view('admin/jury/list_jury',compact('specialite','departement'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Specialite $specialite, Departement $departement)
   
    {
        //
        $data = $request->validate([
            'nom'=>'required|',
            'prenom'=>'required|',
            'contact'=>'required|numeric|unique:juries',
            'email'=>'required|unique:juries',
        ]);

       
        $jury=new Jury($request->all());
        $jury->nom=$request->nom;
        $jury->prenom=$request->prenom;
        $jury->email=$request->email;
        $jury->contact=$request->contact;
        $jury->specialite_id=$request->specialite_id;
        $jury->departement_id=$request->departement_id;
        $jury->save();
    
        return back()->with('success_message', 'jury ajouté avec success');
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
    public function edit(Jury $jury, Specialite $specialite, Departement $departement)
    {
        //
        $specialite = Specialite::all();   
        $departement = Departement::all();
        return view('admin.jury.edit_jury',compact('specialite','departement'),[
            'juries'=>$jury,
            'departements'=>$departement,
            'specialites'=>$specialite,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Jury $jury )
    {
        //

        $data = $request->validate([
            'nom'=>'required|',
            'prenom'=>'required|',
            'contact'=>'required',
            'email'=>'required',
        ]);

       
      
        $jury->nom=$request->nom;
        $jury->prenom=$request->prenom;
        $jury->email=$request->email;
        $jury->contact=$request->contact;
        $jury->specialite_id=$request->specialite_id;
        $jury->departement_id=$request->departement_id;
        $jury->save();
    
        return back()->with('update_message', 'Un element modifié avec success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jury $jury)
    {
        //
        $jury->delete();
        return back()->with('delete_message', 'un jury a été supprimé');
    }
}
