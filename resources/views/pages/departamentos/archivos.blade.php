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
                <h4 class="page-title">Archivos {{ $dptoNombre }}</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#">{{ title_case(Auth::user()->name) }}</a>
                    </li>
                    <li>
                        <a href="#">Archivos</a>
                    </li>
                    <li>
                    	<a href="{{ url('archivos').'/'.$dpto }}">{{ $dptoNombre }}</a>
                    </li>
                    <li>
                    	<a href="#">{{ title_case($slug) }}</a>
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
  </div>


@include('components.carpetas')
@include('components.archivosicono')




      
@component('components.spiner')@endcomponent
@endsection
@section('script')

    @parent

 
   <script src="{{asset('appjs/components/paginator.js')}}"></script>
    <script src="{{asset('appjs/components/find.js')}}"></script>
    <script src="{{asset('appjs/metasFisicas.js')}}"></script>
     
@endsection
