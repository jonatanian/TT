@extends('layouts.oficialia')

@section('Topbar')
	<!-- Start: Topbar -->
	<header id="topbar" class="ph10">
		<div class="topbar-left">
			<ul class="nav nav-list nav-list-topbar pull-left">
				<li class="active">
					<a href="#">Oficios entrantes</a>
				</li>
			</ul>
		</div>
		<div class="topbar-right hidden-xs hidden-sm">
			<a href="{{action('OficiosEntrantesController@oficialia_nuevoOficio')}}" class="btn btn-default btn-sm fw600 ml10">
			<span class="fa fa-plus pr5"></span> Nuevo oficio entrante</a>
		</div>
	</header>
	<!-- End: Topbar -->
@stop
@section('content')

	<!-- Form Wizard -->
          <div class="admin-form">
			{{Form::open(array('class'=>'form-horizontal row-border','id'=>"form-wizard",'data-parsley-validate'=>'true'))}}
            <!--<form method="get" action="/" id="form-wizard">-->
              <div class="wizard steps-bg steps-justified">

                <!-- Wizard step 1 -->
                <h4 class="wizard-section-title">
                  <i class="fa fa-user pr5"></i> Datos del oficio</h4>
                <section class="wizard-section">

                  <div class="section">
                    <label for="Dependencia" class="field-label">Dependencia</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="Dependencia" class="field prepend-icon">
                        <input type="text" name="Dependencia" id="Dependencia" class="gui-input" placeholder="Nombre de la dependencia que emite..." required>
                        <label for="Dependencia" class="field-icon">
                          <i class="fa fa-building"></i>
                        </label>
                      </label>
	                  
			            <button data-toggle="dropdown" class="btn btn-success dropdown-toggle">
			              <span class="fa fa-plus fs14 va-m"></span>
			            </button>
			            <div class="dropdown-menu dropdown-persist w350 animated animated-shorter fadeIn" role="menu">  
			              <div class="panel mbn">
			                  <div class="panel-menu">
			                     <span class="panel-icon"><i class="fa fa-plus-square"></i></span>
			                     <span class="panel-title fw600"> Registrar nueva Dependencia</span>
			                  </div>
			                  <div class="panel-body panel-scroller scroller-navbar scroller-overlay scroller-pn pn">
			                      <ol class="timeline-list">
			                        <li class="timeline-item">
			                          <div class="timeline-icon bg-dark light">
			                            <span class="fa fa-tags"></span>
			                          </div>
			                          <div class="timeline-desc">
			                            <b>Michael</b> Added to his store:
			                            <a href="#">Ipod</a>
			                          </div>
			                          <div class="timeline-date">1:25am</div>
			                        </li>
			                        
			                        <li class="timeline-item">
			                          <div class="timeline-icon bg-success">
			                            <span class="fa fa-usd"></span>
			                          </div>
			                          <div class="timeline-desc">
			                            <b>Admin</b> created invoice for:
			                            <a href="#">Apple</a>
			                          </div>
			                          <div class="timeline-date">7:45am</div>
			                        </li>
			                      </ol>
			                  </div>
			                  <div class="panel-footer text-center p7">
			                    <a href="#" class="btn btn-rounded btn-success btn-block"> Registrar </a>
			                  </div>
			              </div>
			            </div>
			          
	                </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section">
                    <label for="Area" class="field-label">Área</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="Area" class="field prepend-icon">
                        <input type="text" name="Area" id="Area" class="gui-input" placeholder="Nombre del área que emite..." required>
                        <label for="Area" class="field-icon">
                          <i class="fa fa-circle-o-notch"></i>
                        </label>
                      </label>
                      <a href="#" class="button"><i class="fa fa-plus-circle"></i></a>
                    </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section">
                    <label for="Remitente" class="field-label">Remitente</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="Remitente" class="field prepend-icon">
                        <input type="text" name="Remitente" id="Remitente" class="gui-input" placeholder="Nombre de la persona que emite..." required>
                        <label for="Remitente" class="field-icon">
                          <i class="fa fa-user"></i>
                        </label>
                      </label>
                      <a href="#" class="button"><i class="fa fa-plus-circle"></i></a>
                    </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section">
                    <label for="Cargo" class="field-label">Cargo</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="Cargo" class="field prepend-icon">
                        <input type="text" name="Cargo" id="Cargo" class="gui-input" placeholder="Nombre del cargo del remitente..." required>
                        <label for="Cargo" class="field-icon">
                          <i class="fa fa-bookmark"></i>
                        </label>
                      </label>
                      <a href="#" class="button"><i class="fa fa-plus-circle"></i></a>
                    </div>
                    <!-- end .smart-widget section -->
                  </div>
                  <!-- end section -->

                </section>

                <!-- Wizard step 2 -->
                <h4 class="wizard-section-title">
                  <i class="fa fa-cog pr5"></i> Configuración del oficio</h4>
                <section class="wizard-section">

                  

                </section>

                <!-- Wizard step 3 -->
                <h4 class="wizard-section-title">
                  <i class="fa fa-paperclip pr5"></i> Anexos</h4>
                <section class="wizard-section">

                  
                </section>
              </div>
              <!-- End: Wizard -->

            {{Form::close()}}
            <!-- End Account2 Form -->

          </div>
          <!-- end: .admin-form -->
          
          
@stop

@section('scripts')
<script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";

    // Form Wizard 
    var form = $("#form-wizard");
    form.children(".wizard").steps({
      headerTag: ".wizard-section-title",
      bodyTag: ".wizard-section",
      onStepChanging: function(event, currentIndex, newIndex) {
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
      },
      onFinishing: function(event, currentIndex) {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
      },
      onFinished: function(event, currentIndex) {
        alert("Submitted!");
      }
    });

    
  });
</script>
@stop