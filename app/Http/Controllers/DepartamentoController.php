<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Archivo;
use App\Carpeta;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dpto)
    {
        
        switch ($dpto) {
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

        $archivos = Archivo::where('carpeta','=',$dpto)
                                    ->where('parent',null)
                                    ->get();

        $carpetas = Carpeta::where('carpeta',$dpto)->get();

        return view('pages.departamentos.show' , compact('archivos','dpto','dptoNombre','carpetas'));
    }


    public function archivos($dpto , $slug)
    {
        
        switch ($dpto) {
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

        $archivos = Archivo::where('parent', $slug)
                                    ->get();

        $carpetas = Carpeta::where('parent',$slug)->get();

        $slug = str_replace('-', ' ', $slug);

        return view('pages.departamentos.archivos' , compact('archivos','archivos','dpto','dptoNombre','carpetas','slug'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function asignar($id , $slug)
    {
        $archivo = Archivo::findOrFail($id);
        $archivo->parent = $slug;
        $archivo->save();
        $slug = title_case(str_replace('-', ' ', $slug));

        return redirect()->back()->with('status','Archivo Asignado a la carpeta'.$slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
