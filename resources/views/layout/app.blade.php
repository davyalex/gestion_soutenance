<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/chocolat.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/messi.css') }}" rel="stylesheet" />


        <!-- CUSTOM STYLES-->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style1.css') }}" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('logo.png') }}"  width="50%"/>

                    </a>
                    
                </div>
              
                
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="/"><i class="fa fa-edit "></i>A propos de l'application</a>
                    </li>                   

                    <li>
                        <a href="{{ route('etudiant.create') }}"><i class="fa fa-users "></i>Je veux soutenir </span></a>
                    </li>

                    <li>
                        <a href="#myModal" data-toggle="modal" class="">
                            <i class="fa fa-search"></i> Verifier ma programmation
                        </a>                    
                
                    </li>
                    
                    
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->

		<hr />
        <div id="page-wrapper" >
            <div class="row">
                <div class="col-lg-12">
                 <h2 class="text-center">GESTIONNAIRE DE SOUTENANCE</h2>   
                </div>
            </div>              
             <!-- /. ROW  -->
              <hr />
          
              <!-- /. ROW  --> 
           
            @yield('content')

        </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2021 Gestion de soutenance </a>
                </div>
            </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="{{ asset('js/messi.js') }}"></script>

    <script src="{{ asset('js/image-zoom.js') }}"></script>
    <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('js/jquery-1.10.2.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>

    
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
     <!-- FORM SCRIPTS -->
     <script src="{{ asset('js/form-component.js') }}"></script>
     <script src="{{ asset('js/script.js') }}"></script>
     <script src="{{ asset('js/jquery.js') }}"></script>
     <script src="{{ asset('js/jquery.chocolat.js') }}"></script>
     <script type="text/javascript">
        $(function() {
            $('.filtr-item a').Chocolat();
        });
    </script>
     

     <div class="panel-body">           
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Verification de la programmation soutenance</h4>
              </div>
              <div class="modal-body">

                <form role="form" method="" action="{{ route('etudiant.search_soutenance') }}">           
                  <div class="form-group">
                    <label for="exampleInputlibelle">Entrez votre Numero inscription</label>
                     <input type="text" name="search" id="" class="form-control">
                  </div>                   
                  <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> rechercher</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
   
</body>
</html>
