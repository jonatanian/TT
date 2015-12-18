@extends('layouts.oficialia')

@section('Topbar')
	<!-- Start: Topbar -->
	<header id="topbar" class="ph10">
		<div class="topbar-left">
			<ul class="nav nav-list nav-list-topbar pull-left">
				<li>
					<a href="#">Oficios Saliente</a>
				</li>
				<li>&frasl;</li>
				<li class="active">
					<a href="#">Corregir observaci&oacute;n</a>
				</li>
			</ul>
		</div>

	</header>
	<!-- End: Topbar -->
@endsection

@section('content')
	<!-- Validation Example -->
    <div class="admin-form theme-success mw1000 center-block">
		<div class="panel panel-success heading-border">
			{{Form::open(array('class'=>'form-horizontal row-border','id'=>"validate-form",'data-parsley-validate'=>'true'))}}   
				<div class="panel-body">
				{{Form::hidden('IdConsecutivo',$IdConsecutivo)}}
				{{Form::hidden('IdRevisor',$IdRevisor)}}
				{{Form::hidden('IdCorrespondencia',$IdCorrespondencia)}}
				{{Form::hidden('IdObservaciones',$IdObservaciones)}}
					<div class="section-divider mt20 mb40">
						<span>Observaci&oacute;n a corregir</span>
					</div>
					<div class="section row">
						<div class="smart-widget sm-right smr-120">
						  <label for="Asunto" class="field prepend-icon">
							{{Form::textarea('ObservacionC', $Observaciones->getObservacion(), array('class'=>'gui-textarea','id'=>'ObservacionC','placeholder'=>'Observaci�n','required'=>'required'))}}
							<label for="Asunto" class="field-icon">
								<i class="fa fa-comments"></i>
							</label>
							<span class="input-footer">
								<strong>Recomendaci&oacute;n:</strong> Sea breve, claro y conciso en la redacci&oacute;n de la observaci&oacute;n.
							</span>
						  </label>
							<a href="#" class="button">Requerido</a>
						</div>
			
					</div>
					
					<div class="section-divider mt20 mb40">
						<span> Registrar observaci&oacute;n </span>
					</div>
					<div class="section row">
						<div class="smart-widget sm-right smr-120">
						  <label for="Asunto" class="field prepend-icon">
							{{Form::textarea('Observacion', null, array('class'=>'gui-textarea','id'=>'Observacion','placeholder'=>'Observaci�n','required'=>'required'))}}
							<label for="Asunto" class="field-icon">
								<i class="fa fa-comments"></i>
							</label>
							<span class="input-footer">
								<strong>Recomendaci&oacute;n:</strong> Sea breve, claro y conciso en la redacci&oacute;n de la observaci&oacute;n.
							</span>
						  </label>
							<a href="#" class="button">Requerido</a>
						</div>
						
						<div class="section">
							<label for="PDF" class="field-label">Subir copia digital corregida</label>
							<div class="smart-widget sm-right smr-120">
							  <label for="file1" class="field file">
								<span class="button bg-system"> Adjuntar </span>
								<input type="file" class="gui-file" name="DocPDF" id="DocPDF" onChange="document.getElementById('uploader1').value = this.value;">
								<input type="text" class="gui-input" id="uploader1" placeholder="No se ha seleccionado documento PDF" readonly>
							  </label>
								<a href="#" class="button">Requerido</a>
							</div>
							<!-- end .smart-widget section -->
						  </div>
						
						<div class="col-md-12 text-right">
							<button type="submit" class="button btn-success"> Registrar </button>
						</div>
					</div>
					
					</div>
				</div>
				{{Form::close()}} 
		</div>
		<br>
	</div>
@stop