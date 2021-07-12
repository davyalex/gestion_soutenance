@extends('admin.app')

    @section('title', ' Admin | Liste Salle')

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
        
              </header>
              <table class="table table-responsive table-advance table-hover">
                <tbody>

               
                  <tr>
                    <th><i class="icon_profile"></i> N°</th>
                    <th><i class="icon_calendar"></i> Libellé</th>                   
                    <th><i class="icon_cogs"></i> Edit</th>
                    <th><i class="icon_cogs"></i> Delete</th>
                  </tr>
                  @foreach ($salle as $salles)     
                  <tr>
                    <td></td>
                    <td>{{ $salles->lib_salle }}</td>                                         
                      <div class="btn-group">
                        <td><a class="btn btn-success" href="{{ route('salle.edit', $salles->id) }}"><i class="fa fa-pencil"></i></a></td>                        
                        <td>
                          <form action="{{ route('salle.destroy', $salles->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('vous êtes sur le point de supprimer')"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>

                          </form>
                       
                      </div>                  
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </section>
          </div>
        </div>


            
        <div class="panel-body">           
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Ajouter une salle</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" method="post" action="{{ route('salle.store') }}">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputlibelle">Libellé</label>
                        <input type="text" class="form-control"  name="lib_salle" placeholder="Entrer nom salle">
                      </div>                    
                      <button type="submit" class="btn btn-primary">Valider</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>

        @endsection
   