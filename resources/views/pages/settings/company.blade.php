@extends('layouts.app')
@section('content')
 @parent
  <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Generales de la compañia</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#">CyberHacker</a>
                    </li>
                    <li>
                        <a href="#">Ajustes</a>
                    </li>
                    <li>
                        <a href="#">Generales</a>
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
  </div>
 <div  class="row" v-cloak>
     <div class="col-lg-7">
         <div class="panel panel-border Panel Inverse">
             <div class="panel-heading">
                 <h3 class="panel-title">@{{title}}</h3>
             </div>
             <div class="panel-body">
                 <div class="form-group">
                     <label>Nombre de la empresa</label>
                     <input type="text" class="form-control" v-model="item.name">
                 </div>
                 <div class="form-group">
                     <label>Dirección</label>
                     <input type="text" class="form-control" v-model="item.address">
                 </div>
                 <div class="form-group">
                     <label>Telefono</label>
                     <input type="text" class="form-control" v-model="item.phone">
                 </div>
                 <div class="form-group">
                     <label>Email</label>
                     <input type="email" class="form-control" v-model="item.email">
                 </div>
                 <div class="form-group">
                     <label>NIF/CIF</label>
                     <input type="text" class="form-control" v-model="item.nif_cif">
                 </div>
             </div>
             <div class="panel-footer footer_fix">
                 <button v-if="pass()" class="btn btn-success btn-sm" @click="save()">Guardar</button>
             </div>
         </div>
     </div>
 </div>
@component('components.spiner')@endcomponent
@endsection
@section('script')
    @parent
    <script src="{{asset('appjs/components/paginator.js')}}"></script>
    <script src="{{asset('appjs/components/find.js')}}"></script>
    <script src="{{asset('appjs/company.js')}}"></script>
@endsection
