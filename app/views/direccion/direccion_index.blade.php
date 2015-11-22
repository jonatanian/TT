@extends('layouts.direccion')

@section('Topbar')
<header id="topbar" class="alt">
	<div class="topbar-left">
	  <ol class="breadcrumb">
	    <li class="crumb-active">
	      <a href="{{action('DireccionController@direccion_index')}}">Correspondencia</a>
	    </li>
	  </ol>
	</div>
</header>
@endsection

@section('content')
<!-- Begin: Content -->
      <section id="content" class="table-layout animated fadeIn">

        

        <!-- begin: .tray-center -->
        <div class="tray tray-center pn bg-light">

	        <div class="panel">

	          <!-- message menu header -->
	          <div class="panel-menu br-n hidden">
	            <div class="row table-layout">
	              <!-- toolbar left btn group -->
	              <div class="hidden-xs hidden-sm col-md-3 va-m pln">
	                <div class="btn-group">
	                  <button type="button" class="btn btn-default light">
	                    <i class="fa fa-refresh"></i>
	                  </button>
	                  <button type="button" class="btn btn-default light">
	                    <i class="fa fa-pencil"></i>
	                  </button>
	                </div>
	              </div>
	            </div>
	          </div>

            <!-- message toolbar header -->
            <div class="panel-menu br-n">
              <div class="row">
                <div class="hidden-xs hidden-sm col-md-3">
                  <div class="btn-group">
                    <button type="button" class="btn btn-default light">
                      <i class="fa fa-refresh"></i>
                    </button>
                    <button type="button" class="btn btn-default light">
                      <i class="fa fa-pencil"></i>
                    </button>
                  </div>
                </div>
                <div class="col-xs-12 col-md-9 text-right">
                  <button type="button" class="btn btn-danger light visible-xs-inline-block mr10">Compose</button>
                  <span class="hidden-xs va-m text-muted mr15"> Mostrando
                    <strong>15</strong> de
                    <strong>253</strong>
                  </span>
                  <div class="btn-group mr10">
                    <button type="button" class="btn btn-default light hidden-xs">
                      <i class="fa fa-star"></i>
                    </button>
                    <button type="button" class="btn btn-default light hidden-xs">
                      <i class="fa fa-calendar"></i>
                    </button>
                    <button type="button" class="btn btn-default light">
                      <i class="fa fa-trash"></i>
                    </button>
                  </div>
                  <div class="btn-group mr10">
                    <div class="btn-group">
                      <button type="button" class="btn btn-default light dropdown-toggle ph8" data-toggle="dropdown">
                        <span class="fa fa-tags"></span>
                        <span class="caret ml5"></span>
                      </button>
                      <ul class="dropdown-menu pull-right" role="menu">
                        <li>
                          <a href="#">Work</a>
                        </li>
                        <li>
                          <a href="#">Important</a>
                        </li>
                        <li>
                          <a href="#">Favorites</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                          <a href="#">
                            <span class="fa fa-plus pr5"></span> Create New</a>
                        </li>
                      </ul>
                    </div>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default light dropdown-toggle ph8 br-tp-left" data-toggle="dropdown">
                        <span class="fa fa-folder"></span>
                        <span class="caret ml5"></span>
                      </button>
                      <ul class="dropdown-menu pull-right" role="menu">
                        <li>
                          <a href="#">Work</a>
                        </li>
                        <li>
                          <a href="#">Important</a>
                        </li>
                        <li>
                          <a href="#">Favorites</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                          <a href="#">
                            <span class="fa fa-plus pr5"></span> Create New</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-default light">
                      <i class="fa fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-default light">
                      <i class="fa fa-chevron-right"></i>
                    </button>

                  </div>
                </div>
              </div>
            </div>

	          <!-- message listings table -->
	          <table id="message-table" class="table tc-checkbox-1 admin-form theme-warning br-t">
	            <thead>
	              <tr class="">
	                <th class="hidden-xs">Star</th>
	                <th>Sender</th>
	                <th class="hidden-xs">Label</th>
	                <th>Subject</th>
	                <th class="hidden-xs"></th>
	                <th class="text-center">Date</th>
	              </tr>
	            </thead>
	            <tbody>
	              <tr class="message-unread">
	                <td class="hidden-xs">
	                  <span class="rating block mn pull-left">
	                    <input class="rating-input" id="r1" type="radio" name="custom">
	                    <label class="rating-star" for="r1">
	                      <i class="fa fa-star va-m"></i>
	                    </label>
	                  </span>
	                </td>
	                <td class="">Sony Inc</td>
	                <td class="hidden-xs">
	                  <span class="badge badge-warning mr10 fs11"> Work </span>
	                </td>
	                <td class="">Lorem ipsum dolor sit amet, adipiscing eli</td>
	                <td class="hidden-xs">
	                  <i class="fa fa-paperclip fs15 text-muted va-b"></i>
	                </td>
	                <td class="text-right fw600">March 11</td>
	              </tr>
	            </tbody>
	          </table>

	          </div>

        </div>
        <!-- end: .tray-center -->

      </section>
      <!-- End: Content -->
@endsection