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

            <form method="post" action="/" id="form-wizard">
              <div class="wizard steps-bg steps-left">

                <!-- Wizard step 1 -->
                <h4 class="wizard-section-title">
                  <i class="fa fa-user pr5"></i>Datos del oficio</h4>
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
                      <a href="#" class="button"><i class="fa fa-plus-circle"></i></a>
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
                  <i class="fa fa-dollar pr5"></i>Configuración del oficio</h4>
                <section class="wizard-section">
				  
				  <div class="section">
                    <label for="Cargo" class="field-label">¿Es un oficio de respuesta?</label>
                    <!--<div class="smart-widget sm-right smr-120">-->
                      <span class="input-group-addon">
                        <input type="radio" name="EsRespuesta" id="Si" value="Si" checked>Sí
						<input type="radio" name="EsRespuesta" id="No" value="No">No
                      </span>
                    
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section">
                    <label for="firstname" class="field prepend-icon">
                      <input type="text" name="firstname" id="firstname" class="gui-input" placeholder="ID de oficio al que se responde..." required>
                      <label for="firstname" class="field-icon">
                        <i class="fa fa-user"></i>
                      </label>
                    </label>
                  </div>
                  <!-- end section -->
                  
                  <div class="section">
                    <label for="Cargo" class="field-label">¿Requiere respuesta?</label>
                    <span class="input-group-addon">
                        <input type="radio" name="RequiereRespuesta" id="Si" value="Si" checked>Sí
						<input type="radio" name="RequiereRespuesta" id="No" value="No">No
                      </span>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section">
                    <label for="Cargo" class="field-label">Fecha límite de respuesta</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="Cargo" class="field prepend-icon">
                        <input type="text" name="Cargo" id="Cargo" class="gui-input" placeholder="Calendar..." required>
                        <label for="Cargo" class="field-icon">
                          <i class="fa fa-bookmark"></i>
                        </label>
                      </label>
                      <a href="#" class="button"><i class="fa fa-plus-circle"></i></a>
                    </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section">
                    <label for="Cargo" class="field-label">CCP</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="Cargo" class="field prepend-icon">
                        <input type="text" name="Cargo" id="Cargo" class="gui-input" placeholder="Agregar destinatario CCP..." required>
                        <label for="Cargo" class="field-icon">
                          <i class="fa fa-bookmark"></i>
                        </label>
                      </label>
                      <a href="#" class="button"><i class="fa fa-plus-circle"></i></a>
                    </div>
                    <!-- end .smart-widget section -->
                  </div>

                </section>

                <!-- Wizard step 3 -->
                <h4 class="wizard-section-title">
                  <i class="fa fa-shopping-cart pr5"></i>Registro de anexos</h4>
                <section class="wizard-section">

                  <div class="section">
                    <label for="Cargo" class="field-label">Nuevo anexo</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="Cargo" class="field prepend-icon">
                        <input type="text" name="Cargo" id="Cargo" class="gui-input" placeholder="Descripción del anexo..." required>
                        <label for="Cargo" class="field-icon">
                          <i class="fa fa-bookmark"></i>
                        </label>
                      </label>
                      <a href="#" class="button">Agregar</a>
                    </div>
                    <!-- end .smart-widget section -->
                  </div>
                </section>
              </div>
              <!-- End: Wizard -->

            </form>
            <!-- End Account2 Form -->

          </div>
          <!-- end: .admin-form -->
@stop

@section('scripts')
  <style>
  /*page demo styles*/
  .wizard .steps .fa,
  .wizard .steps .glyphicon,
  .wizard .steps .glyphicon {
    display: none;
  }
  </style>
  <script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";

    // Init Theme Core    
    Core.init();

    // Init Demo JS     
    Demo.init();

    // Form Wizard 
    var form = $("#form-wizard");
    form.validate({
      errorPlacement: function errorPlacement(error, element) {
        element.before(error);
      },
      rules: {
        confirm: {
          equalTo: "#password"
        }
      }
    });
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
        alert("Wizard molando al mil!");
      }
    });

    // Demo Wizard Functionality
    var formWizard = $('.wizard');
    var formSteps = formWizard.find('.steps');

    $('.wizard-options .holder-style').on('click', function(e) {
      e.preventDefault();

      var stepStyle = $(this).data('steps-style');

      var stepRight = $('.holder-style[data-steps-style="steps-right"');
      var stepLeft = $('.holder-style[data-steps-style="steps-left"');
      var stepJustified = $('.holder-style[data-steps-style="steps-justified"');

      if (stepStyle === "steps-left") {
        stepRight.removeClass('holder-active');
        stepJustified.removeClass('holder-active');
        formWizard.removeClass('steps-right steps-justified');
      }
      if (stepStyle === "steps-right") {
        stepLeft.removeClass('holder-active');
        stepJustified.removeClass('holder-active');
        formWizard.removeClass('steps-left steps-justified');
      }
      if (stepStyle === "steps-justified") {
        stepLeft.removeClass('holder-active');
        stepRight.removeClass('holder-active');
        formWizard.removeClass('steps-left steps-right');
      }

      // Assign new style 
      if ($(this).hasClass('holder-active')) {
        formWizard.removeClass(stepStyle);
      } else {
        formWizard.addClass(stepStyle);
      }

      // Assign new active holder
      $(this).toggleClass('holder-active');
    });

  });
  </script>
@stop