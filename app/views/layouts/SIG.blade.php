<!DOCTYPE html>
<html>

<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>SISA-CMPL | Instituto Politécnico Nacional</title>
  <meta name="keywords" content="SISA-CMPL IPN" />
  <meta name="description" content="Centro Mexicano para la Producción más Limpia del Instituto Politécnico Nacional">
  <meta name="author" content="Alcántara Carrillo Oscar; Castañeda Chavero Jonatan Ian">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font CSS (Via CDN) -->
  {{HTML::style("http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700")}}
  <!-- Theme CSS -->
  {{HTML::style("assets/skin/default_skin/css/theme.css")}}
  <!-- Admin Forms CSS -->
  {{HTML::style("assets/admin-tools/admin-forms/css/admin-forms.css")}}
  <!-- Favicon -->
  {{HTML::style("assets/img/favicon.ico")}}
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

</head>

<body class="blank-page">
  <!-- Start: Main -->
  <div id="main">

    <!-- Start: Header -->
    <header class="navbar navbar-fixed-top bg-primary">
      <div class="navbar-branding">
        <a class="navbar-brand" href="#">
          <img src="{{asset('images/LogoSISA-SIG.png')}}" alt="SISA CMPL" height="60px">
        </a>
        <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
      </div>
      <ul class="nav navbar-nav navbar-left">
        <li class="hidden-xs">
          <span class="fs26"></span>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<li>
		@if((Auth::User()->Rol_Id == 7) or (Auth::User()->Rol_Id == 1))
			<div class="navbar-btn btn-group">
      			<a href="#" class="topbar-menu-toggle btn btn-sm" data-toggle="button">
          			<span class="fa fa-cog"></span>
      			</a>
    		</div>
    	@endif
		</li>

        <li class="menu-divider hidden-xs">
          <i class="fa fa-circle"></i>
        </li>

        <li class="dropdown menu-merge">
          <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">
          	<img src="{{asset('images/placeholder.png')}}" alt="avatar" class="mw30 br64">
          	<span class="hidden-xs pl15">{{Auth::User()->getNombreCompleto()}}</span>
            <span class="caret caret-tp hidden-xs"></span>
          </a>
          <ul class="dropdown-menu list-group dropdown-persist w250" role="menu"><!--
            <li class="list-group-item">
              <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-envelope"></span> Mensajes
              </a>
            </li>
            <li class="list-group-item">
              <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-bell"></span> Notificaciones
              </a>
            </li>
            <li class="list-group-item">
              <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-gear"></span> Configuración </a>
            </li>-->
			<!--<li class="list-group-item">
              <a href="{{action('UsersController@personal_cambiarContrasena', array('IdUsuario'=>Auth::id()))}}" class="animated animated-short fadeInUp">
                <span class="fa fa-gear"></span> Cambiar contraseña </a>
            </li>-->
            <li class="dropdown-footer">
              <a href="{{action('LoginController@logout')}}" class="">
              <span class="fa fa-power-off pr5"></span> Cerrar sesión </a>
            </li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- End: Header -->

    <!-- Start: Sidebar -->
    <aside id="sidebar_left" class="nano nano-light affix">

      <!-- Start: Sidebar Left Content -->
      <div class="sidebar-left-content nano-content">

        <!-- Start: Sidebar Header -->
        <header class="sidebar-header">

          <!-- Sidebar Widget - Author -->
          <div class="sidebar-widget author-widget">
            <div class="media">
              <a class="media-left" href="#">
                <img src="{{asset('images/placeholder.png')}}" alt="Usuario" class="img-responsive">
              </a>
              <div class="media-body">
                <div class="media-links">
                   <p class="sidebar-menu-toggle">Bienvenido</p>
                </div>
                <div class="media-author">{{Auth::User()->getNombreCompleto()}}</div>
              </div>
            </div>
          </div>
        </header>

        <!-- Start: Sidebar Menu -->
        <nav role="navigation" class="widget-body">
            <ul class="nav sidebar-menu acc-menu">
              <li class="sidebar-label pt20">Men&uacute;</li>
              <li>
                <a href="{{action('SIGController@SIG_index')}}">
                  <span class="glyphicon glyphicon-book"></span>
                  <span class="sidebar-title">Página principal del SIG</span>
                </a>
              </li>
              <!--
              <li>
                <a href="{{action('LoginController@SISA_index')}}">
                  <span class="glyphicon glyphicon-book"></span>
                  <span class="sidebar-title">SISA</span>
                </a>
              </li>-->

              <!-- sidebar resources -->
              <li class="sidebar-label pt15"></li>
              <li>
                <a href="javascript:;">
                  <span class="fa fa-envelope"></span>
                  <span class="sidebar-title">Áreas del CMPL</span>
                  <span class="caret"></span>
                </a>
                <ul class="nav sub-nav acc-menu">
                  <li>
                      <a href="{{action('SIGController@SIG_Master',array('IdArea'=>1))}}">
                      <span class="fa fa-bank"></span> Dirección </a>
                  </li>
                  <li>
                      <a href="{{action('SIGController@SIG_Master',array('IdArea'=>2))}}">
                      <span class="fa fa-wrench"></span> Subdirección Técnica</a>
                  </li>
                  <li>
                      <a href="{{action('SIGController@SIG_Master',array('IdArea'=>3))}}">
                      <span class="fa fa-graduation-cap"></span> Subdirección de Posgrado</a>
                  </li>
                  <li>
                      <a href="{{action('SIGController@SIG_Master',array('IdArea'=>4))}}">
                      <span class="fa fa-globe"></span> Subdirección de Vinculación y Apoyo</a>
                  </li>
                  <li>
                      <a href="{{action('SIGController@SIG_Master',array('IdArea'=>5))}}">
                      <span class="fa fa-cubes"></span> Departamento de Servicios Administrativos y Técnicos</a>
                  </li>
                  <li>
                      <a href="{{action('SIGController@SIG_Master',array('IdArea'=>6))}}">
                      <span class="fa fa-database"></span> Departamento de Sistemas y Banco de Datos</a>
                  </li>
                </ul>
              </li>
              <!--
              <li class="sidebar-proj">
                <a href="#projectOne">
                  <span class="fa fa-dot-circle-o text-primary"></span>
                  <span class="sidebar-title">Formatos</span>
                </a>
              </li>
              <li class="sidebar-proj">
                <a href="#projectTwo">
                  <span class="fa fa-dot-circle-o text-info"></span>
                  <span class="sidebar-title">Control de equipos</span>
                </a>
              </li>
              <li class="sidebar-proj">
                <a href="#projectTwo">
                  <span class="fa fa-dot-circle-o text-danger"></span>
                  <span class="sidebar-title">Protección civil</span>
                </a>
              </li>
              <li class="sidebar-proj">
                <a href="#projectThree">
                  <span class="fa fa-dot-circle-o text-warning"></span>
                  <span class="sidebar-title">Manual</span>
                </a>
              </li>
              <li class="sidebar-proj">
                <a href="#projectThree">
                  <span class="fa fa-dot-circle-o text-warning"></span>
                  <span class="sidebar-title">Organización</span>
                </a>
              </li>-->
    	      </ul>
         </nav>
    	      <!-- Start: Sidebar Collapse Button -->
    	      <div class="sidebar-toggle-mini">
    	        <a href="#">
    	          <span class="fa fa-sign-out"></span>
    	        </a>
    	      </div>
    	      <!-- End: Sidebar Collapse Button -->

      </div>
      <!-- End: Sidebar Left Content -->

    </aside>

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

      <!-- Start: Topbar-Dropdown -->
      <div id="topbar-dropmenu" class="alt">
        <div class="topbar-menu row"><!--
          <div class="col-xs-4 col-sm-2">
            <a href="#" class="metro-tile bg-primary light">
              <span class="glyphicon glyphicon-inbox text-muted"></span>
              <span class="metro-title">Editar página principal</span>
            </a>
          </div>
          <div class="col-xs-4 col-sm-2">
            <a href="#" class="metro-tile bg-info light">
              <span class="glyphicon glyphicon-user text-muted"></span>
              <span class="metro-title">Administrar Subdirecciones y Jefaturas</span>
            </a>
          </div>
          <div class="col-xs-4 col-sm-2">
            <a href="#" class="metro-tile bg-success light">
              <span class="glyphicon glyphicon-headphones text-muted"></span>
              <span class="metro-title">Administrar contenido SIG</span>
            </a>
          </div>
          <div class="col-xs-4 col-sm-2">
            <a href="#" class="metro-tile bg-system light">
              <span class="glyphicon glyphicon-facetime-video text-muted"></span>
              <span class="metro-title">Editar formatos</span>
            </a>
          </div>
          <div class="col-xs-4 col-sm-2">
            <a href="#" class="metro-tile bg-alert light">
              <span class="glyphicon glyphicon-picture text-muted"></span>
              <span class="metro-title">Administrar control de equipos</span>
            </a>
          </div>-->
          <div class="col-xs-4 col-sm-2">
            <a href="{{action('SIGController@SIG_RD')}}" class="metro-tile bg-warning light">
              <span class="fa fa-gears text-muted"></span>
              <span class="metro-title">Configuración de SIG</span>
            </a>
          </div>
        </div>
      </div>
      <!-- End: Topbar-Dropdown -->

      <!-- Begin: Content -->
      <section id="content" class="animated fadeIn">
        @if(Session::has('msg'))
          <div class="alert alert-system">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{Session::get('msg')}}
          </div>
        @endif
        @if(Session::has('msgf'))
          <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{Session::get('msgf')}}
          </div>
        @endif
        @yield('content')
      </section>

      <!-- Begin: Page Footer -->
      <footer id="content-footer" class="affix">
        <div class="row">
          <div class="col-md-6">
            <span class="footer-legal">© 2015 CMPL-IPN</span>
          </div>
        </div>
      </footer>
      <!-- End: Page Footer -->

      <!-- End: Content -->

    </section>
  </div>
  <!-- End: Main -->

  <!-- BEGIN: PAGE SCRIPTS -->

  <!-- jQuery -->
  {{HTML::script('vendor/jquery/jquery-1.11.1.min.js')}}
  {{HTML::script('vendor/jquery/jquery_ui/jquery-ui.min.js')}}

  {{HTML::script('avalon/plugins/jquery-slimscroll/jquery.slimscroll.js')}}
  {{HTML::script('avalon/plugins/sparklines/jquery.sparklines.min.js')}}
  {{HTML::script('avalon/plugins/sparklines/jquery.sparklines.min.js')}}
  {{HTML::script('avalon/js/enquire.min.js')}}
  {{HTML::script('avalon/js/application.js')}}

  <!-- Theme Javascript -->

  {{HTML::script('assets/js/utility/utility.js')}}

  {{HTML::script('assets/js/demo/demo.js')}}

  {{HTML::script('assets/js/main.js')}}
  <script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";

    // Init Theme Core
    Core.init();

    // Init Demo JS
    Demo.init();

  });
  </script>
  <!-- END: PAGE SCRIPTS -->

</body>
</html>
