@extends('admin.app')

    @section('title','information etudiant | Gestion soutenance')


    @section('content')

    <style >
      #imgadapter{

        background-size: none;
        width: 100px;
        height: 100px;
        object-fit: cover;

      }

      .zoomImage{
        width: 500px;
        height: 250px;
        overflow: hidden;
        text-align: center
      }

      img{
        max-width: 100%;
        max-height: 100%;
        transition: 0.75s;
      }
      .zoomImage:hover img{
        transform: scale(1.2);
      }
    </style>
        
      @if (session()->has('delete_message'))
          <div class="alert alert-danger" role="alert">{{ session('delete_message') }}</div>
      @endif

    <table class="table table-responsive table-advance table-hover">
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


    <table class="table table-responsive table-advance table-hover">
      <thead>
        <tr>
         <th scope="col"><i class="icon_profile"></i> Thème</th>
           {{-- <th scope="col"><i class="icon_calendar"></i> Reçu scolarite</th>
          <th scope="col"><i class="icon_calendar"></i> Reçu package</th>        
          <th scope="col"><i class="icon_calendar"></i> Memoire</th>                                                                             --}}
         
        </tr>
      </thead>
    <tbody>   
              
      <tr>                   
        <td> <span style="text-transform:uppercase;">{{ $etudiant->theme }}</span> </td>          
            {{-- <div class="">
              <td> <img id="imgadapter" class="img-thumbnail" src="{{ asset('uploads/scolarites/' . $etudiant->files_scolarite) }}" alt="{{ $etudiant->files_scolarite }}" width="40%"> </td>
            <td><img id="imgadapter" class="img-thumbnail" src="{{ asset('uploads/packages/' . $etudiant->files_package) }}" alt="{{ $etudiant->files_package }}" width="40%"></td>       
            {{-- <td> <a href="{{ url('uploads/memoires/'. $etudiant->files_memoire) }}"><img id= "" class="img-thumbnail" src="" alt="" width="40%">{{ $etudiant->files_memoire }}</a> </td> --}}
            </div> 
      <td></td>                                                                                                                           
      </tr>
        <script>
          $(function(){
            $('.my-gallery').imageZoom({
              $($this).imageZoom();
            });
          });

        </script>

    </tbody>
  </table>

  
  <hr style="border:1px dotted #214761;"> 


  
            <div class="text-center" >
              <a style="display:inline-block;" class="btn btn-success" href="{{ route('form_soutenance',$etudiant->id) }}"><i class="fa fa-calendar"></i> Accepter</a>                       
              <form action="{{ route('etudiant.destroy',$etudiant->id) }}" method="post" style="display:inline-block;">
                @csrf  
                @method('DELETE')    
                <button type="submit" class="btn btn-danger" onclick="return confirm('vous êtes sur le point de supprimer')"><i class="glyphicon glyphicon-remove-sign"></i> Refuser</a>                      
              </form>      
            </div>                                                            

    @endsection
        
   