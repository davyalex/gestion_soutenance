@extends('admin.app')

    @section('title', ' Acceuil admin')
   
        
 


    @section('content')

    <div id="page-inner">
       
                    <div class="row text-center pad-top">
          {{-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
              <div class="div-square">
                   <a href="{{ route('list_classe') }}" >
                    <i class="fa fa-database fa-5x"></i>
                    <h4>Classe</h4>
              </a>
              </div>    
          </div>  --}}
         
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
              <div class="div-square">
                   <a href="{{ route('list_anneescolaire') }}" >
                    <i class="fa fa-database fa-5x"></i>
                    <h4>Annee scolaire</h4>
              </a>
              </div>
             
             
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
              <div class="div-square">
                   <a href="{{ route('list_niveau') }}"  >
                    <i class="fa fa-database fa-5x"></i>
                    <h4>Niveau</h4>
              </a>            
              </div>

             
             
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
              <div class="div-square">
                   <a href="{{ route('list_filiere') }}" >
                    <i class="fa fa-database fa-5x"></i>
                    <h4>Filière</h4>
              </a>
              </div>
             
             
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
              <div class="div-square">
                   <a href="{{ route('list_jury') }}" >
                    <i class="fa fa-database fa-5x"></i>
                    <h4>Enseignant </h4>
              </a>
              </div>
             
             
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
              <div class="div-square">
                   <a href="{{ route('list_specialite') }}" >
                    <i class="fa fa-database fa-5x"></i>
                    <h4>Specialité</h4>
              </a>
              </div>
             
             
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
            <div class="div-square">
                 <a href="{{ route('list_salle') }}" >
                  <i class="fa fa-database fa-5x"></i>
                  <h4>Salle</h4>
            </a>
            </div>
           
           
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
            <div class="div-square">
                 <a href="{{ route('list_departement') }}" >
                  <i class="fa fa-database fa-5x"></i>
                  <h4>Departement</h4>
            </a>
            </div>
           
           
        </div>
      </div>
         <!-- /. ROW  -->               
  
    </div>

     <!--  FORM MODAL  --> 
{{--     
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
              <h4 class="modal-title">Form Tittle</h4>
            </div>
            <div class="modal-body">

              <form role="form">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile3">
                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                  <label>
                                                <input type="checkbox"> Check me out
                                            </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
    </div>
         --}}

    @endsection