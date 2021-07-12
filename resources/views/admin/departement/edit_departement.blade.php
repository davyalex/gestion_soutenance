@extends('admin.app')

@section('title', 'modification departement')

@section('content')
<header class="panel-heading"> 

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

<div class="col-md-6  panel-body">           
    <form role="form" method="POST" action="{{ route('departement.update', $departements->id) }}">
        @csrf
        @method('PUT')

        @if (session()->has('update_message'))
        <div class="alert alert-success" role="alert">{{ session('update_message') }} <a href="{{ route('list_departement') }}" class="btn btn-default"> <i class="glyphicon glyphicon-eye-open"></i> Consulter la liste</a></div>

        @else
        <div class="alert alert-warning">
            Vous êtes sur le point de modifier filière  <strong>{{ $departements->lib_departement }}</strong>       
        </div>
        @endif
       
        
    <div class="form-group">
      <label for="exampleInputlibelle">Libellé</label>
      <input type="text" class="form-control"  name="lib_departement" value="{{ $departements->lib_departement }}">
    </div>                   
    <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Valider</button>
  </form>
</div>


@endsection
    
