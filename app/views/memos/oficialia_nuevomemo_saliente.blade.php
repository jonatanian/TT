﻿@extends('layouts.oficialia')

@section('content')
	<!-- Begin: Content Header -->
    <div class="content-header">
      <h2>Registrar nuevo memorándum</b></h2>
      <p class="lead">Por favor, rellene los siguientes campos.</p>
    </div>
	
	<!-- Validation Example -->
    <div class="admin-form theme-success mw1000 center-block">

      <div class="panel panel-success heading-border">

        <form method="post" action="/" id="admin-form">
          <div class="panel-body">

            <div class="section-divider mt20 mb40">
              <span> Memorándum saliente </span>
            </div>
			
			<!-- .section-divider -->
            <div class="section row">
              <div class="col-md-6">
                <label for="IdOficio" class="field prepend-icon">
                  <label name="IdOficio" id="IdOficio" class="gui-input">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CMPL/memo/2015/56 </label>
                  <label for="IdOficio" class="field-icon">
                    <i class="fa fa-file"></i>
                  </label>
                </label>
              </div>
            <!-- end section -->
            </div>
            <!-- end .section row section -->
			
			<!-- Fechas de emisión y entrega -->
            <div class="section row">
              <div class="col-md-6">
                <label for="FechaEmision" class="field prepend-icon">
                  <input type="text" name="FechaEmision" id="FechaEmision" class="gui-input" placeholder="Fecha de emisión...">
                  <label for="FechaEmision" class="field-icon">
                    <i class="fa fa-calendar"></i>
                  </label>
                </label>
              </div>
              <div class="col-md-6">
                <label for="FechaEntrega" class="field prepend-icon">
                  <input type="text" name="FechaEntrega" id="FechaEntrega" class="gui-input" placeholder="Fecha de entrega...">
                  <label for="FechaEntrega" class="field-icon">
                    <i class="fa fa-calendar"></i>
                  </label>
                </label>
              </div>
            </div>
			
			<div class="section-divider mt20 mb40">
        <span> Datos del destinatario </span>
      </div>
			
			<div class="section row">
        <div class="col-md-6">
          <label for="FechaEmision" class="field prepend-icon">
            <input type="text" name="FechaEmision" id="FechaEmision" class="gui-input" placeholder="Nombre del destinatario...">
            <label for="FechaEmision" class="field-icon">
              <i class="fa fa-user"></i>
            </label>
          </label>
        </div>
        <div class="col-md-6">
          <label for="FechaEntrega" class="field prepend-icon">
            <input type="text" name="FechaEntrega" id="FechaEntrega" class="gui-input" placeholder="Cargo del destinatario...">
            <label for="FechaEntrega" class="field-icon">
              <i class="fa fa-dashcube"></i>
            </label>
          </label>
        </div>
      </div>
			
			<div class="section row">
              <div class="col-md-6">
                <label for="FechaEmision" class="field prepend-icon">
                  <input type="text" name="FechaEmision" id="FechaEmision" class="gui-input" placeholder="Área del destinatario...">
                  <label for="FechaEmision" class="field-icon">
                    <i class="fa fa-adjust"></i>
                  </label>
                </label>
              </div>
            </div>
			
            <!-- end .section row section -->
			<div class="section-divider mt20 mb40">
              <span> Asunto </span>
            </div>

            <div class="section">
              <label for="comment" class="field prepend-icon">
                <textarea class="gui-textarea" id="comment" name="comment" placeholder="Asunto..."></textarea>
                <label for="comment" class="field-icon">
                  <i class="fa fa-comments"></i>
                </label>
                <span class="input-footer">
                  <strong>Recomendación:</strong> Sea breve, claro y conciso en la redacción del asunto.
                </span>
              </label>
            </div>
      
      <div class="section-divider mv40" id="spy5">
        <span> Configuración del memorándum </span>
      </div>
        <div class="section row">
          <div class="col-md-6 pad-r40 border-right">
            <span>Establecer prioridad del memorándum:</span>
            <br>
            <div class="option-group field">
            <label for="female" class="option option-danger mt10">
            <input type="radio" name="gender" id="female" value="female">
            <span class="radio"></span> Alta
            </label>
            
            <label for="male" class="option block option-warning mt10">
            <input type="radio" name="gender" id="male" value="male">
            <span class="radio"></span> Media
            </label>
            
            <label for="other" class="option block option-success mt10">
            <input type="radio" name="gender" id="other" value="other">
            <span class="radio"></span> Baja
            </label>
          </div>
        </div>  

      
      <div class="section row">
        <div class="col-md-6">
          <label for="FechaEmision" class="field prepend-icon">
            <label name="FechaEmision" id="FechaEmision" class="gui-input">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ana Bertha García Navarro</label>
            <label for="FechaEmision" class="field-icon">
              <i class="fa fa-user"></i>
            </label>
          </label>
        </div>
        <div class="col-md-6">
          <label for="FechaLimite" class="field prepend-icon">
            <label class="switch block mt15 right">
                <span>¿Requiere respuesta?</span>
                <input type="checkbox" name="tools" id="t4" value="admin" checked>
                <label for="t4" data-on="Sí" data-off="No" class=""></label>
            </label>
            <label for="FechaEmision" class="field prepend-icon">
              <input type="text" name="FechaEmision" id="FechaEmision" class="gui-input" placeholder="Fecha ímite de respuesta...">
              <label for="FechaEmision" class="field-icon">
                <i class="fa fa-calendar"></i>
              </label>
            </label>
          </label>
        </div>
      </div>
	      
      <div class="section row">
        <div class="col-md-6">
          <label for="FechaLimite" class="field prepend-icon">
            <label class="switch block mt15 right">
                <span>¿Contiene anexos?</span>
                <input type="checkbox" name="tools" id="t4" value="admin" checked>
                <label for="t4" data-on="Sí" data-off="No" class="success"></label>
            </label>
            <label for="FechaEmision" class="field prepend-icon">
              <input type="text" name="FechaEmision" id="FechaEmision" class="gui-input" placeholder="Descripción de los anexos...">
              <label for="FechaEmision" class="field-icon">
                <i class="fa fa-calendar"></i>
              </label>
            </label>
          </label>
        </div>
       <div class="col-md-6">
	        <label for="file1" class="field file">
	          <span class="button btn-system"> Adjuntar documento </span>
	          <input type="file" class="gui-file" name="upload1" id="file1" onChange="document.getElementById('uploader1').value = this.value;">
	          <input type="text" class="gui-input" id="uploader1" placeholder="No se ha seleccionado documento PDF" readonly>
	        </label>
      	</div>
      </div>

      <div class="panel-footer text-right">
        <button type="submit" class="button btn-success"> Registrar </button>
        <a href="{{action('MemosController@oficialia_enviados')}}" class="button btn-dark">Cancelar</a>
      </div>
      <!-- end .form-footer section -->
    </form>
	</div>
	<br>
@stop