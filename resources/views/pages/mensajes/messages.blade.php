@extends('layouts.app')
@section('content')
  <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Mensajes</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#">Wusi</a>
                    </li>
                    <li>
                        <a href="#">Mensajes</a>
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
  </div>
  <div class="tabpanel">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="{{route('crear')}}">Redactar</a></li>
                <li class="active"><a href="{{route('mensaje')}}">Recibidos</a></li>
                <li><a href="#">Borradores</a></li>
                <li><a href="{{route('enviados')}}">Enviados</a></li>
            </ul>
        </div>
        <div class="col-md-10">
                @if (Session::has('send_success_message'))
                    <div class="alert alert-success">
                            <p>{{Session::get('send_success_message')}}</p>
                        </div>
                @elseif(Session::has('send_error_message'))
                        <div class="alert alert-danger">
                            <p> {{Session::get('send_error_message')}}</p>
                        </div>
                @elseif(Session::has('delete_success_message'))
                        <div class="alert alert-success">
                            <p> {{Session::get('delete_success_message')}}</p>
                        </div>
                @elseif(Session::has('delete_error_message'))
                        <div class="alert alert-danger">
                            <p> {{Session::get('delete_error_message')}}</p>
                        </div>
                @endif
        <div class="content-tabla">
                <div class="panel panel-border panel-inverse" style="margin-top: 5px">
                    <div class="panel-heading">
                     
                    </div>
                    <table class="table table-hover table-responsive table-striped table-condensed">
                        <thead>
                            <tr>
                                <th style="width: 300px; overflow:hidden;" class="cel_fix"><h5>Origen</h5></th>
                                <th class="cel_fix"><h5>Asunto</h5></th>
                                <th class="cel_fix"><h5>Fecha</h5></th>
                                <th style="width: 150px" class="cel_fix"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($mensajes as $mensaje)
                            @if ($mensaje->leido)
                                <tr class="mouse">
                                    <td style="width: 300px; overflow:hidden;" class="cel_fix">{{$mensaje->name}}</td>
                                    <td class="cel_fix" style="overflow: hidden;">{{$mensaje->title}}</td>
                                    <td class="cel_fix" style="overflow: hidden;">{{$mensaje->created_at}}</td>
                                    <td style="width: 150px">
                                        <a class="btn btn-purple btn-sm" href="{{ route('vreceived', ['id' => $mensaje->id]) }}"><i class="fa fa-eye"></i></a>
                                        <button href="#" onclick="MessageDelete({{$mensaje->id}})" class="btn btn-danger btn-sm"><i class="fa fa-eraser"></i></button>
                                    </td>
                                </tr>
                            @else
                                <tr class="mouse">
                                    <td style="width: 300px; overflow:hidden;" class="cel_fix"><strong>{{$mensaje->name}}</strong></td>
                                    <td class="cel_fix" style="overflow: hidden;"><strong>{{$mensaje->title}}</strong></td>
                                    <td class="cel_fix" style="overflow: hidden;">{{$mensaje->created_at}}</td>
                                    <td style="width: 150px">
                                    <a class="btn btn-purple btn-sm" href="{{ route('vreceived', ['id' => $mensaje->id]) }}"><i class="fa fa-eye"></i></a>
                                    <button href="#" onclick="MessageDelete({{$mensaje->id}})" class="btn btn-danger btn-sm"><i class="fa fa-eraser"></i></button>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                 </table>
                <div class="panel-footer" style="padding: 2px 0 0 10px">
                     <paginator :tpage="totalpage" :pager="pager" v-on:getresult="getlist"></paginator>
                 </div>
                </div>
            </div>
        </div>
  </div>
@endsection
