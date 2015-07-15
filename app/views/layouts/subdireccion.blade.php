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
    <header class="navbar navbar-fixed-top bg-success">
      <div class="navbar-branding">
        <a class="navbar-brand" href="#">
          <img src="{{asset('images/LogoSISAv4.png')}}" alt="SISA CMPL" height="60px">
        </a>
        <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
      </div>
      <ul class="nav navbar-nav navbar-left">
        <li class="hidden-xs">
          <span class="fs26">Sistema de Administración del CMPL</span>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="menu-divider hidden-xs">
          <i class="fa fa-circle"></i>
        </li>
        <li class="dropdown menu-merge">
          <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">
          	<img src="{{asset('images/placeholder.png')}}" alt="avatar" class="mw30 br64">
          	<span class="hidden-xs pl15">{{Auth::User()->getNombreCompleto()}}</span>
            <span class="caret caret-tp hidden-xs"></span>
          </a>
          <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
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
            </li>
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
        <ul class="nav sidebar-menu">
          <li class="sidebar-label pt20">Men&uacute;</li>
          <li>
            <a href="http://www.sidirtel.ipn.mx" target="_blank">
              <span class="fa fa-users"></span>
              <span class="sidebar-title">Directorio IPN</span>
            </a>
          </li>
          <li>
            <a href="http://148.204.90.213/Directorio/Directorio.html" target="_blank">
              <span class="glyphicon glyphicon-book"></span>
              <span class="sidebar-title">Directorio CMPL</span>
            </a>
          </li>
          <li>
            <a href="{{action('SIGController@SIG_index')}}" target="_blank">
              <span class="glyphicon glyphicon-book"></span>
              <span class="sidebar-title">SIG</span>
            </a>
          </li>
          
          <!-- sidebar resources -->
          <li class="sidebar-label pt15">Correspondencia</li>
          <li>
            <a class="accordion-toggle" href="#">
              <span class="fa fa-envelope"></span>
              <span class="sidebar-title">Oficios</span>
              <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
              <li>
                  <a href="{{action('OficiosController@oficialia_recibidos')}}">
                  <span class="fa fa-send-o"></span> Oficios entrantes </a>
              </li>
              <li>
                  <a href="{{action('OficiosController@oficialia_enviados')}}">
                  <span class="fa fa-send"></span> Oficios salientes </a>
              </li>
              <li>
                  <a href="{{action('OficiosController@corregir_oficio')}}">
                  <span class="fa fa-send"></span> Oficios con observaciones </a>
              </li>
			  <li>
                  <a href="{{action('OficiosController@personal_registrar_anexos')}}">
                  <span class="fa fa-send"></span> Registrar anexos </a>
              </li>
            </ul>
          </li>  
          <li>
            <a class="accordion-toggle" href="#">
              <span class="fa fa-envelope-o"></span>
              <span class="sidebar-title">Memorándums</span>
              <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
              <li>
                <a href="#">
                  <span class="fa fa-send"></span>Memos recibidos </a>
              </li>
              <li>
                <a href="#">
                  <span class="fa fa-send-o"></span>Memos enviados </a>
              </li>
              <li>
            </ul>
          </li>

          <!-- sidebar bullets -->
          <li class="sidebar-label pt20">CMPL</li>
          <li class="sidebar-proj">
            <a href="#projectOne">
              <span class="fa fa-dot-circle-o text-primary"></span>
              <span class="sidebar-title">Avisos</span>
            </a>
          </li>
          <li class="sidebar-proj">
            <a href="#projectTwo">
              <span class="fa fa-dot-circle-o text-info"></span>
              <span class="sidebar-title">Galería fotográfica</span>
            </a>
          </li>
          <li class="sidebar-proj">
            <a href="#projectTwo">
              <span class="fa fa-dot-circle-o text-danger"></span>
              <span class="sidebar-title">Cursos</span>
            </a>
          </li>
          <li class="sidebar-proj">
            <a href="#projectThree">
              <span class="fa fa-dot-circle-o text-warning"></span>
              <span class="sidebar-title">Material de apoyo</span>
            </a>
          </li>
        </ul>  
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