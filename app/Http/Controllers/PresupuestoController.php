<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class PresupuestoController extends Controller
{
    public function index() {

       return view('pages.planificacion.presupuesto');
   }
}
