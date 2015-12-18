@extends('layouts.oficialia')

@section('Topbar')
	<!-- Start: Topbar -->
	<header id="topbar" class="ph10">
		<div class="topbar-left">
			<ul class="nav nav-list nav-list-topbar pull-left">
				<li>
					<a href="{{action('OficiosController@direccion_recibidos')}}">Oficios entrantes</a>
				</li>
				<li>&frasl;</li>
				<li class="">
					<a href="#">{{$IdOficio->IdOficioDependencia}}</a>
				</li>
				<li>&frasl;</li>
				<li class="active">
					<a href="#">Turnar oficio</a>
				</li>
			</ul>
		</div>
	</header>
	<!-- End: Topbar -->
@endsection

@section('ContentClass')
	<section id="content" class="animated fadeIn">
@stop


@section('content')
	<!-- Validation Example -->
    <div class="admin-form theme-success mw1000 center-block">
		<div class="panel panel-success heading-border">
			{{Form::open(array('class'=>'form-horizontal row-border','id'=>"validate-form",'data-parsley-validate'=>'true'))}}   
				<div class="panel-body">
				{{Form::hidden('IdCorrespondencia',$IdCorrespondencia, array('id'=>'IdCorrespondencia'))}}
					<div class="section-divider mt20 mb40">
						<span> Selecciona a un usuario para turnarle el oficio </span>
					</div>
					<div class="section row">
						<div class="col-md-12">
							<span>Usuarios</span>
							<label for="IdUsuario" class="field prepend-icon">
								<select id="IdUsuario" name="IdUsuario" class="gui-input">
									@foreach($people as $person)
										@if($person->IdUsuario != Auth::user()->IdUsuario)
											<option value="{{$person->IdUsuario}}">{{$person->ApPaterno}}&nbsp;{{$person->ApMaterno}}&nbsp;{{$person->Nombre}}</option>
										@endif
									@endforeach
									@foreach($sPeople as $s)
										<option value="{{$s->IdUsuario}}">{{$s->ApPaterno}}&nbsp;{{$s->ApMaterno}}&nbsp;{{$s->Nombre}}</option>
									@endforeach
									@foreach($jPeople as $j)
										<option value="{{$j->IdUsuario}}">{{$j->ApPaterno}}&nbsp;{{$j->ApMaterno}}&nbsp;{{$j->Nombre}}</option>
									@endforeach
								</select> 
								<label for="IdUsuario" class="field-icon">
									<i class="fa fa-institution"></i>
								</label>
							</label>
						</div>
						
						<div class="col-md-12 text-right">
							<button type="submit" class="button btn-success"> Turnar </button>
						</div>
					</div>
				{{Form::close()}}
			</div>    
		</div>
		<br>
	</div>@stop