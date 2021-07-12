@extends('admin.app')

    @section('title', ' Admin | Liste Filiere')

        @section('content')



 <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                <a href="#myModal" data-toggle="modal" class="btn btn-primary">
                    <i class="fa fa-database"></i> Ajouter
                </a>

              @if (session()->has('success_message'))
                        <div class="alert alert-success" role="alert">{{ session('success_message') }}</div>
                    @endif

                    @if (session()->has('delete_message'))
                    <div class="alert alert-danger" role="alert">{{ session('delete_message')}}</div>
                    @endif
                  
                {{-- <a href="#myModal-1" data-toggle="modal" class="btn  btn-warning">
                Form in Modal 2
            </a>
                <a href="#myModal-2" data-toggle="modal" class="btn  btn-danger">
                Form in Modal 3
            </a> --}}
              </header>

              <table class="table table-responsive table-advance table-hover">
                <thead>
                  <tr>
                    <th><i class="icon_profile"></i> N°</th>
                    <th><i class="icon_calendar"></i> Libellé</th>                   
                    <th><i class="icon_cogs"></i> Edit</th>
                    <th><i class="icon_cogs"></i> Delete</th>
                  </tr>
                </thead>
                <tbody>          
                  @foreach ($filiere as $filieres)
                  <tr>                 
                    <td></td>
                    <td>{{ $filieres->lib_filiere }}</td>                                                      
                        <td><a href="{{ route('filiere.edit', $filieres->id )}} "  class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a></td>
                        <td>
                          <form  method="POST" action="{{ route('filiere.destroy', $filieres->id) }}" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('confirmer la suppression')"> <i class="glyphicon glyphicon-trash"></i> </button>
                        </form>
                        </td>                                       
                  </tr>
                  @endforeach
                </tbody>
              
              </table>
            {{  $filiere->links()}}
            </section>
          </div>
        </div>


            
        <div class="panel-body">           
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Ajouter une filière</h4>
                  </div>
                  <div class="modal-body">

                    <form role="form" method="POST" action="{{ route('filiere.store') }}">
                          @csrf
                      <div class="form-group">
                        <label for="exampleInputlibelle">Libellé</label>
                        <input type="text" class="form-control"  name="lib_filiere" id="exampleInputlibelle" placeholder="Entrer nom filière">
                      </div>                   
                      <button type="submit" class="btn btn-primary">Valider</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>


        



       
        @endsection
   