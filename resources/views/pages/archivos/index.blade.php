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
                <h4 class="page-title">Archivos</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#">{{ title_case(Auth::user()->name) }}</a>
                    </li>
                    <li>
                        <a href="#">Archivos</a>
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
  </div>


@include('components.archivosicono')

      
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
