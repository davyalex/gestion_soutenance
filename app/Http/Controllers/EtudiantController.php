<?php

namespace App\Http\Controllers;
use App\Models\Niveau;
use App\Models\Etudiant;
use App\Models\Anneescolaire;
use App\Models\Filiere;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Soutenance as SoutenanceRequest;
use App\Models\Soutenance;
use App\Models\Salle;
use App\Models\Jury;
use Illuminate\Support\Facades\DB;



class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        

            
              
                    $etudiant = Etudiant::where('etat', 0)->orderBy('created_at','desc')->paginate(5);  
                $niveau = Niveau::all();   
                $filiere = Filiere::all();
                $anneescolaire = Anneescolaire::all();
                return view('etudiant.list_etudiant',compact('niveau','filiere','anneescolaire','etudiant'));
            
              
                

            
              
            

            
        
               
        } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $niveau = Niveau::all();   
        $filiere = Filiere::all();
        $anneescolaire=Anneescolaire::all();
      return view('etudiant.etudiant',compact('niveau','filiere','anneescolaire'));
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
            'nom'=>'required',
            'prenom'=>'required',
            'contact'=>'required|numeric|unique:etudiants',
            'email'=>'required|unique:etudiants',
            'num_insc'=>'required|unique:etudiants',
            'niveau_id'=>'required',
            'filiere_id'=>'required',
            'anneescolaire_id'=>'required',
            'theme'=>'required',
            // 'files_package'=>'required|mimes:jpg,jpeg,png|max:2048',
            // 'files_scolarite'=>'required',
        ]);

        $etudiant = new Etudiant($request->all());
        $etudiant->num_insc = $request->num_insc;
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->contact = $request->contact;
        $etudiant->email = $request->email;
        $etudiant->niveau_id = $request->niveau_id;
        $etudiant->filiere_id = $request->filiere_id;
        $etudiant->anneescolaire_id = $request->anneescolaire_id;
        $etudiant->theme = $request->theme;
        $etudiant->etat = $request->has(0);
        

            // if ($request->hasfile('files_package')) {
            //     $file=$request->file('files_package');
            //     $extension = $file->getClientOriginalExtension();
            //     $filename = time() . '.' .$extension;
            //     $file->move('uploads/packages/', $filename);
            //     $etudiant->files_package=$filename;

            // } else {
            //    return $request;
            //    $etudiant->files_package = '';
            // }

            // if ($request->hasfile('files_scolarite')) {
            //     $file=$request->file('files_scolarite');
            //     $extension = $file->getClientOriginalExtension();
            //     $filename = time() . '.' .$extension;
            //     $file->move('uploads/scolarites/', $filename);
            //     $etudiant->files_scolarite=$filename;

            // } else {
            //    return $request;
            //    $etudiant->files_scolarite = '';
            // }

           
        $etudiant->save();
        return back()->with('success_message', 'Vos informations ont été enregistré avec success');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        //

        return view ('etudiant.show_etudiant',compact('etudiant'));  
    }


    // public function show_file($file_memoire)
    // {
    //     //
    //     $etudiant=Etudiant::find($id);
    //     return view ('etudiant.show_file_etudiant',compact('etudiant'));  
    // }


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
    public function update(Request $request, Etudiant $etudiant)
    {
        //

       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Etudiant $etudiant)
    {
        //
       
        $etudiant->delete();
        return view('etudiant.list_etudiant',compact('etudiant'))->with('delete_message', 'Soutenance refusé');
        
    }


    public function search_student()      
    {

        $search= request()->input('search');
      
          
           $soutenance= Soutenance::where('num_insc', 'like', $search)->get();

           return view('etudiant.search_soutenance')->with('soutenance',$soutenance);

    }

    public function show_soutenance( Soutenance $soutenance)
    {
        //
        $soutenance->with('juries')->get();
        return view('etudiant.search_show', compact('soutenance'));

    }

}
