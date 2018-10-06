<div id="metasfisicas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width: 90%;">
        <div class="modal-content p-0 b-0">
            <div class="panel panel-border panel-teal">
                <div class="panel-heading">
                    <h3 class="panel-title">Datos Metas Fisicas</h3>
                </div>
                <div class="panel-body">
                    
                    <p><strong>CÓDIGO PRESUPUESTARIO DEL ENTE: </strong>@{{item.cod_ente}}</p>
                    <p><strong >DENOMINACIÓN DEL ENTE: </strong>@{{item.denominacion_en}}</p>
                    <p><strong>ÓRGANO DE ADSCRIPCIÓN: </strong>@{{item.organ}}</p>
                    <p><strong>DENOMINACION DEL PROYECTO: </strong>@{{item.proyecto}}</p>
                    <p><strong>CODIGO NUEVA ETAPA: </strong>@{{item.cod_new_stage}}</p>
                    <p><strong>FECHA INICIO DEL PROECTO: </strong>@{{item.anio_start}}</p>
                    <p><strong>FECHA CULMINACION DEL PROECTO: </strong>@{{item.anio_end}}</p>
                    <br>
                    <div class="panel panel-border panel-inverse" style="margin-top: 5px; border: 1px solid #d1d1d2">
                         <div class="panel-heading">
                         </div>
                         <table class="table table-hover">
                             <thead>
                             <tr>
                                 <th class="cel_fix" style="text-align: center;" rowspan="2">Unidad de Medida</th><th style="text-align: center;">Presupuesto Aprobado</th><th style="text-align: center;">Presupuesto Modificado</th><th style="text-align: center;" colspan="2">CUARTO TRIMESTRE</th><th colspan="2" style="text-align: center;">Acumulado al Cuarto Trimestre</th>
                               
                                    
                             </tr>
                             <tr>
                                 <th style="text-align: center;">Cantidad</th><th style="text-align: center;">Cantidad</th><th style="text-align: center;">Cantidad Programada</th><th style="text-align: center;">Cantidad Ejecutada</th><th style="text-align: center;" >Cantidad Programada</th><th style="text-align: center;">Cantidad Ejecutada</th>
                             </tr>
                             </thead>
                             <tbody class="tabla-unidades">

                                <tr v-for="unidades in item.unidades">
                                    <td style="text-align: center">@{{unidades.name}}</td>
                                    <td style="text-align: center">@{{unidades.approved_amount}}</td>
                                    <td style="text-align: center">@{{unidades.modified_amount}}</td>
                                    <td style="text-align: center">@{{unidades.programmed_amount}}</td>
                                    <td style="text-align: center">@{{unidades.amount_executed}}</td>
                                    <td style="text-align: center">@{{unidades.programmed_accumulated}}</td>
                                    <td style="text-align: center">@{{unidades.executed_accumulated}}</td>
                                    
                                </tr>
                            
                             </tbody>
                         </table>

                        
                     </div>
                </div>
                <div class="panel-footer text-right">
                    <a href="#" data-dismiss="modal" class="btn btn-teal btn-sm">ACEPTAR</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>