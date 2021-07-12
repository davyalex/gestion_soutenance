@extends('admin.app')

@section('title', 'modification Jury')

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
    <form role="form" method="POST" action="{{ route('jury.update', $juries->id) }}">
        @csrf
        @method('PUT')

        @if (session()->has('update_message'))
        <div class="alert alert-success" role="alert">{{ session('update_message') }} <a href="{{ route('list_jury') }}" class="btn btn-default"> <i class="glyphicon glyphicon-eye-open"></i> Consulter la liste</a></div>

        @else
        <div class="alert alert-warning">
            Vous êtes sur le point de modifier Jury  <strong>{{ $juries->nom }}</strong>       
        </div>
        @endif
       
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
         </div>   
        @endforeach
    @endif
        
        <div class="form-group">
            <label for="exampleInputlibelle">Nom</label>
            <input type="text" class="form-control" value="{{ $juries->nom }}" name="nom" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputlibelle">Prenom</label>
            <input type="text" class="form-control" value="{{ $juries->prenom }}" name="prenom" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputlibelle">Email</label>
            <input type="email" class="form-control" value="{{ $juries->email }}" name="email" placeholder="">
          </div>  
          <div class="form-group">
            <label for="exampleInputlibelle">Contact</label>
            <input type="number" class="form-control" value="{{ $juries->contact }}" name="contact" placeholder="">
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
    <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Valider</button>
  </form>
</div>


@endsection
    
