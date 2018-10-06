<div id="editmetasfisicas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" >
    <div class="modal-content p-0 b-0">
      <div class="panel panel-border panel-teal">
        <div class="panel-heading">
          <h3 class="panel-title">Editar datos</h3>
        </div>
        <div class="panel-body">        
          <div class="form-edit">
            <div class="col">
              <div class="panel panel-border Panel Inverse">
                  <div class="panel-heading"></div>
                                    
                  <div class="panel-body">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="text" class="form-control" placeholder="Codigo presupuestario del ente"  v-model="item.cod_ente">
                      </div>
                      <div class="input-group m-t-10">
                        <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                        <input type="text" class="form-control" placeholder="Denominacion del ente" v-model="item.denominacion_en" >
                      </div>
                      <div class="input-group m-t-10">
                        <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                        <input type="text" class="form-control"  placeholder="Organo de adscripcion" v-model="item.organ" >
                      </div>
                      <div class="input-group m-t-10">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="text" class="form-control" placeholder="Codigo nueva etapa" v-model="item.cod_new_stage">
                      </div>
                      <div class="input-group m-t-10" >
                        <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                        <textarea type="text" class="form-control" placeholder="Denominacion del proyecto" v-model="item.proyecto" ></textarea>
                      </div>
                      <div class="input-group m-t-10">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" class="form-control" placeholder="Año de inicio" v-model="item.anio_start">
                      </div>
                      <div class="input-group m-t-10">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" class="form-control" placeholder="Año de culminacion" v-model="item.anio_end" >
                      </div>
                      <div id="accordion">
                        <div class="card" v-for="unidades in item.unidades">
                          <div class="card-header" id="headingOne">
                            <h5 class="mb-0" style="background-color: teal; border-radius: 5px;">
                              <button class="btn btn-link" data-toggle="collapse" v-bind:data-target="'#unidad'+ unidades.id"  aria-expanded="false"  v-bind:aria-controls="'unidad'+ unidades.id"style="color: white">
                                @{{unidades.name}}
                              </button>
                            </h5>
                          </div>

                          <div v-bind:id="'unidad'+ unidades.id" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                              <div class="input-group m-t-10">
                                <span class="input-group-addon"><i class="fa fa-tachometer"></i></span>
                                <input type="text" class="form-control" placeholder="Unidad de medida" v-model="unidades.name" >
                              </div>
                              <div class="input-group m-t-10">
                                <span class="input-group-addon"><i class="fa fa-bar-chart"></i></span>
                                <input type="text" class="form-control" placeholder="Presupuesto Aprobado" v-model="unidades.approved_amount" >
                                <span class="input-group-addon"><i class="fa fa-bar-chart"></i></span>
                                <input type="text" class="form-control" placeholder="Presupuesto modificado" v-model="unidades.modified_amount" >
                              </div>
                              <div class="input-group m-t-10">
                                <span class="input-group-addon"><i class="fa fa-bar-chart"></i></span>
                                <input type="text" class="form-control" placeholder="Cantidad Programada" v-model="unidades.programmed_amount"  >
                                <span class="input-group-addon"><i class="fa fa-bar-chart"></i></span>
                                <input type="text" class="form-control" placeholder="Cantidad ejecutada" v-model="unidades.amount_executed">
                              </div>
                              <div class="input-group m-t-10">
                                <span class="input-group-addon"><i class="fa fa-bar-chart"></i></span>
                                <input type="text" class="form-control" placeholder="Cantidad Programada acumulada" v-model="unidades.programmed_accumulated">
                                <span class="input-group-addon"><i class="fa fa-bar-chart"></i></span>
                                <input type="text" class="form-control" placeholder="Canidad ejecutada acumulada" v-model="unidades.executed_accumulated">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel-footer footer_fix">
                    <button class="btn btn-teal btn-sm" @click="save()">Guardar</button>
                     <a href="#" data-dismiss="modal" class="btn btn-default btn-sm">Cerrar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>