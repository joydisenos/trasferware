@extends('layouts.app')
@section('content')
 @parent
  <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Usuarios del sistema.</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#">wusi</a>
                    </li>
                    <li>
                        <a href="#">Usuarios</a>
                    </li>
                    <li>
                        <a href="#">Usuario</a>
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
  </div>
 <div v-if="unlookview" class="row" v-cloak>
     <div class="col-lg-7">
         <div class="panel panel-border Panel Inverse">
             <div class="panel-heading">
                 <h3 class="panel-title">@{{title}}</h3>
             </div>
             <div class="panel-body">
                 <div class="form-group">
                     <div class="input-group">
                         <span class="input-group-addon"><i class="fa fa-user"></i></span>
                         <input type="text" class="form-control" placeholder="Usuario"  v-model="item.name">
                     </div>
                     <div class="input-group m-t-10">
                         <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                         <input type="text" class="form-control" placeholder="Email" v-model="item.email">
                     </div>
                     <div class="input-group m-t-10">
                         <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                         <input type="password" class="form-control" placeholder="Contraseña" v-model="item.password">
                     </div>
                     <div class="input-group m-t-10">
                         <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                         <input type="password" class="form-control" placeholder="Repetir contraseña" v-model="repassword">
                     </div>
                     <div class="input-group m-t-10">
                         <span class="input-group-addon">Asignar rol de acceso al sistema.</span>
                     </div>
                     <div class="input-group  m-t-10 m-b-10">
                         <div class="input-group-btn">
                             <button type="button" class="btn waves-effect waves-light btn-default dropdown-toggle" data-toggle="dropdown" style="overflow: hidden; position: relative;">Roles <span class="caret"></span></button>
                             <ul class="dropdown-menu">
                                 <li v-for="rol in roles" :key="rol.id"><a href="javascript:void(0)" @click="setRol(rol)">@{{rol.name }}</a></li>
                             </ul>
                         </div>
                         <input disabled type="text" class="form-control" v-model="item.rol">
                     </div>

                   <hr>
                     <div  class="checkbox checkbox-primary">
                         <input  type="checkbox" v-model="item.status_id">
                         <label for="checkbox2">
                             Activo
                         </label>
                     </div>
                 </div>
             </div>
             <div class="panel-footer footer_fix">
                 <button v-if="pass()" class="btn btn-success btn-sm" @click="save()">Guardar</button>
                 <button class="btn btn-default btn-sm" @click="close()">Cerrar</button>
             </div>
         </div>
     </div>
 </div>
 <div v-if="!unlookview" class="row" v-cloak>
     <div class="row">
         <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 m-b-5"> <button class="btn btn-custom btn-inverse btn-sm" @click="add()">Nuevo</button></div>
         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">  <find :filters="filters" filter="name" v-on:getfilter="getlist" holder="..."></find></div>
     </div>
     <div class="panel panel-border panel-inverse" style="margin-top: 5px">
         <div class="panel-heading">
         </div>
         <table class="table table-hover">
             <thead>
             <tr>
                 <th class="cel_fix">Usuarios</th>
                 <th class="cel_fix">Email</th>
                 <th class="cel_fix">Roles</th>
                 <th class="cel_fix">Estado</th>
                 <th></th>
             </tr>
             </thead>
             <tbody>
             <tr class="mouse" v-for="entity in lists" :key="entity.id">
                 <td class="cel_fix">@{{entity.name}}</td>
                 <td class="cel_fix">@{{entity.email}}</td>
                 <td class="cel_fix">@{{entity.rol}}</td>
                 <td class="cel_fix">@{{entity.status}}</td>
                 <td>
                     <button class="btn btn-teal btn-sm" @click="edit(entity)"><i class="fa fa-edit"></i></button>
                     <button class="btn btn-danger btn-sm" @click="showdelete(entity)"><i class="fa fa-eraser"></i></button>
                 </td>
             </tr>
             </tbody>
         </table>
         <div class="panel-footer" style="padding: 2px 0 0 10px">
             <paginator :tpage="totalpage" :pager="pager" v-on:getresult="getlist"></paginator>
         </div>
     </div>
 </div>
@component('components.eliminar')@endcomponent
@component('components.spiner')@endcomponent
@endsection
@section('script')
    @parent
    <script src="{{asset('appjs/components/paginator.js')}}"></script>
    <script src="{{asset('appjs/components/find.js')}}"></script>
    <script src="{{asset('appjs/users.js')}}"></script>
@endsection
