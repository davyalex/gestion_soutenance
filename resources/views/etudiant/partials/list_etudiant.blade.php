@extends('admin.app')

    @section('title', ' Admin | Liste des etudiants')

        @section('content')



 <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">                

                {{-- @if (session()->has('success_message'))
                    <div class="alert alert-success" role="alert">
                     {{session('success_message')}}
                    </div>                                                              
                @endif --}}

                @if (session()->has('delete_message'))
                <div class="alert alert-danger" role="alert">
                 {{session('delete_message')}}
                </div>                                                              
            @endif

            {{-- @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                 </div>   
                @endforeach
            @endif --}}
        
              </header>
             <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="row"><i class="icon_profile"></i> </th>
                    <th scope="col"><i class="icon_profile"></i> Num_insc</th>
                    <th scope="col"><i class="icon_calendar"></i> Nom</th>
                    <th scope="col"><i class="icon_calendar"></i> Prenom</th>
                    {{-- <th><i class="icon_calendar"></i> Contact</th> --}}
                    {{-- <th><i class="icon_calendar"></i> Email</th> --}}
                    <th scope="col"><i class="icon_calendar"></i> Niveau</th>
                    <th scope="col"><i class="icon_calendar"></i> Filière</th>
                    <th scope="col"><i class="icon_calendar"></i> Année Scolaire</th>
                    {{-- <th><i class="icon_calendar"></i> Thème</th>
                    <th><i class="icon_calendar"></i> Reçu package</th>
                    {{-- <th><i class="icon_calendar"></i> Reçu scolarite</th>        --}}
                   
                    <th scope="col"><i class="icon_cogs"></i> Voir</th>
                    <th scope="col"><i class="icon_cogs"></i> Delete</th>
                  </tr>
                </thead>
              <tbody>   

                 
                
                @foreach ($etudiant as $key=>$etudiants)              
                <tr>
                  <td>{{ ++$key }}</td>                    
                  <td>{{ $etudiants->num_insc }}</td>              
                  <td>{{ $etudiants->nom }}</td>
                  <td>{{ $etudiants->prenom }}</td>
                  {{-- <td>{{ $etudiants->contact}}</td>  --}}
                  {{-- <td>{{ $etudiants->email }}</td>   --}}
                  <td>{{ $etudiants->niveau->lib_niveau }}</td>                    
                  <td>{{ $etudiants->filiere->lib_filiere }}</td>
                  <td>{{ $etudiants->anneescolaire->lib_anneescolaire }}</td>
                  {{-- <td>{{ $etudiants->files_memoire }}</td>   --}}
                  {{-- <td>{{ $etudiants->theme }}</td>
                  <td>{{ $etudiants->files_package }}</td>
                  <td>{{ $etudiants->files_scolarite }}</td>--}}
                               
                  
                 

                   
                                
              
                
                
             
                <div class="btn-group"> 
                  <td>Deja programmé</td>                        
                  <td>
                   Deja programmé  
                  </td>                                                                    
                </div>
                     
                                                    
                </tr>
                @endforeach                 
              </tbody>
            </table>
            {{ $etudiant->links() }}
             </div>
            </section>
          </div>
        </div>

        @endsection