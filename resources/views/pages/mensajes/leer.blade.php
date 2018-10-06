@extends('layouts.app')
@section('content')
  <div class="row">
        <div class="col-xs-12">
            <div class="content-tabla">
                <div class="panel panel-border panel-inverse" style="margin-top: 5px">
                    <div class="panel-heading">
                        <h4><strong>De: </strong>{{$mensaje->name}}</h4>
                    </div>
                    <div style="border-bottom: solid 1px"></div>
                    <div style="margin: 1.5em">
                        {!!html_entity_decode($mensaje->body)!!}
                    @if ($mensaje->path_file)
                        <br>
                        <h5>Archivo adjunto</h5>
                        <a href="{{ route('download_file', [$mensaje->path_file]) }}">{{$mensaje->path_file}}</a>
                    @endif
                    </div>
                </div>
                <a href="{{route('mensaje')}}" class="btn btn-primary btn-sm"><i class="mdi mdi-cisco-webex"></i> Volver</a>
            </div>
        </div>
  </div>
@endsection

