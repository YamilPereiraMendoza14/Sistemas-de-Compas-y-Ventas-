<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Redirect;
use DB;
class ProveedorController extends Controller
{
    //
    public function index(Request $request){
        if($request){
            $sql=trim($request->get('buscaTexto'));
            $proveedor=DB::table('proveedores')
           
            ->where('nombre','LIKE','%'.$sql.'%')
            ->orwhere('num_documento','LIKE','%'.$sql.'%')
            ->orderBy('id','desc')
            ->paginate(10);


            return view('proveedor.index',["proveedor"=>$proveedor,"buscarTexto"=>$sql]);
            
        }
    }
    public function store(Request $request){
        $proveedor=new Proveedor();          
        $proveedor->nombre=$request->nombre;
        $proveedor->tipo_documento=$request->tipo_documento;
        $proveedor->num_documento= $request->num_documento;
        $proveedor->direccion= $request->direccion;
        $proveedor->telefeno=$request->telefeno;
        $proveedor->email=$request->email;              
        $proveedor->save();
        return Redirect::to("proveedor");
    }
    public function update(Request $request){
        $proveedor=Proveedor::findOrFail($request->id_proveedor);
        $proveedor->nombre=$request->nombre;
        $proveedor->tipo_documento=$request->tipo_documento;
        $proveedor->num_documento= $request->num_documento;
        $proveedor->direccion= $request->direccion;
        $proveedor->telefeno=$request->telefeno;
        $proveedor->email=$request->email;       
        $proveedor->save();
        return Redirect::to("proveedor");
    }
    
}
