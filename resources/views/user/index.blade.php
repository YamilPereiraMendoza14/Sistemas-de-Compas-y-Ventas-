@extends('principal')
@section('contenido')
<main class="main">
            <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">BACKEND - SISTEMA DE COMPRAS - VENTAS</a></li>
    </ol>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">

                <h2>Listado de Usuarios</h2><br/>
                
                <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                    <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar Usuario
                </button>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        {!!Form::open(array('url'=>'user','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                        <div class="input-group">
                            <select class="form-control col-md-3">
                                <option value="nombre">Categoría</option>
                                <option value="descripcion">Descripción</option>
                            </select>
                            <input type="text" class="form-control" name="buscarTexto" value="{{$buscarTexto}}" placeholder="Buscar texto">
                            <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </  div>
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr class="bg-primary">
                            
                            <th>Nombre</th>
                            <th>Tipo Documento</th>
                            <th>Numero Documento</th>
                            <th>Direccion</th>
                            <th>Telefeno</th>
                            <th>Email</th>
                            <th>Usuario</th>
                            <th>Rol</th>
                            <th>Imagen</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $user)
                        <tr>
                            
                            <td>{{$user->nombre}}</td>
                            <td>{{$user->tipo_documento}}</td>
                            <td>{{$user->num_documento}}</td>
                            <td>{{$user->direccion}}</td>
                            <td>{{$user->telefono}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->usuario}}</td>
                            <td>{{$user->rol}}</td>
                            <td>
                                <img src="{{asset('storage/img/usuario/'.$user->imagen)}}" id="imagen1" class="img-responsive" width="100px" height="100px" >
                            </td>
                            <td>
                                @if($user->condicion =="1") 
                                    <button type="button" class="btn btn-success btn-md">
                                
                                        <i class="fa fa-check fa-2x"></i> Activo
                                    </button>
                                @else
                                    <button type="button" class="btn btn-danger btn-md">
                            
                                        <i class="fa fa-check fa-2x"></i> Desactivado
                                    </button>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-info btn-md" data-id_usuario="{{$user->id}}" data-nombre="{{$user->nombre}}" data-tipo_documento="{{$user->tipo_documento}}"  data-num_documento="{{$user->num_documento}}"
                                data-direccion="{{$user->direccion}}"
                                data-telefono="{{$user->telefono}}"
                                data-email="{{$user->email}}"
                                data-id_rol="{{$user->idrol}}"
                                data-usuario="{{$user->usuario}}"
                                data-imagen="{{$user->imagen}}"
                                data-toggle="modal" data-target="#abrirEditarUsuario">

                                    <i class="fa fa-edit fa-2x"></i> Editar
                                </button> &nbsp;
                            </td>
                            
                            <td>

                                
                                @if($user->condicion) 
                                    <button type="button" data-id_usuario="{{$user->id}}" class="btn btn-danger btn-md" data-toggle="modal" data-target="#abrirEstadoUsuario">
                                
                                        <i class="fa fa-check fa-2x"></i> Desactivar
                                    </button>
                                @else
                                    <button type="button" data-id_usuario="{{$user->id}}" class="btn btn-success btn-md" data-toggle="modal" data-target="#abrirEstadoUsuario">
                            
                                        <i class="fa fa-check fa-2x"></i> Activar
                                    </button>
                                @endif
                                
                            </td>

                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$usuarios->render()}}
                
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar/actualizar-->
    <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>                
                <div class="modal-body"> 
                                       
                    <form action="{{route('user.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @include('user.form')
                    </form>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="abrirEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Actualizar Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>                
                <div class="modal-body"> 
                                       
                    <form action="{{route('user.update','test')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <input type="hidden" id="id_usuario" name="id_usuario">
                        @include('user.form')
                    </form>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="abrirEstadoUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cambiar Estado Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>                
                <div class="modal-body"> 
                                       
                    <form action="{{route('user.destroy','test')}}" method="post" class="form-horizontal">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" id="id_usuario" name="id_usuario">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
                            
                        </div>
                    </form>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!--Fin del modal-->
</main>

@endsection