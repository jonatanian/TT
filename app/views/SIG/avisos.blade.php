@extends('layouts.SIG')

@section('content')
	<div class="content-header">
      <h1>Sistema Integrado de Gestión de la Calidad y del Ambiente</h1>
      <h2 class="text-primary">Avisos</h2>
  </div>
		@foreach($avisos as $aviso)
			<hr />
			@if($aviso->prioridad == 1)
				<blockquote class="blockquote-danger">
			@elseif($aviso->prioridad == 2)
				<blockquote class="blockquote-warning">
			@else
				<blockquote class="blockquote-primary">
			@endif
				<h3 class="text-center text-primary">{{$aviso->titulo}}</h3>
				<p style="text-align:justify">{{$aviso->aviso}}</p>
				<footer>{{$aviso->fecha}} - <strong><em>{{$aviso->getUsuario($aviso->usuario_id)}}, {{$aviso->getCargoUsuario($aviso->usuario_id)}}</em></strong></footer>
			</blockquote>
		@endforeach
@stop
