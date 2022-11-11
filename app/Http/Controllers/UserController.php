<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;
class UserController extends Controller
{
    public function index(Request $request){
        if($request){
            $sql=trim($request->get('buscarTexto'));
            $usuario=DB::table('users')->join('roles','users.idrol','=','roles.id')
            ->select('users.id','users.nombre','users.tipo_documento','users.num_documento','users.direccion','users.telefono','users.email','users.usuario','users.password','users.condicion','users.idrol','users.imagen','roles.nombre as rol'
            )
            ->where('users.nombre','LIKE','%'.$sql.'%')
            ->orwhere('users.num_documento','LIKE','%'.$sql.'%')
            ->orderBy('users.id','desc')
            ->paginate(10);
            $roles=DB::table('roles')
            ->select('id','nombre','descripcion')
            ->where('condicion','=','1')->get();
            return view('user.index',['usuarios'=>$usuario,'roles'=>$roles,'buscarTexto'=>$sql]);
        }
    }
    public function store(Request $request){
        $users=new User();        
        $users->nombre=$request->nombre;
        $users->tipo_documento=$request->tipo_documento;
        $users->num_documento=$request->num_documento;
        $users->direccion=$request->direccion;
        $users->telefono=$request->telefono;           
        $users->email=$request->email;
        $users->usuario=$request->usuario;
        $users->password=bcrypt($request->password);
        $users->condicion='1';
        $users->idrol=$request->idrol;
        if($request->hasFile('imagen')){
            $filenamewithExt=$request->file('imagen')->getClientOriginalName();
            $filename=pathinfo($filenamewithExt,PATHINFO_FILENAME);
            $extension=$request->file('imagen')->guessClientExtension();
            $fileNameToStore=time().'.'.$extension;
            $path=$request->file('imagen')->storeAs('public/img/usuario',$fileNameToStore);
        }else{
            $fileNameToStore="noimagen.jpg";
        }
        $users->imagen=$fileNameToStore;
        $users->save();
        return Redirect::to("user");
    }
    public function update(Request $request){
        $users=User::findOrFail($request->id_usuario);        
        $users->nombre=$request->nombre;
        $users->tipo_documento=$request->tipo_documento;
        $users->num_documento=$request->num_documento;
        $users->direccion=$request->direccion;
        $users->telefono=$request->telefono;           
        $users->email=$request->email;
        $users->usuario=$request->usuario;
        $users->password=bcrypt($request->password);
        $users->condicion='1';
        $users->idrol=$request->idrol;

        if($request->hasFile('imagen')){
            if($users->imagen != 'noimagen.jpg'){
                Storage::delete('public/img/usuario/'.$users->imagen);
            }
            $filenamewithExt=$request->file('imagen')->getClientOriginalName();
            $filename=pathinfo($filenamewithExt,PATHINFO_FILENAME);
            $extension=$request->file('imagen')->guessClientExtension();
            $fileNameToStore=time().'.'.$extension;
            $path=$request->file('imagen')->storeAs('public/img/usuario',$fileNameToStore);
        }else{
            $fileNameToStore="noimagen.jpg";
        }
        $users->imagen=$fileNameToStore;
        $users->save();
        return Redirect::to("user");
    }
    public function destroy(Request $request){
        $users=User::findOrFail($request->id_usuario); 
        if($users->condicion=="1"){
            $users->condicion="0";
            $users->save();
            return Redirect::to("user");
        }
        else{
            $users->condicion="1";
            $users->save();
            return Redirect::to("user");
        }
    }
}
