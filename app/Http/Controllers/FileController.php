<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Archivo;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archivos = Auth::user()->archivos;

        return view('pages.archivos.index',compact('archivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $archivos = Auth::user()->archivos;

        return view('pages.archivos.subir', compact('archivos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carpeta = $request->carpeta;
        $user = Auth::user()->id;
        $path = public_path() .'/storage/'. $carpeta;   
        $pathCorto = '/storage/'. $carpeta;   
        $files = $request->file('file');
        $rol = Auth::user()->roles->pluck('name')->first();

                switch ($rol) {
                    case 'Presidencia.':
                        $carpeta = 'pre';
                        break;

                    case 'Gestion Administrativa':
                        $carpeta = 'oga';
                        break;

                    case 'planificacion':
                        $carpeta = 'opp';
                        break;

                    case 'Direccion de Proyecto':
                        $carpeta = 'pty';
                        break;

                    case 'Obras':
                        $carpeta = 'ose';
                        break;
                    
                    default:
                        $carpeta = 'na';
                        break;
                }

            foreach($files as $file){
                $fileName = $file->getClientOriginalName();
                $file->move($path, $fileName);

                $archivo = new Archivo();
                $archivo->user_id = $user;
                $archivo->ruta = $pathCorto. '/' . $fileName;
                $archivo->carpeta = $carpeta;
                $archivo->parent = null;
                $archivo->save();
            }
    }

    public function descargar($file)
    {

      $pathtoFile = public_path(). $file;

      return response()->download($pathtoFile);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $archivo = Archivo::findOrFail($id);
        $archivo->delete();

        return redirect()->back()->with('status','archivo eliminado');
    }
}
