@extends('layouts.app')
@section('style')
<style>
	.dropzone{
		background: #ececec;
		padding: 20px;
		border: dashed thin #36404e;
	}
</style>
@endsection
@section('content')
 @parent
  <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Subir Archivos</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#">{{ title_case(Auth::user()->name) }}</a>
                    </li>
                    <li>
                        <a href="#">Subir Archivos</a>
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
  </div>

<div class="row">
	<div class="col-md-12">
		 <form action="{{Route('subirarchivo')}}" method="post" class="dropzone" enctype="multipart/form-data" id="subirarchivo">
            @csrf
            <input type="hidden" name="carpeta" value="{{Auth::user()->name}}">
			 
		</form>
	</div>
</div>

    <hr>

@foreach(Auth::user()->archivos as $archivo)
<div class="row">
    <div class="col-sm-2">
        <img src="{{ asset($archivo->ruta) }}" alt="" class="img-responsive" style="max-height: 50px; margin:0 auto">
    </div>
    <div class="col-sm-6">
        <p>Fecha de Subida: {{ $archivo->created_at->format('d-M-Y') }} </p> 
    </div>
    <div class="col-sm-4">
        <a href="https://docs.google.com/viewer?url={{ asset($archivo->ruta) }}" class="btn btn-primary" target="__blank"><i class="mdi mdi-eye"></i></a>
        <a href="{{ url($archivo->ruta) }}" class="btn btn-primary"><i class="mdi mdi-arrow-down-bold"></i></a>
        <a href="{{ url('eliminar/archivo').'/'.$archivo->id }}" class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
    </div>
</div>
    <hr>
@endforeach

      
@component('components.spiner')@endcomponent
@endsection
@section('script')
    @parent
    

    <script>
         
Dropzone.autoDiscover = false;
        window.onload = function () {

            var dropzoneOptions = {
                dictDefaultMessage: 'Arrastra los Archivos aquí!',
                paramName: "file",
                maxFilesize: 100, // MB
                addRemoveLinks: true,
                uploadMultiple: true,
                init: function () {
                    this.on("success", function (file) {
                        console.log("success > " + file.name);
                    });
                }
            };
            var uploader = document.querySelector('#subirarchivo');
            var newDropzone = new Dropzone(uploader, dropzoneOptions);

            console.log("Loaded");
        };
         

    
 </script>

 
   <script src="{{asset('appjs/components/paginator.js')}}"></script>
    <script src="{{asset('appjs/components/find.js')}}"></script>
    <script src="{{asset('appjs/metasFisicas.js')}}"></script>
     
@endsection
