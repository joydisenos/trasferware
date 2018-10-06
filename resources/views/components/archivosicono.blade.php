<?php $elementos = [
  						'dg',
  						'cj',
  						'opp',
  						'oga',
  						'ogh',
  						'oac',
  						'pty',
  						'prensa',
  						'ose'
  					]; ?>

@foreach($archivos->chunk(6) as $row)
<div class="row">
    @foreach($row as $archivo)
    <div class="col-sm-2">
    	<div class="icono">
        <img src="{{ asset($archivo->ruta) }}" alt="" class="img-responsive" style="max-height: 50px; margin:0 auto">
        <p>Subido: {{ $archivo->created_at->format('d-M-Y') }} </p>

<div class="dropdown">
  <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Asignar
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    @foreach($elementos as $elemento)
	    @can($elemento)
	    <?php $carpetas = App\Carpeta::where('carpeta', $elemento)->get(); ?>
	    <?php 
	     switch ($elemento) {
            case 'dg':
                    $dptoNombre = "Dirección General";
                break;

            case 'cj':
                    $dptoNombre = "Consultoría Jurídica";
                break;

            case 'opp':
                    $dptoNombre = "Planificación y Presupuesto";
                break;

            case 'oga':
                    $dptoNombre = "Gestión Administrativa";
                break;

            case 'ogh':
                    $dptoNombre = "Gestión Humana";
                break;

            case 'oac':
                    $dptoNombre = "Atención al Ciudadano";
                break;

            case 'pty':
                    $dptoNombre = "Gerencia de Proyectos";
                break;

            case 'prensa':
                    $dptoNombre = "Departamento de Prensa";
                break;

            case 'ose':
                    $dptoNombre = "Control de Obras";
                break;
            
            default:
                $dptoNombre = Auth::user()->name;
                break;
        }
         ?>
	    <li class="dropdown-header">{{ $dptoNombre }}</li>
	    @foreach($carpetas as $carpeta)
	    	<li><a href="{{ url('mover/archivo').'/'.$archivo->id.'/'.str_slug($carpeta->nombre) }}">{{$carpeta->nombre}}</a></li>
	    @endforeach
	    <li class="divider"></li>
	    @endcan
    @endforeach
  </ul>
</div>

        <div class="btn-links">
        	<hr>
        	<a href="https://docs.google.com/viewer?url={{ asset($archivo->ruta) }}" class="btn btn-primary" target="__blank"><i class="mdi mdi-eye"></i></a>
	        <a href="{{ url($archivo->ruta) }}" class="btn btn-primary"><i class="mdi mdi-arrow-down-bold"></i></a>
	        <a href="{{ url('eliminar/archivo').'/'.$archivo->id }}" class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
        </div>
        </div>

    </div>
   
    @endforeach
</div>
    <hr>
@endforeach