@foreach($carpetas->chunk(3) as $row)
<div class="row">
    @foreach($row as $carpeta)
    <div class="col-sm-4">
        <a href="{{ url('archivos').'/'.$dpto.'/'.str_slug($carpeta->nombre) }}" class="btn-toggle" toggle="#carpeta{{$carpeta->id}}">
        <div class="col-sm-2">
        <img src="{{ asset('assets/images/folder.png') }}" alt="" class="img-responsive" style="max-height: 20px; margin:0 auto">
        </div>
        <div class="col-sm-10">
            <p>{{ $carpeta->nombre }} </p> 
        </div>
    </a>
    </div>
    @endforeach
</div>
<hr>

@endforeach