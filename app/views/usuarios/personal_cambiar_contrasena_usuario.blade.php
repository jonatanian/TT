@extends('layouts.dsbd')

@section('Topbar')
	<!-- Start: Topbar -->
	<header id="topbar" class="ph10">
		<div class="topbar-left">
			<ul class="nav nav-list nav-list-topbar pull-left">
				<li class="active">
					<a href="#">Recuperar Contraseña de Usuario</a>
				</li>
			</ul>
		</div>
	</header>
	<!-- End: Topbar -->
@stop

@section('content')
            <form method="post" action="/" id="account2">
              <div class="panel-body p25 bg-light">
                <div class="section-divider mt10 mb40">
                  <span>Set up your account</span>
                </div>
                <!-- .section-divider -->

                <div class="section row">
                  <div class="col-md-6">
                    <label for="firstname" class="field prepend-icon">
                      <input type="text" name="firstname" id="firstname" class="gui-input" placeholder="First name...">
                      <label for="firstname" class="field-icon">
                        <i class="fa fa-user"></i>
                      </label>
                    </label>
                  </div>
                  <!-- end section -->

                  <div class="col-md-6">
                    <label for="lastname" class="field prepend-icon">
                      <input type="text" name="lastname" id="lastname" class="gui-input" placeholder="Last name...">
                      <label for="lastname" class="field-icon">
                        <i class="fa fa-user"></i>
                      </label>
                    </label>
                  </div>
                  <!-- end section -->
                </div>
                <!-- end .section row section -->

                <div class="section">
                  <label for="email" class="field prepend-icon">
                    <input type="email" name="email" id="email" class="gui-input" placeholder="Email address">
                    <label for="email" class="field-icon">
                      <i class="fa fa-envelope"></i>
                    </label>
                  </label>
                </div>
                <!-- end section -->

                <div class="section">
                  <div class="smart-widget sm-right smr-120">
                    <label for="username" class="field prepend-icon">
                      <input type="text" name="username" id="username" class="gui-input" placeholder="Choose your username">
                      <label for="username" class="field-icon">
                        <i class="fa fa-user"></i>
                      </label>
                    </label>
                    <label for="username" class="button">.envato.com</label>
                  </div>
                  <!-- end .smart-widget section -->
                </div>
                <!-- end section -->

                <div class="section">
                  <label for="password" class="field prepend-icon">
                    <input type="password" name="password" id="password" class="gui-input" placeholder="Create a password">
                    <label for="password" class="field-icon">
                      <i class="fa fa-unlock-alt"></i>
                    </label>
                  </label>
                </div>
                <!-- end section -->

                <div class="section">
                  <label for="confirmPassword" class="field prepend-icon">
                    <input type="password" name="confirmPassword" id="confirmPassword" class="gui-input" placeholder="Retype your password">
                    <label for="confirmPassword" class="field-icon">
                      <i class="fa fa-lock"></i>
                    </label>
                  </label>
                </div>
                <!-- end section -->

                <div class="section-divider mv40">
                  <span>Review the Terms</span>
                </div>
                <!-- .section-divider -->

                <div class="section mb15">
                  <label class="option block">
                    <input type="checkbox" name="trial">
                    <span class="checkbox"></span>Sign me up for a
                    <a href="#" class="theme-link"> 7-day free PRO trial. </a>
                  </label>
                  <label class="option block mt15">
                    <input type="checkbox" name="terms">
                    <span class="checkbox"></span>I agree to the
                    <a href="#" class="theme-link"> terms of use. </a>
                  </label>
                </div>
                <!-- end section -->

              </div>
              <!-- end .form-body section -->
              <div class="panel-footer clearfix">
                <button type="submit" class="button btn-primary pull-right">Create Account</button>
              </div>
              <!-- end .form-footer section -->
            </form>
@stop

@section('scripts')

  <!-- jQuery -->
  <script src="vendor/jquery/jquery-1.11.1.min.js"></script>
  <script src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

  <!-- CanvasBG Plugin(creates mousehover effect) -->
  <script src="vendor/plugins/canvasbg/canvasbg.js"></script>

  <!-- Theme Javascript -->
  <script src="assets/js/utility/utility.js"></script>
  <script src="assets/js/demo/demo.js"></script>
  <script src="assets/js/main.js"></script>

  <!-- Page Javascript -->
  <script type="text/javascript">
  jQuery(document).ready(function() {
    "use strict";
    // Init Theme Core      
    Core.init();

    // Init Demo JS
    Demo.init();

    // Init CanvasBG and pass target starting location
    CanvasBG.init({
      Loc: {
        x: window.innerWidth / 2.1,
        y: window.innerHeight / 4.2
      },
    });
  });
  </script>

@stop
