<?php

namespace App\Http\Controllers;
use App\Http\Requests\Soutenance as SoutenanceRequest;
use Illuminate\Http\Request;
use App\Models\Soutenance;
use App\Models\Salle;
use App\Models\Jury;
use App\Models\Etudiant;
use App\Models\Jury_soutenance;
use App\User;
use App\Mail\sendMailJury;
use App\Mail\sendMailStudent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SoutenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct(){
            $this->middleware('auth');
        }

    public function index( $id)
    {
        //
            $etudiant=Etudiant::find($id);
            $salle=salle::all();
            $jury=Jury::all();
        return view('admin.soutenance.form_soutenance', compact('salle','jury'),[
            'etudiant'=>$etudiant,
            'salle'=>$salle,
            'jury'=>$jury
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

            
        $select=DB::table('soutenances')->get();
           
       
        dd($soutenances->heure_soutenance);
        //
      
        //     $salle=salle::all();
        //     $jury=Jury::all();
        // return view('admin.soutenance.form_soutenance', compact('salle','jury'));
            
     
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SoutenanceRequest $soutenanceRequest)
    {

       
       
       
        // dd( $ver_jury);
        $name_jury = Jury::where(['id'=>$soutenanceRequest->jury])->get();
      
        if ($ver_jury=Jury_soutenance::where('heure_soutenance',$soutenanceRequest->heure_soutenance)->exists())
         {
            return back()->with('exist_message',  $name_jury[0]->nom);
            
        }else{
           
            $soutenance = new Soutenance();
            $soutenance->etudiant_id=$soutenanceRequest->etudiant_id;
            $soutenance->num_insc=$soutenanceRequest->num_insc;
            $soutenance->heure_soutenance=$soutenanceRequest->heure_soutenance;
            $soutenance->date_soutenance=$soutenanceRequest->date_soutenance;
            $soutenance->salle_id=$soutenanceRequest->salle_id;
           $soutenance->save();
           $etudiant = Etudiant::where('id',$soutenanceRequest->etudiant_id)->update(array('etat'=>1));

        }
            
                 

                    // $soutenance = Soutenance::$soutenanceRequest->all();

                        foreach($soutenanceRequest->jury as $j){
                            $info_jury = Jury::where('id',$j)->get();
                            // var_dump($info_jury[0]->email); 
                           $jury_ve = new Jury_soutenance;
                            $jury_ve->jury_id=$j;
                            $jury_ve->soutenance_id=$soutenance->id;
                            $jury_ve->heure_soutenance=$soutenanceRequest->heure_soutenance;
                            $jury_ve->date_soutenance=$soutenanceRequest->date_soutenance;
                           $jury_ve->save();
                           
                          Mail::to($info_jury[0]->email)->send(new sendMailJury([
                              'date_soutenance'=>$soutenanceRequest->date_soutenance,
                                'heure_soutenance'=>$soutenanceRequest->heure_soutenance,
                                'lib_salle'=>$soutenance->salle->lib_salle,
                                'etudiant'=>$soutenance->etudiant,
                                'nom'=>$info_jury[0]->nom
                                        ]));
                               
                         Mail::to($soutenance->etudiant->email)->send(new sendMailStudent([
                                            'date_soutenance'=>$soutenanceRequest->date_soutenance,
                                              'heure_soutenance'=>$soutenanceRequest->heure_soutenance,
                                              'lib_salle'=>$soutenance->salle->lib_salle,
                                              'etudiant'=>$soutenance->etudiant,
                                           
                                                      ]));

                                                     
                                             
                            // dd($ver_jury);
                        }
                      
                  return back()->with('success_message', 'Etudiant programmé avec success');

             
                            
        
               
                    

            
        

                

    }


        public function list(Soutenance $soutenance)      
        {

            $soutenance=Soutenance::paginate(5);
            if ($soutenance) {
                return view('admin.soutenance.list_soutenance', compact('soutenance'));
            }
          
        }

        
        public function search()      
        {

            $q = request()->input('q');
          
         
               $soutenance= Soutenance::where('date_soutenance', 'like', $q)->get();

               return view('admin.soutenance.search_soutenance')->with('soutenance',$soutenance);

        }


        public function search_student()      
        {

            $search= request()->input('search');
          
              
               $soutenance= Soutenance::where('num_insc', 'like', $search)->get();

               return view('etudiant.search_soutenance')->with('soutenance',$soutenance);

        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Soutenance $soutenance)
    {
        //
        $soutenance->with('juries')->get();
        return view('admin.soutenance.soutenance_show', compact('soutenance'));

    }

    public function send( Soutenance $soutenance)
    {
        //
        $soutenance->with('juries')->get();
        return view('admin.soutenance.soutenance_show', compact('soutenance'));
        
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
    public function destroy(Soutenance $soutenance)
    {
        //
        $soutenance->delete();
        $etudiant = Etudiant::where('id',$soutenance->etudiant_id)->update(array('etat'=>0));

        return back()->with('delete_message', 'un élement a été supprimé');

    }
}
