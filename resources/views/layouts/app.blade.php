<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('/assets/images/wusi.png')}}">
    <title>Wusi Corp.</title>

    <link href="{{asset('/plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/css/elements.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/css/core.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/css/components.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/css/pages.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/css/menu.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/vendors/dropzone/dropzone.css')}}" rel="stylesheet" type="text/css" />
    @yield('style')
    <link  href="{{asset('/plugins/switchery/switchery.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('/assets/js/modernizr.min.js')}}"></script>
    <style>
        .btn-links{
            opacity: 0;
            transform: translateY(30px);
            -webkit-transform: translateY(30px);
            -moz-transform: translateY(30px);
            -o-transform: translateY(30px);
            transition: all ease .3s;
        }

        .icono:hover .btn-links{
            opacity: 1;
            transform: translateY(0px);
            -webkit-transform: translateY(0px);
            -moz-transform: translateY(0px);
            -o-transform: translateY(0px);
        }
    </style>
</head>

<body class="fixed-left">
<div id="wrapper">
    <div class="topbar">
        <div class="topbar-left">
            <a href="{{route('home')}}" class="logo"><span>Wusi<span>Corp</span></span><i> <img src="{{asset('/assets/images/wusi.png')}}" width="48" height="48"></i></a>
        </div>
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <button class="button-menu-mobile open-left waves-effect">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li class="user-box">
                        <a href="{{Route('archivos')}}" class="waves-effect user-link"><img src="{{asset('assets/images/folder.png')}}" alt="user-img" class="user-img"></a>
                    </li>
                    <li class="dropdown user-box">
                            @if (session('nromensajes') > 0)
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true"><img src="{{asset('assets/images/if_chat_on.png')}}" alt="user-img" class="img-circle user-img"></a>
                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li><a href="{{route('mensaje')}}" ><i class="mdi mdi-bell-ring-outline"></i> Tienes {{session('nromensajes')}} mensajes sin leer</a></li>
                                </ul>
                            @else
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true"><img src="{{asset('assets/images/if_chat_off.png')}}" alt="user-img" class="img-circle user-img"></a>
                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li><a href="{{route('mensaje')}}" ><i class="mdi mdi-bell-ring-outline"></i> No tienes nuevos mensajes</a></li>
                                </ul>
                            @endif
                    </li>
                    <li class="dropdown user-box">
                        <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true"><img src="{{asset('assets/images/avatar-1.jpg')}}" alt="user-img" class="img-circle user-img"></a>
                        <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                            <li> <h5>Hola, {{auth()->user()->name}}</h5></li>
                            <li><a href="javascript:void(0)"><i class="ti-user m-r-5"></i> Perfil</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings m-r-5"></i> Ajustes</a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    <i class="ti-power-off m-r-5"></i>
                                    Salir
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <div id="sidebar-menu">
                <ul>
                    <!--<li class="has_sub">
                        <a href="#" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span> Inicio </span></a>
                    </li> -->
                    <li class="has_sub">
                         
                                <form action="">
                                    @csrf
                                 

    <div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-success" type="button"><i class="mdi mdi-magnify"></i> </button>
      </span>
      <input type="text" class="form-control" placeholder="Buscar">
    </div><!-- /input-group -->
                                </form> 
                      
                        </li>
                        <li class="has_sub">
                            <a href="{{ Route('subir') }}" class="waves-effect bg-success text-dark"><i class="mdi mdi-upload"></i><span> Subir Archivos </span></a>
                        </li>
                    @can('dg')
                        <li class="has_sub">
                            <a href="{{ url('archivos/dg') }}" class="waves-effect"><i class="mdi mdi-tab"></i><span> Dirección General. </span></a>
                        </li>
                    @endcan
                    @can('cj')
                        <li class="has_sub">
                            <a href="{{ url('archivos/cj') }}" class="waves-effect"><i class="mdi mdi-cisco-webex"></i><span>Consultoría Jurídica. </span></a>
                        </li>
                    @endcan
                    @can('opp')
                        <li class="has_sub">
                            <a href="{{ url('archivos/opp') }}" class="waves-effect"><i class="mdi mdi-cisco-webex"></i><span>Planif. y Presupuesto</span></a>
                            <!--<ul class="list-unstyled">
                                <li><a href="{{route('planificacion')}}">Planificación</a></li>
                                <li><a href="{{route('presupuesto')}}">Presupuesto</a></li>
                                <li><a href="{{route('organizacion')}}">Organización</a></li>
                            </ul>-->
                        </li>
                    @endcan
                    @can('oga')
                        <li class="has_sub">
                            <a href="{{ url('archivos/oga') }}" class="waves-effect"><i class="mdi mdi-cisco-webex"></i><span>Gestión administrativa. </span></a>
                        </li>
                    @endcan
                    @can('ogh')
                        <li class="has_sub">
                            <a href="{{ url('archivos/ogh') }}" class="waves-effect"><i class="mdi mdi-cisco-webex"></i><span>Gestión Humana. </span></a>
                        </li>
                    @endcan
                    @can('oac')
                        <li class="has_sub">
                            <a href="{{ url('archivos/oac') }}" class="waves-effect"><i class="mdi mdi-cisco-webex"></i><span>Atención a Ciudadano. </span></a>
                        </li>
                    @endcan
                    @can('pty')
                        <li class="has_sub">
                            <a href="{{ url('archivos/pty') }}" class="waves-effect"><i class="mdi mdi-cisco-webex"></i><span>Gerencia de Proyectos. </span></a>
                        </li>
                    @endcan
                    @can('prensa')
                        <li class="has_sub">
                            <a href="{{ url('archivos/prensa') }}" class="waves-effect"><i class="mdi mdi-cisco-webex"></i><span>Dpto. de Prensa </span></a>
                        </li>
                    @endcan
                    @can('ose')
                        <li class="has_sub">
                            <a href="{{ url('archivos/ose') }}" class="waves-effect"><i class="mdi mdi-cisco-webex"></i><span>Control de Obras. </span></a>
                            <!--<ul class="list-unstyled">
                                <li><a href="#" class="waves-effect"><span>Obras</span><span class="menu-arrow"></span></a>
                                    <ul class="list-unstyled">
                                        <li><a href="#">En ejecución</a></li>
                                        <li><a href="#">Terminadas</a>
                                        <li><a href="#">Insecciones</a>
                                    </ul>
                                </li>
                                <li><a href="#">Servicios</a>
                                <li><a href="#">Equipamientos</a>
                                <li><a href="#">Levantamientos</a>
                            </ul>-->
                        </li>
                    @endcan
                   <!-- <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="mdi mdi-plus-circle-multiple-outline"></i><span>Pedidos</span><span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                @can('Pedidos')
                                  <li><a href="{{route('orders')}}">Pedidos</a></li>
                                @endcan
                                @can('Recepciones')
                                   <li><a href="{{route('ordersreceiving')}}">Recepción de pedidos</a></li>
                                @endcan
                            </ul>
                    </li> -->
                    @can('users')
                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="mdi mdi-account-box-outline"></i><span>Usuarios</span><span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{route('roles')}}">Roles</a></li>
                                <li><a href="{{route('users')}}">Usuarios</a></li>
                            </ul>
                        </li>
                    @endcan
                    <li class="has_sub">
                        <a href="{{route('mensaje')}}" class="waves-effect"><i class="mdi mdi-cisco-webex"></i><span>Mensajes </span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-page">
        <div class="content">
            <div class="container" id="app">
                @yield('content')
            </div>
        </div>

        <footer class="footer text-right">
           <!-- Por desarrollar -->
        </footer>

    </div>
</div>
<script>
    var resizefunc = [];
</script>
<script src="{{asset('/assets/js/jquery.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/js/detect.js')}}"></script>
<script src="{{asset('/assets/js/fastclick.js')}}"></script>
<script src="{{asset('/assets/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('/assets/js/waves.js')}}"></script>
<script src="{{asset('/assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('/assets/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('/plugins/switchery/switchery.min.js')}}"></script>
<script src="{{asset('/plugins/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('/plugins/counterup/jquery.counterup.min.js')}}"></script>
<script src="{{asset('/plugins/raphael/raphael-min.js')}}"></script>
<script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('/assets/js/jquery.core.js')}}"></script>
<script src="{{asset('/assets/js/jquery.app.js')}}"></script>
<script src="{{asset('/appjs/axios.min.js')}}"></script>
<script src="{{asset('/appjs/vue.min.js')}}"></script>
<script src="{{asset('/appjs/lodash.js')}}"></script>
<script src="{{asset('/appjs/tools.js')}}"></script>
<script src="{{asset('/appjs/base.js')}}"></script>
<script src="{{ asset('/vendors/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('/vendors/dropzone/dropzone.js') }}"></script>
@yield('script')
@include('components.notificacion')
</body>
</html>