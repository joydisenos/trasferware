<div class="input-group">
    <input :type="fieldtype" id="example-input2-group3" name="example-input2-group3" class="form-control" placeholder="buscar.." v-model="filters.value">
    <div class="input-group-btn">
        <button type="button" class="btn waves-effect waves-light btn-default dropdown-toggle" data-toggle="dropdown" style="overflow: hidden; position: relative;">@{{ filters.descrip }} <span class="caret"></span></button>
        <ul class="dropdown-menu dropdown-menu-right">
            <li v-for="field in listfield"><a href="javascript:void(0)" @click="setfield(field)">@{{ field.name }}</a></li>
        </ul>
    </div>
</div>