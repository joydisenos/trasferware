<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Message;
use Illuminate\Http\UploadedFile;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $mensajes = \DB::select('SELECT messages.id, messages.created_at, title, sender_id, recipient_id, leido, body, users.name 
                                 FROM messages 
                                 INNER JOIN users on messages.sender_id = users.id
                                 WHERE messages.recipient_id = ?
                                 ORDER BY messages.created_at DESC',[Auth::id()]);
        return view('pages.mensajes.messages', compact('mensajes'));
    }

    public function sent()
    {   
        $mensajes = \DB::select('SELECT messages.id, messages.created_at, title, sender_id, recipient_id, leido, body, users.name 
                                 FROM messages 
                                 INNER JOIN users on messages.recipient_id = users.id
                                 WHERE messages.sender_id = ?
                                 ORDER BY messages.created_at DESC',[Auth::id()]);
        return view('pages.mensajes.sent', compact('mensajes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $users = User::where('id', '!=', Auth::id())->get();
        return view('pages.mensajes.crear', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = request()->validate([
            'title'        => 'max:200',
            'recipient_id' => 'required',
            'body'         => 'required'
        ], [
            'required'   => 'Hay campos vacios',           
            'max'        => 'El :attribute debe tener como maximo caracteres :max.',
        ]);

        $path = NULL;
        if(request()->file){
            request()->file->storeAs('uploads', request()->file->getClientOriginalName());
            $path = request()->file->getClientOriginalName();
        }

        $success = Message::create([
            'sender_id' => Auth::id(),
            'title' => $request->title ? $request->title : 'Sin titulo',
            'leido' => FALSE,
            'path_file' => $path,
            'recipient_id' => $request->recipient_id,
            'body' => $request->body
        ]);
        
        if($success) 
        {
            \Session::flash('send_success_message', "Mensaje enviado");
        }
        else 
        {
            \Session::flash('send_error_message', 'Ha ocurrido un error, mensaje no enviado');
        }

        return redirect()->route('mensaje');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function vreceived($id)
    {   
        $mensajes = \DB::select('SELECT messages.id, path_file, sender_id, recipient_id, leido, body, users.name 
                                 FROM messages 
                                 INNER JOIN users ON messages.sender_id = users.id
                                 WHERE messages.id = ?', [$id]);
        if(count($mensajes) > 0){
            $mensaje = $mensajes[0];
            if($mensaje->recipient_id == Auth::id()){
                $success = \DB::table('messages')
                    ->where('id', $mensaje->id)
                    ->update(array('leido' => 1));
                $nromensajes = Message::where('leido', '=', 0)->where('sender_id','=',Auth::id())->count();
                session(['nromensajes' => $nromensajes]);
                return view('pages.mensajes.leer', compact('mensaje'));
            }
            return view('errors.404');
        }
        return view('errors.404');
    }

    public function vsent($id)
    {   
        $mensajes = \DB::select('SELECT messages.id, path_file, sender_id, recipient_id, leido, body, users.name 
                                 FROM messages 
                                 INNER JOIN users ON messages.sender_id = users.id
                                 WHERE messages.id = ?', [$id]);
        if(count($mensajes) > 0){
            $mensaje = $mensajes[0];
            if($mensaje->sender_id == Auth::id()){
                $success = \DB::table('messages')
                    ->where('id', $mensaje->id)
                    ->update(array('leido' => 1));
                $nromensajes = Message::where('leido', '=', 0)->where('recipient_id','=',Auth::id())->count();
                session(['nromensajes' => $nromensajes]);
                return view('pages.mensajes.leer', compact('mensaje'));
            }
            return view('errors.404');
        }
        return view('errors.404');
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
        $success = \DB::table('messages')->where('id', '=', $id)->delete();
        $nromensajes = Message::where('leido', '=', 0)->where('recipient_id','=',Auth::id())->count();
        session(['nromensajes' => $nromensajes]);
        if($success) 
        {
            \Session::flash('delete_success_message', "Mensaje borrado");
        }
        else 
        {
            \Session::flash('delete_error_message', 'Ha ocurrido un error, mensaje no enviado');
        }

        return response('success', 200)
                  ->header('Content-Type', 'text/plain');
    }
}
