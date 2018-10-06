@extends('layouts.app')
@section('content')
 @parent
  <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Planificación</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#">Wusi</a>
                    </li>
                    <li>
                        <a href="#">Planificación y presupuesto</a>
                    </li>
                    <li>
                        <a href="#">Planificación</a>
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
  </div>

  <div role="tabpanel">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" id="tab1" class="active">
                <a href="#home1" data-toggle="tab" role="tab" aria-controls="tab1">Plan operativo anua (POA 2018)</a>
            </li>
            <li role="presentation" id="tab2">
                <a href="#paneTwo1" data-toggle="tab" role="tab" aria-controls="tab2">Metas Fisicas</a>
            </li>
            <li role="presentation" id="tab3">
                <a href="#paneThree1" data-toggle="tab" role="tab" aria-controls="tab3">Metas Financiera</a>
            </li>
        </ul>
        <div id="tabContent1" class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home1">
                <p>Contenido de la siguiente pestaña</p>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="paneTwo1">
            <div class="content-tabla">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 m-b-5">
                        <div class="links">
                           <form role="FormData" method="post" action="{{ url('/import-metasFisicas') }}" id="avatarForm" style="display: none;">
                                {{csrf_field()}}
                                <input type="file" name="excel" id="avatarInput">
                                <br><br>
                               
                            </form>

                             <button class="btn btn-custom btn-inverse btn-sm" id="avatarImage" style="padding: 10px 20px;" >Cargar Excel</button>
                            
                        </div>                        
                    </div> 
                     <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">  <find :filters="filters" filter="name" v-on:getfilter="getlistsearch" holder="..."></find></div>
                </div>
                <div class="panel panel-border panel-inverse" style="margin-top: 5px">
                    <div class="panel-heading">
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="cel_fix">Codigo</th>
                                <th class="cel_fix">Proyecto</th>
                                <th></th>
                            </tr>
                        </thead>
                     <tbody>

                   

                     <tr class="mouse" v-for="metas in lists" :key="metas.id">
                         <td class="cel_fix">@{{metas.cod_new_stage}}</td>
                         <td class="cel_fix">@{{metas.proyecto}}</td>
                         <td>
                            
                             <button class="btn btn-purple btn-sm" @click="showMetas(metas)"><i class="fa fa-eye"></i></button>
                             <button class="btn btn-teal btn-sm" @click="edit(metas)"><i class="fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-sm" @click="showdelete(metas)"><i class="fa fa-eraser"></i></button>
                         </td>
                     </tr>
                     
                     </tbody>
                 </table>
                <div class="panel-footer" style="padding: 2px 0 0 10px">
                     <paginator :tpage="totalpage" :pager="pager" v-on:getresult="getlist"></paginator>
                 </div>
                </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="paneThree1">
            <p>Contenido de la siguiente pestaña</p>
          </div>
    </div>
      
@component('components.eliminar')@endcomponent
@component('components.spiner')@endcomponent
@component('components.metasFisicas')@endcomponent
@component('components.editMetasFisicas')@endcomponent
@endsection
@section('script')
    @parent
    

    <script>
         
         $(document).ready(function () {
            var $avatarImage, $avatarInput, $avatarForm;

            $avatarImage = $('#avatarImage');
            $avatarInput = $('#avatarInput');
            $avatarForm = $('#avatarForm');
            this.spin = false;
            $avatarImage.on('click', function () {
                $avatarInput.click();
            });

            $avatarInput.on('change', function () {
                var formData = new FormData();
                formData.append('excel', $avatarInput[0].files[0]);
         
                $.ajax({
                    url: "{{ url('/import-metasFisicas') }}",
                    method: 'post',
                    data:new FormData($('#avatarForm')[0]),
                    processData: false,
                    contentType: false
                }).done(function (data) {
                    this.spin = false;
                    toastr["success"](data);

                       
                }).fail(function () {
                     this.spin = false;
                        toastr["error"](data);
                        
                        
                });
            });
        });
 </script>

 
   <script src="{{asset('appjs/components/paginator.js')}}"></script>
    <script src="{{asset('appjs/components/find.js')}}"></script>
    <script src="{{asset('appjs/metasFisicas.js')}}"></script>
     
@endsection
