@extends('layouts.oficialia')

@section('content')
	<!-- Begin: Content Header -->
    <div class="content-header">
      <h2>Registrar nuevo oficio</h2>
      <p class="lead">Por favor, rellene los siguientes campos.</p>
    </div>
	{{Form::open(array('class'=>'form-horizontal row-border', 'id'=>'datos'))}}
	<!-- Validation Example -->
    <div class="admin-form theme-success mw1000 center-block">

      <div class="panel panel-success heading-border">

        <div class="panel-body">
			
			<!-- .section-divider -->
            <!-- end .section row section -->
		        <div class="col-md-6">
					<div class="section-divider mt20 mb40">
						<span> Identificador de oficio:</span>
					</div>

				  <label for="NombreEmisor" class="field prepend-icon">
					{{Form::text('IdOficioSaliente',$oficios, array('class'=>'gui-input','id'=>'IdOficioSaliente'))}}
				  </label>
		        </div>
				
		        <div class="col-md-6">
					<div class="section-divider mt20 mb40">
						<span> Dirigido a:</span>
					</div>
		          <label for="Cargo" class="field prepend-icon">
		          	{{Form::text('NombreEntidad', null, array('class'=>'gui-input','id'=>'NombreEntidad'))}}
		          </label>
		        </div>
		      
				<div class="col-md-6">
					<div class="section-divider mt20 mb40">
						<span> Asunto:</span>
					</div>
		          <label for="Cargo" class="field prepend-icon">
		          	{{Form::text('Asunto', null, array('class'=>'gui-input','id'=>'Asunto'))}}
		          </label>
		        </div>
			
					
            <!-- end .section row section -->
			<div class="col-md-6">
			<div class="section-divider mt20 mb40">
				<span> Observaciones:</span>
			</div>

            <div class="section">
              <label for="comment" class="field prepend-icon">
                <textarea class="gui-textarea" id="comment" name="Asunto" placeholder="Observaciones..."></textarea>
                <label for="comment" class="field-icon">
                  <i class="fa fa-comments"></i>
                </label>
                <span class="input-footer">
                  <strong>Recomendación:</strong> Sea breve, claro y conciso con las observaciones.
                </span>
              </label>
			  <a href="{{action('OficiosController@oficialia_validar_oficio_saliente')}}" class="btn btn-primary"><i class="fa fa-pencil"></i><br> Enviar Observaciones</a>
            </div>
			</div>

		</div>
		
		<a href="{{action('OficiosController@oficialia_validar_oficio_saliente')}}" class="btn btn-success"><i class="fa fa-pencil"></i><br> Visto bueno</a>
        <a href="{{action('OficiosController@oficialia_enviados')}}" class="button btn-danger">Cancelar</a>
      </div
	</div>
	</div>
	{{Form::close()}}
@stop

