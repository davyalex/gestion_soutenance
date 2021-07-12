@extends('admin.app')

    @section('title', ' Admin | Liste des années-Scolaire')

        @section('content')

        
        <div class="col-md-6  panel-body">           
            <form role="form" method="POST" action="{{ route('anneescolaire.update', $anneescolaires->id) }}">
                @csrf
                @method('PUT')
        
                @if (session()->has('updatemessage'))
                <div class="alert alert-success" role="alert">{{ session('updatemessage') }} <a href="{{ route('list_anneescolaire') }}" class="btn btn-default"> <i class="glyphicon glyphicon-eye-open"></i> Consulter la liste</a></div>
        
                @else
                <div class="alert alert-warning">
                    Vous êtes sur le point de modifier l'année  <strong>{{ $anneescolaires->lib_anneescolaire }}</strong>       
                </div>
                @endif
               
                
            <div class="form-group">
              <label for="exampleInputlibelle">Libellé</label>
              <input type="text" class="form-control"  name="lib_anneescolaire" value="{{ $anneescolaires->lib_anneescolaire }}">
            </div>                   
            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Valider</button>
          </form>
        </div>
       
        @endsection
   