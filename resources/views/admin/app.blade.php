<!DOCTYPE html>
<html lang="fr">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/chocolat.css') }}" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/image-zoom.css') }}" rel="stylesheet" />
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
              
                <span class="logout-spn" >
                    <ul style="list-style:none;">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
    
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="text-align:center;">
                               <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                     {{ __(' Deconnexion') }}
                                </a>
    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </span>

            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    
                   @auth
                   <li class="active-link">
                    <a href="{{ route('homeadmin') }}" ><i class="fa fa-desktop "></i>Dashboard <span class="badge"></span></a>
                </li>
               

                <li>
                    <a href="{{ route('etudiant.list') }}"><i class="fa fa-users "></i>Etudiant prêt  <span class="badge">{{ DB::table('etudiants')->where('etat',0)->count() }}</span></a>
                </li>


                <li>
                    <a href="{{ route('etudiant.list') }}"><i class="fa fa-calendar "></i>Programmer une soutenance</a>
                </li>
                
                <li>
                    <a href="{{ route('homeadmin') }}"><i class="fa fa-user "></i>Programmer une soutenance</a>
                </li>

{{--                 
                <li>
                    <a href="/send-mail"><i class="fa fa-calendar "></i>Send mail</a>
                </li> --}}


                <li>
                    <a href="{{ route('soutenance.list') }}"><i class="fa fa-list "></i>Liste des soutenances programmé <span class="badge"></span></a>
                </li>

                @if (Route::has('register'))
                <li>
                    @if ( Auth::user()->email=='alexkouamelan96@gmail.com' )
                    <a class="" href="{{ route('register') }}"><i class="fa fa-user "></i>{{ __('Ajouter un admin') }}</a>
                    @endif
                </li>
            @endif
                   @endauth
                   
                    
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->


        <div id="page-wrapper" >
            <div class="row">
                <div class="col-md-12">
                 <h2 class="text-center"> <i class="fa fa-desktop "></i> ADMIN PANEL</h2>   
                </div>
            </div>              
             <!-- /. ROW  -->
              <hr />
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="alert alert-info">
                            <a href="javascript:history.go(-1)" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Retour</a> @yield('title')
    
                             <strong style="float:right;">Bienvenue <i class="fa fa-user"></i> Administrateur-<i><u>{{ Auth::user()->name }}</u></i>  !vous êtes bien connecté. </strong> 
                        </div>
                       
                    </div>
    
                    <div class="col-md-12 col-sm-12 col-xs-12">                   
                        @yield('content')
                    </div>
                </div>
            </div>
              <!-- /. ROW  --> 
           
           
            
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
    <script type="text/javascript" src="{{ asset('js/image-zoom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
      <!-- CUSTOM SCRIPTS -->
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
     <!-- FORM SCRIPTS -->
     <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
     <script type="text/javascript" src="{{ asset('js/form-component.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/jquery.chocolat.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/messi.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>
     <script type="text/javascript" type="text/javascript">
        $(function() {
            $('.filtr-item a').Chocolat();
        });
    </script>
    
   
</body>
</html>
