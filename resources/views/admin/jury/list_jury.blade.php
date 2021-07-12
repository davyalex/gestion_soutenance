@extends('admin.app')

    @section('title', ' Admin | Liste Jury')

        @section('content')



 <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                <a href="#myModal" data-toggle="modal" class="btn btn-primary">
                    <i class="fa fa-database"></i> Ajouter
                </a>

                @if (session()->has('success_message'))
                    <div class="alert alert-success" role="alert">
                     {{session('success_message')}}
                    </div>                                                              
                @endif

                @if (session()->has('delete_message'))
                <div class="alert alert-danger" role="alert">
                 {{session('delete_message')}}
                </div>                                                              
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                 </div>   
                @endforeach
            @endif
        
              </header>
              <table class="table table-responsive table-advance table-hover">
                  <thead>
                    <tr>
                      <th><i class="icon_profile"></i> N°</th>
                      <th><i class="icon_calendar"></i> Nom</th>
                      <th><i class="icon_calendar"></i> Prenom</th>
                      <th><i class="icon_calendar"></i> Email</th>
                      <th><i class="icon_calendar"></i> Contact</th>
                      <th><i class="icon_calendar"></i> Departement</th>
                      <th><i class="icon_calendar"></i> Specialite</th>                             
                      <th><i class="icon_cogs"></i> Edit</th>
                      <th><i class="icon_cogs"></i> Delete</th>
                    </tr>
                  </thead>
                <tbody>   
                  @foreach ($jury as $key=>$juries)              
                  <tr>                   
                    <td>{{ ++$key }}</td>              
                    <td>{{ $juries->nom }}</td>
                    <td>{{ $juries->prenom }}</td>
                    <td>{{ $juries->email}}</td> 
                    <td>{{ $juries->contact }}</td>                   
                    <td>{{ $juries->departement->lib_departement }}</td>                    
                    <td>{{ $juries->specialite->lib_specialite }}</td>                                          
                      <div class="btn-group">
                        <td><a class="btn btn-success" href="{{ route('jury.edit', $juries->id) }}"><i class="fa fa-pencil"></i></a></td>                        
                        <td>
                          <form action="{{ route('jury.destroy', $juries->id) }}" method="post">
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
              {{ $jury->links() }}
            </section>
          </div>
        </div>


            
        <div class="panel-body">           
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Ajouter un Enseignant</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" method="post" action="{{ route('jury.store') }}">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputlibelle">Nom</label>
                        <input type="text" class="form-control"  name="nom" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputlibelle">Prenom</label>
                        <input type="text" class="form-control"  name="prenom" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputlibelle">Email</label>
                        <input type="email" class="form-control"  name="email" placeholder="">
                      </div>  
                      <div class="form-group">
                        <label for="exampleInputlibelle">Contact</label>
                        <input type="number" class="form-control"  name="contact" placeholder="">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputlibelle">Departement</label>
                        <select class="form-control" name="departement_id" id="">
                          @foreach ($departement as $departements)
                              <option value="{{ $departements->id }}">{{ $departements->lib_departement }}</option>
                          @endforeach                         
                        </select>
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputlibelle">Specialité</label>
                        <select class="form-control" name="specialite_id" id="">
                          @foreach ($specialite as $specialites)
                              <option value="{{ $specialites->id }}">{{ $specialites->lib_specialite }}</option>
                          @endforeach                         
                        </select>
                      </div>                         
                      <button type="submit" class="btn btn-primary">Valider</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>

        @endsection
   