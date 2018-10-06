@extends('layouts.app')
@section('content')
 @parent
  <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Roles del sistema.</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#">Wusi</a>
                    </li>
                    <li>
                        <a href="#">Usuarios</a>
                    </li>
                    <li>
                        <a href="#">Roles</a>
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
                 <p class="m-b-10">Los roles garantizan a que modulo tiene acceso un usuario en el sistema.</p>
                     <div class="form-group">
                         <label for="inputName" class="control-label">Descripción</label>
                          <input type="text" class="form-control" v-model="item.name" placeholder="...">
                     </div>

                 <div class="row">
                     <div class="col-lg-4" style="color:black; letter-spacing: 15px">
                        Modulos
                     </div>
                     <div class="col-lg-3" style="color:black;letter-spacing: 15px">
                         Permisos
                     </div>
                 </div>
                     <div class="form-group">

                         <div class="row">
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="dg">
                                     <label for="checkbox2">
                                         Dirección General
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="dg create">
                                     <label for="checkbox2">
                                         Crear
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="dg modify">
                                     <label for="checkbox2">
                                         Modificar
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="dg delete">
                                     <label for="checkbox2">
                                         Eliminar
                                     </label>
                                 </div>
                             </div>
                         </div>

                         <div class="row">
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="cj">
                                     <label for="checkbox2">
                                         Consultoría Jurídica
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="cj create">
                                     <label for="checkbox2">
                                         Crear
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="cj modify">
                                     <label for="checkbox2">
                                         Modificar
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="cj delete">
                                     <label for="checkbox2">
                                         Eliminar
                                     </label>
                                 </div>
                             </div>
                         </div>

                         <div class="row">
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="opp">
                                     <label for="checkbox2">
                                         Oficina de planificación y presupuesto.
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="opp create">
                                     <label for="checkbox2">
                                         Crear
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="opp modify">
                                     <label for="checkbox2">
                                         Modificar
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="opp delete">
                                     <label for="checkbox2">
                                         Eliminar
                                     </label>
                                 </div>
                             </div>
                         </div>

                         <div class="row">
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="oga">
                                     <label for="checkbox2">
                                         Oficina de Gestión administrativa.
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="oga create">
                                     <label for="checkbox2">
                                         Crear
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="oga modify">
                                     <label for="checkbox2">
                                         Modificar
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="oga delete">
                                     <label for="checkbox2">
                                         Eliminar
                                     </label>
                                 </div>
                             </div>
                         </div>

                         <div class="row">
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="ogh">
                                     <label for="checkbox2">
                                         Oficina de  Gestión Humana.
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="ogh create">
                                     <label for="checkbox2">
                                         Crear
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="ogh modify">
                                     <label for="checkbox2">
                                         Modificar
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="ogh delete">
                                     <label for="checkbox2">
                                         Eliminar
                                     </label>
                                 </div>
                             </div>
                         </div>

                         <div class="row">
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="oac">
                                     <label for="checkbox2">
                                         Oficina de Atención Ciudadano.
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="oac create">
                                     <label for="checkbox2">
                                         Crear
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="oac modify">
                                     <label for="checkbox2">
                                         Modificar
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="oac delete">
                                     <label for="checkbox2">
                                         Eliminar
                                     </label>
                                 </div>
                             </div>
                         </div>
                         
                         <div class="row">
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="pty">
                                     <label for="checkbox2">
                                         Gerencia de Proyectos.
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="pty create">
                                     <label for="checkbox2">
                                         Crear
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="pty modify">
                                     <label for="checkbox2">
                                         Modificar
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="pty delete">
                                     <label for="checkbox2">
                                         Eliminar
                                     </label>
                                 </div>
                             </div>
                         </div>
                         
                         <div class="row">
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="prensa">
                                     <label for="checkbox2">
                                         Prensa.
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="prensa create">
                                     <label for="checkbox2">
                                         Crear
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="prensa modify">
                                     <label for="checkbox2">
                                         Modificar
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="prensa delete">
                                     <label for="checkbox2">
                                         Eliminar
                                     </label>
                                 </div>
                             </div>
                         </div>

                         

                         <div class="row">
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="ose">
                                     <label for="checkbox2">
                                         Oficina de Seguimiento Evaluación Control de Obras
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="ose create">
                                     <label for="checkbox2">
                                         Crear
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="ose modify">
                                     <label for="checkbox2">
                                         Modificar
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="ose delete">
                                     <label for="checkbox2">
                                         Eliminar
                                     </label>
                                 </div>
                             </div>
                         </div>

                         <div class="row">
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="users">
                                     <label for="checkbox2">
                                        Creacion de roles y usuarios
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="users create">
                                     <label for="checkbox2">
                                         Crear
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="users modify">
                                     <label for="checkbox2">
                                         Modificar
                                     </label>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="checkbox checkbox-primary">
                                     <input  type="checkbox" v-model="grants" value="users delete">
                                     <label for="checkbox2">
                                         Eliminar
                                     </label>
                                 </div>
                             </div>
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
     <div class="panel panel-border panel-inverse m-t-5">
         <div class="panel-heading">
         </div>
         <table class="table table-hover">
             <thead>
             <tr>
                 <th class="cel_fix">Roles</th>
                 <th></th>
             </tr>
             </thead>
             <tbody>
             <tr class="mouse" v-for="entity in lists" :key="entity.id">
                 <td class="cel_fix">@{{entity.name}}</td>
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
    <script src="{{asset('appjs/roles.js')}}"></script>
@endsection
