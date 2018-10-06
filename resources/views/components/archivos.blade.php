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