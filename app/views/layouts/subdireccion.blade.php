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
  <!-- Vendor CSS -->
  {{HTML::style("vendor/plugins/magnific/magnific-popup.css")}}
  <!-- Theme CSS -->
  {{HTML::style("assets/skin/default_skin/css/theme.css")}}
  <!-- Admin Forms CSS -->
  {{HTML::style("assets/admin-tools/admin-forms/css/admin-forms.css")}}
  <!-- Favicon -->
  {{HTML::style("assets/img/favicon.ico")}}
  <!-- Required Plugin CSS -->
  {{HTML::style("vendor/plugins/tagmanager/tagmanager.css")}}
  {{HTML::style("vendor/plugins/daterange/daterangepicker.css")}}
  {{HTML::style("vendor/plugins/datepicker/css/bootstrap-datetimepicker.css")}}
  {{HTML::style("vendor/plugins/colorpicker/css/bootstrap-colorpicker.min.css")}}
  {{HTML::style("vendor/plugins/select2/css/core.css")}}
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  {{HTML::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js')}}
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
              <a href="{{action('UsersController@personal_cambiarContrasena', array('IdUsuario'=>Auth::id()))}}" class="animated animated-short fadeInUp">
                <span class="fa fa-gear"></span> Cambiar contraseña </a>
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
        <nav role="navigation" class="widget-body">
	        <ul class="nav sidebar-menu acc-menu active-warning">
	          <li class="sidebar-label pt20">Men&uacute;</li>
	          <li>
                <a href="{{action('OficialiaController@oficialia_index')}}">
                  <span class="glyphicon glyphicon-home"></span>
                  <span class="sidebar-title">Bandeja de entrada</span>
                </a>
              </li>
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
	            <a href="{{action('SIGController@SIG_index')}}">
	              <span class="glyphicon glyphicon-book"></span>
	              <span class="sidebar-title">SIG</span>
	            </a>
	          </li>
	          
	          <!-- sidebar resources -->
	          <li class="sidebar-label pt15">Control de correspondencia</li>
	          <li>
	            <a href="javascript:;">
	              <span class="fa fa-folder-open"></span>
	              <span class="sidebar-title">Oficios</span>
	              <span class="caret"></span>
	            </a>
	            <ul class="nav sub-nav acc-menu">
	              <li>
	                  <a href="{{action('OficiosController@subdireccion_recibidos')}}">
	                  <span class="fa fa-folder"></span> Oficios entrantes </a>
	              </li>
	              <li>
	                  <a href="{{action('OficiosController@subdireccion_salientes')}}">
	                  <span class="fa fa-folder-o"></span> Oficios salientes </a>
	              </li>
	            </ul>
	          </li>
	          <li>
	            <a href="javascript:;">
	              <span class="fa fa-folder-open"></span>
	              <span class="sidebar-title">Memorándums</span>
	              <span class="caret"></span>
	            </a>
	            <ul class="nav sub-nav acc-menu">
	              <li>
	                  <a href="{{action('MemosController@oficialia_recibidos')}}">
	                  <span class="fa fa-folder"></span> Memos recibidos</a>
	              </li>
	              <li>
	                  <a href="{{action('MemosController@oficialia_enviados')}}"> 
	                  <span class="fa fa-folder-o"></span> Memos enviados </a>
	              </li>
	            </ul>
	          </li>
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
    
      <!-- Start: Topbar -->
      	@yield('Topbar')
      <!-- End: Topbar -->
	  
      <!-- Begin: Content -->
      @yield('ContentClass')
            
      	@if(Session::has('msg'))
      		<div class="alert alert-success alert-dismissable">
			  <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
			  <i class="fa fa-check pr10"></i>
			  {{Session::get('msg')}}
			</div>
      	@endif
      	@if(Session::has('msgInfo'))
      		<div class="alert alert-info alert-dismissable">
			  <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
			  <i class="fa fa-info pr10"></i>
			  {{Session::get('msgInfo')}}
			</div>
      	@endif
      	@if(Session::has('msgWarning'))
      		<div class="alert alert-warning alert-dismissable">
			  <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
			  <i class="fa fa-warning pr10"></i>
			  {{Session::get('msgWarning')}}
			</div>
		@endif
        @if(Session::has('msgf'))
          	<div class="alert alert-danger alert-dismissable">
			  <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
			  <i class="fa fa-remove pr10"></i>
			  {{Session::get('msgf')}}
			</div>
        @endif
        @if(Session::has('msgSystem'))
	        <div class="alert alert-system alert-dismissable">
			  <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
			  <i class="fa fa-cubes pr10"></i>
			  {{Session::get('msgSystem')}}
			</div>
		@endif
		@if(Session::has('msgAlert'))
	        <div class="alert alert-alert alert-dismissable">
			  <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
			  <i class="fa fa-check pr10"></i>
			  {{Session::get('msgAlert')}}
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
  
  <!-- Page Plugins -->
  {{HTML::script('assets/admin-tools/admin-forms/js/jquery.validate.min.js')}}
  {{HTML::script('assets/admin-tools/admin-forms/js/jquery.steps.min.js')}}
  {{HTML::script('vendor/plugins/magnific/jquery.magnific-popup.js')}}
  	
  {{HTML::script('avalon/plugins/jquery-slimscroll/jquery.slimscroll.js')}}
  {{HTML::script('avalon/plugins/sparklines/jquery.sparklines.min.js')}}
  {{HTML::script('avalon/plugins/sparklines/jquery.sparklines.min.js')}}
  {{HTML::script('avalon/js/enquire.min.js')}}
  {{HTML::script('avalon/js/application.js')}}
  
  <!-- Time/Date Plugin Dependencies -->
  {{HTML::script('vendor/plugins/globalize/globalize.min.js')}}
  {{HTML::script('vendor/plugins/moment/moment.min.js')}}
  <!-- BS Dual Listbox Plugin -->
  {{HTML::script('vendor/plugins/duallistbox/jquery.bootstrap-duallistbox.min.js')}}
  <!-- Bootstrap Maxlength plugin -->
  {{HTML::script('vendor/plugins/maxlength/bootstrap-maxlength.min.js')}}
  <!-- Select2 Plugin Plugin -->
  {{HTML::script('vendor/plugins/select2/select2.min.js')}}
  <!-- Typeahead Plugin -->
  {{HTML::script('vendor/plugins/typeahead/typeahead.bundle.min.js')}}
  <!-- TagManager Plugin -->
  {{HTML::script('vendor/plugins/tagmanager/tagmanager.js')}}
  <!-- DateRange Plugin -->
  {{HTML::script('vendor/plugins/daterange/daterangepicker.min.js')}}
  <!-- DateTime Plugin -->
  {{HTML::script('vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js')}}
  
  <!-- BS Colorpicker Plugin -->
  {{HTML::script('vendor/plugins/colorpicker/js/bootstrap-colorpicker.min.js')}}
  <!-- MaskedInput Plugin -->
  {{HTML::script('vendor/plugins/jquerymask/jquery.maskedinput.min.js')}}
  
  <!-- Theme Javascript -->
  
  {{HTML::script('assets/js/utility/utility.js')}}
  {{HTML::script('assets/js/demo/demo.js')}}
  {{HTML::script('assets/js/main.js')}}
  
  @yield('scripts')
  
  <script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";

    // Init Theme Core    
    Core.init();

    $.datepicker.regional['es'] = {
		 closeText: 'Cerrar',
		 prevText: '<b>&lt;</b>',
		 nextText: '<b>&gt;</b>',
		 currentText: 'Hoy',
		 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
		 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
		 weekHeader: 'Sm',
		 dateFormat: 'dd/mm/yy',
		 firstDay: 1,
		 isRTL: false,
		 showMonthAfterYear: false,
		 yearSuffix: ''
	 };
 	$.datepicker.setDefaults($.datepicker.regional['es']);

  });
  </script>
  <!-- END: PAGE SCRIPTS -->

</body>

</html>