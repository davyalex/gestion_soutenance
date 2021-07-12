@extends('admin.app')

@section('title', 'Admin|Programmation de la soutenance')


    @section('content')
        
        <div style="border:1px solid black;">

            <table class="table table-responsive table-advance table-hover table-bordered">
                <thead>
                  <tr>
                    <th><i class="icon_profile"></i> Num_insc</th>
                    <th><i class="icon_calendar"></i> Nom</th>
                    <th><i class="icon_calendar"></i> Prenom</th>
                    <th><i class="icon_calendar"></i> Contact</th> 
                   <th><i class="icon_calendar"></i> Email</th>
                    <th><i class="icon_calendar"></i> Niveau</th>
                    <th><i class="icon_calendar"></i> Filière</th>
                    <th><i class="icon_calendar"></i> Année Scolaire</th>                                                                                      
                  </tr>
                </thead>

              <tbody>   
                        
                <tr>                                                                     
                    <td>{{ $etudiant->num_insc }}</td>              
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->prenom }}</td>
                    <td>{{ $etudiant->contact}}</td> 
                    <td>{{ $etudiant->email }}</td>                   
                    <td>{{ $etudiant->niveau->lib_niveau }}</td>                    
                    <td>{{ $etudiant->filiere->lib_filiere }}</td>
                    <td>{{ $etudiant->anneescolaire->lib_anneescolaire }}</td>    
                                                                                                   
                </tr>
                             
              </tbody>

            </table>
        
        
            <hr style="border:1px dotted #214761;"> 
        
        
            <table class="table table-responsive table-advance table-hover table-bordered">
              <thead>
                <tr>
                  <th scope="col"><i class="icon_profile"></i> Thème</th>              
                  {{-- <th scope="col"><i class="icon_calendar"></i> Memoire</th>                                                                                      --}}
                </tr>
              </thead>
        
             <tbody>
                <tr>
                    <td> <span style="text-transform:uppercase;">{{ $etudiant->theme }}</span> </td>  
                    {{-- <td> <a href="{{ url('uploads/memoires/'. $etudiant->files_memoire) }}"><img id= "" class="img-thumbnail" src="" alt="" width="40%">{{ $etudiant->files_memoire }}</a> </td> --}}
                                
                </tr>
             </tbody>

            </table>
        </div>
                  
        <div class="col-md-8 col-md-offset-2" >

              @if (session()->has('success_message'))
                  <div class="alert alert-success" role="alert">{{ session('success_message') }}</div>            
              @endif

              @if (session()->has('Msg_exist'))
              <div class="alert alert-warning" role="alert">{{ session('Msg_exist') }}</div>            
             @endif

             @if (session()->has('exist_message'))
             <div class="alert alert-warning" role="alert"> <h3><u>MR {{ session('exist_message') }} Dejà programmé a cette <br>veuillez choisir un autre enseignant</u> </h3></div>            
            @endif
             

              @if ($errors->any())
              @foreach ($errors->all() as $error)
              <div class="alert alert-danger" role="alert">
                  {{ $error }}
               </div>   
              @endforeach
               @endif

           
                <div class="form" style="margin-bottom:30px;">
                  <form class=" form-horizontal " method="post" action="{{ route('soutenance.store') }}" >
                      @csrf
                      <div class="form-group invisible " id="cache">
                        <label for="Numero d'inscription" class="control-label col-lg-2">ID <span class="" style="color:red;">*</span></label>
                        <div class="col-lg-10">
                          <input class=" form-control " id="etudiant_id" name="etudiant_id" type="text"  value="{{ $etudiant->id }}" />
                        </div>
                      </div>
                      <div class="form-group invisible" id="cache">
                        <label for="Numero d'inscription" class="control-label col-lg-2">Numero inscription <span class="" style="color:red;">*</span></label>
                        <div class="col-lg-10">
                          <input class=" form-control" id="etudiant_id" name="num_insc" type="text"  value="{{ $etudiant->num_insc }}" />
                        </div>
                      </div>
                    <div class="form-group ">
                          <label for="Numero d'inscription" class="control-label col-lg-2">Date de soutenance <span class="" style="color:red;">*</span></label>
                          <div class="col-lg-10">
                            <input class=" form-control" id="date_soutenance" name="date_soutenance" type="date" />
                          </div>
                        </div>
                      <div class="form-group ">
                      <label for="heure_soutenance" class="control-label col-lg-2">Heure <span class="" style="color:red;">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="heure_soutenance" name="heure_soutenance" type="time" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="salle_id" class="control-label col-lg-2">Salle <span class="" style="color:red;">*</span></label>
                      <div class="col-lg-10">
                      
                        <select class="form-control" name="salle_id" id="">
                          <option value="">--------Selectionner---------</option>
                             @foreach ($salle as $salles)
                            <option value="{{ $salles->id}}">{{ $salles->lib_salle}}</option>
                            @endforeach
                        </select>
                    
                      </div>
                    </div>                                          
                    <div class="form-group ">
                      <label for="jury_id" class="control-label col-lg-2">Jury <span class="" style="color:red;">*</span></label>
                      <div class="col-lg-10 select is-multiple">
                       
                        <select class=" form-control " multiple name="jury[]" id="">        
                            @foreach ($jury as $juries)
                            <option value="{{ $juries->id }}"{{ in_array($juries->id, old('jury') ? :[]) ? 'selected': ''  }}>{{ $juries->nom}}  {{ $juries->prenom}} | {{ $juries->specialite->lib_specialite }}  {{ $juries->departement->lib_departement  }}</option>
                            @endforeach
                          </select>
                     
                      </div>
                    </div>
                   
                  
                    <script type="text/javascript">
                  $(document).ready(function() {
 
    $('#cache').hide();
 
});​
                       
                      
                    </script>
                     
                    {{-- <script type="text/javascript">
                        $(document).ready(function(){
                            $('select').selectpicker();
                        })
                    </script> --}}
                    
                      
                    
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" onclick="return confirm('confirmer l\'envoi')">Valider</button>
                        <button class="btn btn-default" type="reset">Annuler</button>
                      </div>
                    </div>
                  </form>
                </div>
              
        </div>
       

    @endsection