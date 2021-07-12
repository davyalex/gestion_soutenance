@extends('admin.app')

@section('title','Admin | Liste des soutenance programmé')


@section('content')

    @if (session()->has('delete_message'))
        <div class="alert alert-danger" role="alertdialog">{{ session('delete_message') }}</div>
    @endif

    <div class="col-md-4 col-md-offset-4">
        <form action="{{ route('soutenance.search') }}" method="" class="d-flex">
          
          <div class="col-md-10">    
              <input type="date" name="q" id="" class="form-control">
          </div>
          <div class="col-md-2">
            <button class="btn btn-primary " type="submit"><i class="fa fa-search" aria-hidden="true"></i></button> 
          </div>        
        </form>
      </div>
 
<hr>
 
    <div class="table-responsive">
  
      <table class="table table-light table-responsive table-striped">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Num_insc</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Filière</th>
                <th>Niveau</th>
                <th>Année Scolaire</th>
                <th>Date / Heure</th>
                <th ><i></i> Details</th>
                <th ><i></i> Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($soutenance as $key=>$soutenances)    
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $soutenances->etudiant->num_insc }}</td>
                <td>{{ $soutenances->etudiant->nom }}</td>
                <td>{{ $soutenances->etudiant->prenom }}</td>
                <td>{{ $soutenances->etudiant->filiere->lib_filiere }}</td>
                <td>{{ $soutenances->etudiant->niveau->lib_niveau }}</td>
                <td>{{ $soutenances->etudiant->Anneescolaire->lib_anneescolaire }}</td>
                <td>{{ $soutenances->date_soutenance->format('d/m/Y') }} à {{ $soutenances->heure_soutenance->format('H:i') }}</td>               
                <div class="btn-group">
                   <td><a class="btn btn-warning" href="{{ route('soutenance.show',$soutenances->id) }}"><i class="fa fa-eye"></i></a></td>                        
                   <td>
                     <form action="{{ route('soutenance.destroy',$soutenances->id) }}" method="post">
                       @csrf  
                       @method('DELETE')    
                       <button type="submit" class="btn btn-danger" onclick="return confirm('vous êtes sur le point de supprimer')"><i class="glyphicon glyphicon-trash"></i></a>                      
                     </form>            
                   </td>                                                                    
                 </div>
            </tr>
            @endforeach
        </tbody>
    </table>
     </div>
   
    
@endsection