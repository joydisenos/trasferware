<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Excel;
use App\Models\MetasFisicas;
use App\Models\UnidadMedida;
use Carbon\Carbon;


class PlananualController extends Controller
{
      public function index() {
       
       return view('pages.planificacion.planificacion');
   }

   public function getList(){

        $metasfisicas = MetasFisicas::with('Unidades')->orderBy('id', 'asc')->get();
        $total = $metasfisicas->count();

            $list =  $metasfisicas;

            $result = [

                'total' => $total,

                'list' =>  $list,

            ];

            return response()->json($result, 200);
        
   }
   public function ExcelMetasFisicas(Request $request)
    {

    \Excel::selectSheetsByIndex(0)->load($request->file('excel'), function($reader) {

         $reader->noHeading();

         $results = $reader->toArray();

   
            $codigo_etapa = $results[11][1];
            $proyecto = $results[11][2];
            $user = \Auth::user()->id;
    		$cod = explode(':', $results[0][1], 2); // Restricts it to only 2 values, for names like Billy Bob Jones
			$codigo = $cod[1];
			$ent = explode(':', $results[1][1], 2);
			$ente = $ent[1];
			$org = explode(':', $results[2][1], 2);
			$organo = $org[1];
			$inicio = str_replace('/','-',$results[11][3]);
            $inicio = Carbon::parse($inicio)->format('Y-m-d');  
            $fin = str_replace('/','-',$results[11][4]);
            $fin = Carbon::parse($fin)->format('Y-m-d');
       
       		

         	$metas = new MetasFisicas();
            $metas->user_id = $user;
            $metas->cod_ente = $codigo;
            $metas->denominacion_en = $ente;
            $metas->organ = $organo;
            $metas->cod_new_stage = $codigo_etapa;
            $metas->anio_start =$inicio;
            $metas->anio_end = $fin;   
            $metas->proyecto = $proyecto;


            if($metas->save()){

            	

	            $reader->skip(11);
	            
	            $reader->each(function ($row){
	            	$metas= MetasFisicas::all()->last();

	            	$unidades = new UnidadMedida();
	            	$unidades->name = $row[5];
	            	$unidades->approved_amount = $row[6];
	            	$unidades->modified_amount = $row[7];
	            	$unidades->programmed_amount = $row[8];
	            	$unidades->amount_executed = $row[9];
	            	$unidades->executed_accumulated = $row[10];
	            	$unidades->programmed_accumulated = $row[11];
	            	$unidades->metas_fisicas_id = $metas->id;
	            	if($row[5]!=''){
	            		$unidades->save();
	            	}else{
	            		return response()->json('Datos registrados con exito', 200);
	            		//return redirect('/planificacion')->with('succes', 'Datos registrados con exito.'); 
	            	}
	            	

	            });
        	}else{
        		return response()->json('Ocurrio un error por favor verifique el archivo', 500);
	            //return redirect('/planificacion')->with('error', 'Ocurrio un error por favor verifique el archivo.'); 
	        }
        
    	})->get();
    	return response()->json('Datos registrados con exito', 200);
    	//return redirect('/planificacion')->with('succes', 'Datos registrados con exito.');
	}

    public function EditMetaFisica(Request $request)
    {
        $data = $request->proyectos;
        $metas = MetasFisicas::find($data["id"]);

        $metas->cod_ente = $data["cod_ente"];
        $metas->denominacion_en = $data["denominacion_en"];
        $metas->organ = $data["organ"];
        $metas->cod_new_stage = $data["cod_new_stage"];
        $metas->anio_start =$data["anio_start"];
        $metas->anio_end = $data["anio_end"];   
        $metas->proyecto = $data["proyecto"];
        $metas->save();
        
        foreach ($data["unidades"] as $unidad ) {
            

            $unidades = UnidadMedida::find($unidad["id"]);
            $unidades->name =  $unidad["name"];
            $unidades->approved_amount = $unidad["approved_amount"];
            $unidades->modified_amount =  $unidad["modified_amount"];
            $unidades->programmed_amount = $unidad["programmed_amount"];
            $unidades->amount_executed = $unidad["amount_executed"];
            $unidades->executed_accumulated = $unidad["executed_accumulated"];
            $unidades->programmed_accumulated = $unidad["programmed_accumulated"];     
            $unidades->save();  
        }
            
        return response()->json('Datos actualizados con exito!', 200);
    }

    public function eliminarMetafisica($id){

        MetasFisicas::destroy($id);

        return response()->json('Proyecto eliminado con exito!', 200);
    }

    public function getListsearch(Request $request) {

        try {

            $skip = $request->input('start') * $request->input('take');

            $filters = json_decode($request->input('filters'), true);


            $datos = MetasFisicas::with('Unidades');


            if ( $filters['name'] !== '') { 

                $datos->where('cod_new_stage', 'LIKE', '%'.$filters['name'].'%');
             
            }

                 
            $datos = $datos->orderby('physical_goals.cod_new_stage', 'asc');

            $total = $datos->count();

            $list =  $datos->skip($skip)->take($request['take'])->get();

            $result = [

                'total' => $total,

                'list' =>  $list,

            ];

            return response()->json($result, 200);

        } catch (\Exception $e) {

            return response()->json('A ocurrido un error al obtener los datos!', 500);
        }

    }
}


