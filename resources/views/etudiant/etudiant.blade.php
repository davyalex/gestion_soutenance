@extends('layout.app')
@section('title', 'Etudiant|Gestion soutenance')

@section('content')

<div class="row">
    <div class="col-lg-12 ">
        <div class="alert alert-info">
            {{-- <a href="javascript:history.go(-1)" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Retour</a> @yield('title') --}}
             {{-- <strong style="float:right;">Bienvenue <i class="fa fa-user"></i> <i><u>Kouamelan</u></i>  !vous êtes bien connecté. </strong>  --}}
                <h3 class="text-center">Vous êtes prêt à soutenir?</h3>
            </div>
       
    </div>
    </div>

<div class="row">
    <div class="col-lg-12 ">
      <section class="panel" >
        <header class="panel-heading">
            veuillez renseigner vos informations pour que nous programmions votre soutenance 
            <br> <strong>Champs Obligatoire <span style="color:red;">(*)</span></strong>
        </header>

        @if (session()->has('success_message'))
        <div class="alert alert-success" role="alert">
         {{session('success_message')}}
         <h3>1- Vous serez programmé dans une(1)semaine.</h3>
         <h3>2- Vous allez recevoir des notifications de votre programmation par email. </h3>
         <h3>2-consulter votre email de temps en temps.</h3>

        </div>                                                              
    @endif

    {{-- @if (session()->has('delete_message'))
    <div class="alert alert-danger" role="alert">
     {{session('delete_message')}}
    </div>                                                              
@endif --}}

@if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}

     </div>   
    @endforeach
@endif


        <div class="panel-body">
          <div class="form">
            <form class=" form-horizontal " method="post" action="{{ route('etudiant.store') }}" enctype="multipart/form-data">
                @csrf

              <div class="form-group ">
                    <label for="Numero d'inscription" class="control-label col-lg-2">Numero d'inscription <span class="" style="color:red;">*</span></label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="Numero d'inscription" name="num_insc" type="text" />
                    </div>
                  </div>
                <div class="form-group ">
                <label for="fullname" class="control-label col-lg-2">Nom <span class="" style="color:red;">*</span></label>
                <div class="col-lg-10">
                  <input class=" form-control" id="fullname" name="nom" type="text" />
                </div>
              </div>
              <div class="form-group ">
                <label for="fullname" class="control-label col-lg-2">Prenom <span class="" style="color:red;">*</span></label>
                <div class="col-lg-10">
                  <input class=" form-control" id="fullname" name="prenom" type="text" />
                </div>
              </div>
              <div class="form-group ">
                <label for="contact" class="control-label col-lg-2">Contact <span class="" style="color:red;">*</span></label>
                <div class="col-lg-10">
                  <input class=" form-control" id="contact" name="contact" type="number" />
                </div>
              </div>
              <div class="form-group ">
                <label for="email" class="control-label col-lg-2">Email <span class="" style="color:red;">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control " id="email" name="email" type="email" />
                </div>
              </div>                          
              <div class="form-group ">
                <label for="niveau" class="control-label col-lg-2">Niveau <span class="" style="color:red;">*</span></label>
                <div class="col-lg-10">
                    <select name="niveau_id" id="" class="form-control">
                      <option value="">--------Selectionner---------</option>
                      @foreach ($niveau as $niveaux)
                      <option value="{{ $niveaux->id }}">{{ $niveaux->lib_niveau }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group ">
                <label for="filiere" class="control-label col-lg-2">Filière <span class="" style="color:red;">*</span></label>
                <div class="col-lg-10">
                    <select name="filiere_id" id="" class="form-control">
                      <option value="">--------Selectionner---------</option>
                        @foreach ($filiere as $filieres)
                      <option value="{{ $filieres->id }}">{{ $filieres->lib_filiere }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group ">
                <label for="filiere" class="control-label col-lg-2">Année scolaire <span class="" style="color:red;">*</span></label>
                <div class="col-lg-10">
                    <select name="anneescolaire_id" id="" class="form-control">
                      <option value="">--------Selectionner---------</option>
                        @foreach ($anneescolaire as $anneescolaires)
                        <option value="{{ $anneescolaires->id }}">{{ $anneescolaires->lib_anneescolaire }}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group ">
                <label for="email" class="control-label col-lg-2">Theme <span class="" style="color:red;">*</span></label>
                <div class="col-lg-10">                   
                    <textarea id="my-textarea" class="form-control" name="theme" rows="3"></textarea>                   
                </div>
              </div>  
              {{-- <div class="form-group ">
                <label for="scolarite" class="control-label col-lg-2">Reçu soldé(jpg,png) <span class="" style="color:red;">*</span></label>
                <div class="col-lg-10"> 
                    <input type="file" accept="png,jpeg,jpg" name="files_scolarite" id="" class="form-control">                  
                </div>
              </div>  --}}
              {{-- <div class="form-group ">
                <label for="package" class="control-label col-lg-2">package soldé(jpg,png) <span class="" style="color:red;">*</span></label>
                <div class="col-lg-10"> 
                    <input type="file"  accept="png,jpeg,jpg" name="files_package" id="" class="form-control">                  
                </div>
              </div>  --}}
              {{-- <div class="form-group ">
                <label for="memoire" class="control-label col-lg-2">Contenu memoire(pdf) <span class="" style="color:red;">*</span></label>
                <div class="col-lg-10"> 
                    <input type="file"  accept="pdf" name="files_memoire" id="" class="form-control">                  
                </div>
              </div>      --}}
              
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-primary" type="submit" onclick="return confirm('confirmer l\'envoi')">Valider</button>
                  <button class="btn btn-default" type="reset">Annuler</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection