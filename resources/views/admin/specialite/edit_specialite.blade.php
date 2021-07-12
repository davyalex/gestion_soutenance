@extends('admin.app')

@section('title', 'modification specialite')

@section('content')
<header class="panel-heading"> 

  @if (session()->has('success_message'))
            <div class="alert alert-success" role="alert">{{ session('success_message') }}</div>
        @endif

        @if (session()->has('delete_message'))
        <div class="alert alert-danger" role="alert">{{ session('delete_message')}}</div>
        @endif
      
  </header>

<div class="col-md-6  panel-body">           
    <form role="form" method="POST" action="{{ route('specialite.update', $specialites->id) }}">
        @csrf
        @method('PUT')

        @if (session()->has('update_message'))
        <div class="alert alert-success" role="alert">{{ session('update_message') }} <a href="{{ route('list_specialite') }}" class="btn btn-default"> <i class="glyphicon glyphicon-eye-open"></i> Consulter la liste</a></div>

        @else
        <div class="alert alert-warning">
            Vous êtes sur le point de modifier filière  <strong>{{ $specialites->lib_specialite }}</strong>       
        </div>
        @endif
       
        
    <div class="form-group">
      <label for="exampleInputlibelle">Libellé</label>
      <input type="text" class="form-control"  name="lib_specialite" value="{{ $specialites->lib_specialite }}">
    </div>                   
    <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Valider</button>
  </form>
</div>


@endsection
    
