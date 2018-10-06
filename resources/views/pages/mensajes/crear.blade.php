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
                <li class="active"><a href="{{route('crear')}}">Redactar</a></li>
                <li><a href="{{route('mensaje')}}">Recibidos</a></li>
                <li><a href="#">Borradores</a></li>
                <li><a href="{{route('enviados')}}">Enviados</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            @if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
            @endif
            <form id="send_menssage" action="{{route('store')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">
                    <div class="form-group">
                        <select id="recipient_id" name="recipient_id" class="form-control">
                            <option value="">Seleccionar destinatario</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input id="text-input" name="title" class="form-control" placeholder="Asunto..." type="text">
                    </div>
                    <div class="form-group">
                        <textarea class="ckeditor" name="body" id="body" cols="9" rows="10" placeholder="Escriba el mensaje..."></textarea>    
                    </div>
                    <div class="form-group">
                        <label class="control-label">Adjuntar archivo</label>
                        <input type="file" name="file" >
                    </div>
            </div>
            <div class="card-footer">
            <button type="submit" formmethod="post" formaction="{{route('store')}}" class="btn btn-sm btn-primary">
                <i class="fa fa-dot-circle-o"></i> Enviar</button>
            </div>
            </form>
        </div>
  </div>

@endsection

