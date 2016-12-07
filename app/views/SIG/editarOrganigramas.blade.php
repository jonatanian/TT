@extends('layouts.SIG_RD')

@section('Topbar')
	<!-- Start: Topbar -->
	<header id="topbar" class="ph10">
		<div class="topbar-left">
			<ul class="nav nav-list nav-list-topbar pull-left">
				<li>
					<a href="{{action('SIGController@SIG_RD')}}">Configuración del SIG</a>
				</li>
				<li>&frasl;</li>
				<li class="active">
					<a href="{{action('SIGController@editarOrganigrama')}}">Organigramas</a>
				</li>
				<li>&frasl;</li>
			</ul>
		</div>
	</header>
	<!-- End: Topbar -->
@endsection

@section('content')
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
	<section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-left -->
        <aside class="tray tray-left tray320">

          <h4> Contenido SIG -
            <small>Gestión de información</small>
          </h4>
          <ul class="icon-list">
            <li>
              <i class="fa fa-exclamation-circle text-warning fa-lg pr10"></i>
              <b> Área:</b> Es el área a la que se desea actualizar el organigrama.
            </li>
            <li>
              <i class="fa fa-exclamation-circle text-warning fa-lg pr10"></i>
              <b> Organigrama:</b> Es el archivo de la imagen en formato PNG (sólo en formato PNG).
            </li>
          </ul>
        </aside>
        <!-- end: .tray-left -->

        <!-- begin: .tray-center -->
        <div class="tray tray-center">
					<div class="panel">
						<div class="panel-heading">
							<span class="panel-title">Editar organigrama</span>
							<div class="panel-body bg-light dark">
								<div class="admin-form">
									{{Form::open(array('class'=>'form-horizontal row-border','id'=>"validate-form",'data-parsley-validate'=>'true','files'=>true,'enctype'=>'multipart/form-data'))}}
									<div class="section row mb10">
										<label for="new-nombre" class="field-label col-md-3 text-center">Área:</label>
										<div class="col-md-9">
											<label for="new-nombre" class="field prepend-icon">
												{{ Form::select('area', $areas, null, array('class'=>'form-control')) }}
												<label for="new-nombre" class="field-icon">

												</label>
											</label>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12 hidden-xs">
											<div class="section">
												<label class="field prepend-icon file">
													<span class="button bg-system">Organigrama</span>
													<input type="file" class="gui-file" name="set-archivo" id="set-archivo" required="required" onChange="document.getElementById('get-archivo').value = this.value;">
													<input type="text" class="gui-input" id="get-archivo" placeholder="Elije una imagen de tu equipo" readonly>
													<label class="field-icon">
														<i class="fa fa-upload"></i>
													</label>
												</label>
											</div>
										</div>
									</div>

									<div class="col-md-12 text-right">
										<button type="submit" class="button btn-success"> Actualizar Organigrama </button>
									</div>
									{{Form::close()}}
								</div>
							</div>
						</div>
					</div>

        </div>
        <!-- end: .tray-center -->

  	</section>
@endsection
