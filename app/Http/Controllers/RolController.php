<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;
use DB;
class RolController extends Controller
{
    public function index(Request $request){
        $rol=trim($request->get('buscaTexto'));
        $roles=DB::table('roles')->where('nombre','LIKE','%'.$rol.'%')->orderBy('id','desc')->paginate(3);
        return view('rol.index',["roles"=>$roles,"buscarTexto"=>$rol]);
    }
 
}
