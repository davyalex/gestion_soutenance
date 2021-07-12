@extends('layout.app')

@section('title','Student | Details soutenance')


@section('content')

      <h3 class="alert alert-success text-center">  Soutenance programmé pour <strong style="text-transform:uppercase;" >{{ $soutenance->etudiant->nom }} <i class="fa fa-user"></i></strong></h3>
      <div class="alert alert-warning">
        <h3>Dossier physique pour valider votre passage</h3>
        <ul>
            <li>
                photocopie de votre piece identité
            </li>
            <li>
             photocopie de votre extrait de naissance
         </li>
         <li>
             photocopie de votre admissibilité 
         </li>
         <li>
             photocopie de vos rélevé
         </li>
         <li>
             photocopie de vos reçu package et scolarité
         </li>
         <li>
             certificat de frequentation
         </li>
        </ul>
       
    </div>
      <div class="table-responsive">
        <table class="table table-light table-striped table-responsive-dark">
            <thead class="thead-light" style="background:#d9edf7;">
                <tr>
                    <th>Num insc</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Niveau</th>
                    <th>Filière</th>
                    <th>Année scolaire</th> 
                    {{-- <th>Contact</th>
                    <th>Email</th>   --}}
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $soutenance->etudiant->num_insc }}</td>
                    <td>{{ $soutenance->etudiant->nom }}</td>
                    <td>{{ $soutenance->etudiant->prenom }}</td>
                    <td>{{ $soutenance->etudiant->Niveau->lib_niveau }}</td>
                    <td>{{ $soutenance->etudiant->Filiere->lib_filiere }}</td>
                    <td>{{ $soutenance->etudiant->anneescolaire->lib_anneescolaire }}</td>
                </tr>
            </tbody>
        </table>
      </div>
                
        <div class="row" style="text-align:center;">
            <div class="col-md-4">
                <h3 style="text-decoration:underline;color:#3170a9;" class=""> <i class="fa fa-calendar"></i> Date de soutenance</h3>
                <h4> <strong>{{ $soutenance->date_soutenance->format('d/m/Y') }} </strong> </h4>
            </div>

            <div class="col-md-4">
                <h3 style="text-decoration:underline; color:#3170a9;" class=""> <i class="fa fa-calendar"></i> Heure de soutenance</h3>
                <h4> <strong> {{ $soutenance->heure_soutenance->format('H:i') }}</strong> </h4>
            </div>

            <div class="col-md-4">
                <h3 style="text-decoration:underline;color:#3170a9;" class=""> <i class="fa fa-file"></i> Salle de soutenance</h3>
                <h4 style="text-transform:uppercase;"> <strong>{{ $soutenance->salle->lib_salle }}</strong> </h4>
            </div>
        </div>

<hr style="border:1px dashed red;">

               <div class="row" style="text-align:center;">
                <div class="col-md-4">
                    <h3 style="text-decoration:underline;color:#3170a9;" class=""> <i class="fa fa-file"></i> Thème de soutenance</h3>
                    <h4 style="text-transform:uppercase;" > <strong>{{ $soutenance->etudiant->theme }}</strong> </h4>
                </div>
                <div class="col-md-4">
                    <h3 style="text-decoration:underline;color:#3170a9;" class=""> <i class="fa fa-users"></i> Jury de la soutenance</h3>
                        
                            @foreach ($soutenance->juries as $key=>$jury)
                                 <h4 class="text-justify">Jury{{ ++$key }}: <strong> <span style="text-transform:uppercase;">{{ $jury->nom }}</span> {{ $jury->nom }}</strong> </h4>
                            @endforeach
                       
                </div>
               </div>
<hr>
              
    

                    

@endsection