<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Redirect;
use DB;
class ClienteController extends Controller
{
    //
    public function index(Request $request){
        if($request){
            $sql=trim($request->get('buscarTexto'));
            $clientes=DB::table('clientes')->where('nombre','LIKE','%'.$sql.'%')->orwhere('num_documento','LIKE','%'.$sql.'%')->orderBy('id','desc')->paginate(10);
            return view('cliente.index',["clientes"=>$clientes,"buscarTexto"=>$sql]);
            
            
        }
    }
    public function store(Request $request){
        $clientes=new Cliente();
        $clientes->nombre=$request->nombre;
        $clientes->tipo_documento=$request->tipo_documento;
        $clientes->num_documento= $request->num_documento;
        $clientes->direccion= $request->direccion;
        $clientes->telefeno=$request->telefeno;
        $clientes->email=$request->email;              
        $clientes->save();
        return Redirect::to("cliente");

    }
    public function update(Request $request){
        $clientes=Cliente::findOrFail($request->id_cliente);
        $clientes->nombre=$request->nombre;
        $clientes->tipo_documento=$request->tipo_documento;
        $clientes->num_documento= $request->num_documento;
        $clientes->direccion= $request->direccion;
        $clientes->telefeno=$request->telefeno;
        $clientes->email=$request->email;              
        $clientes->save();
        return Redirect::to("cliente");
    }

}
