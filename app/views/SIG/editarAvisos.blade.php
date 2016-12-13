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
					<a href="{{action('SIGController@editarOrganigrama')}}">Avisos</a>
				</li>
				<li>&frasl;</li>
			</ul>
		</div>
	</header>
	<!-- End: Topbar -->
@endsection

@section('content')
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
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
            <small>Editar avisos</small>
          </h4>
          <ul class="icon-list">
						<li>
              <i class="fa fa-exclamation-circle text-warning fa-lg pr10"></i>
              <b> Título:</b> Es el título o tema al cual está relacionado el aviso.
            </li>
            <li>
              <i class="fa fa-exclamation-circle text-warning fa-lg pr10"></i>
              <b> Aviso:</b> Es el mensaje completo que desea comunicar.
            </li>
          </ul>
        </aside>
        <!-- end: .tray-left -->

        <!-- begin: .tray-center -->
        <div class="tray tray-center">
					<div class="panel">
						<div class="panel-heading">
							<span class="panel-title">Administración de avisos</span>
							<div class="panel-body bg-light dark">
								<div class="admin-form">
									{{Form::open(array('class'=>'form-horizontal row-border','id'=>"validate-form",'data-parsley-validate'=>'true','files'=>true,'enctype'=>'multipart/form-data'))}}
									<div class="section row mb10">
										<label for="new-nombre" class="field-label col-md-3 text-center">Título:</label>
										<div class="col-md-9">
											<label for="new-nombre" class="field prepend-icon">
												{{ Form::text('titulo', $aviso['titulo'], array('class'=>'form-control')) }}
												<label for="new-nombre" class="field-icon">
												</label>
											</label>
										</div>
									</div>

									<div class="section row mb10">
										<label for="aviso" class="field-label col-md-3 text-center">Aviso:</label>
										<div class="col-md-9">
											<label for="aviso" class="field prepend-icon">
												<textarea class="form-control" name="aviso">{{$aviso['aviso']}}</textarea>
												<label for="aviso" class="field-icon">
												</label>
											</label>
										</div>
									</div>

									<div class="section row mb10">
										<label for="prioridad" class="field-label col-md-3 text-center">Prioridad</label>
										<div class="col-md-9">
											<label for="prioridad" class="field prepend-icon">
												{{ Form::select('prioridad', $prioridad, $aviso['prioridad'], array('class'=>'form-control')) }}
												<label for="prioridad" class="field-icon">

												</label>
											</label>
										</div>
									</div>
									{{Form::hidden('idAviso',$aviso['idAviso'])}}
									<div class="col-md-12 text-right">
										<button type="submit" class="button btn-success"> Actualizar aviso </button>
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
