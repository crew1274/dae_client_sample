@extends('layouts.plane')
@section('body')
 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('/home') }}">DAE Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                          <div class="container">
          @if (Session::has('message'))
              <div class="flash alert">
                  <p>{{ Session::get('message') }}</p>
              </div>
          @endif
                        </li>

                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messaage</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>

                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-language"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu ">
                        <li>
                            <a href="{{ url('/lang/zh') }}">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> 中文

                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('/lang/en') }}">
                                <div>
                                    <i class="fa fa-globe fa-fw"></i> English

                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ url('profile') }}"><i class="fa fa-user fa-fw"></i>
                            {{ Auth::user()->name }}{{ trans('dashboard.profile') }}</a>
                        </li>
                    </li>
                        <li class="divider"></li>
                        <li>
                          <a href="{{ url('/logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                       <i class="fa fa-sign-out fa-fw"></i>
                                       {{ trans('dashboard.logout') }}</a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">  {{ csrf_field() }}  </form>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li class="{{ Request::is('home') ? 'active' : '' }}">
                            <a href="{{ url ('home') }}"><i class="fa fa-home fa-fw"></i> {{ trans('dashboard.home') }}</a>
                        </li>
                        <li class="{{ Request::is('record') ? 'active' : '' }}">
                            <a href="{{ url ('record') }}"><i class="fa fa-bar-chart-o fa-fw"></i> {{ trans('dashboard.record') }}</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li class="{{ Request::is('setting') ? 'active' : '' }}">
                            <a href="{{ url ('setting') }}"><i class="fa fa-cogs fa-fw"></i> {{ trans('dashboard.initial_setting') }}</a>
                        </li>

                        <li class="{{ Request::is('config') ? 'active' : '' }}">
                            <a href="{{ url ('config') }}"><i class="fa fa-edit fa-fw">
                            </i> {{ trans('dashboard.peak_time_config') }}</a>
                        </li>


                        <li >
                            <a href="#"><i class="fa fa-wifi"></i>{{ trans('dashboard.network') }}<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="{{ Request::is('network/dhcp') ? 'active' : '' }}">
                                    <a href="{{ url ('network/dhcp') }}"> {{ trans('network.dhcp') }}</a>
                                </li>
                                <li class="{{ Request::is('network/static') ? 'active' : '' }}">
                                    <a href="{{ url ('network/static') }}"> {{ trans('network.static_ip') }}</a>
                                </li>
                                <li class="{{ Request::is('network/wifi') ? 'active' : '' }}">
                                    <a href="{{ url ('network/wifi') }}"> {{ trans('network.wifi') }}</a>
                                </li>

                            </ul>





                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
			 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
           </div>
			<div class="row">
				@yield('section')

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@stop
