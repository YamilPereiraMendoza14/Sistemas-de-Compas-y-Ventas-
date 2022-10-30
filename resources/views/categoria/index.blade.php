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

                <h2>Listado de Categorías</h2><br/>
                
                <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                    <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar Categoría
                </button>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        {!!Form::open(array('url'=>'categoria','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
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
                            
                            <th>Categoría</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Cambiar Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorias as $cate)
                        <tr>
                            
                            <td>{{$cate->nombre}}</td>
                            <td>{{$cate->descripcion}}</td>
                            <td>
                                @if($cate->condicion =="1") 
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
                                <button type="button" class="btn btn-info btn-md" data-id_categoria="{{$cate->id}}" data-nombre="{{$cate->nombre}}" data-descripcion="{{$cate->descripcion}}" data-toggle="modal" data-target="#abrirmodalEditar">

                                    <i class="fa fa-edit fa-2x"></i> Editar
                                </button> &nbsp;
                            </td>

                            <td>

                                
                                @if($cate->condicion) 
                                    <button type="button" data-id_categoria="{{$cate->id}}" class="btn btn-danger btn-md" data-toggle="modal" data-target="#abrirmodalEstado">
                                
                                        <i class="fa fa-check fa-2x"></i> Desactivar
                                    </button>
                                @else
                                    <button type="button" data-id_categoria="{{$cate->id}}" class="btn btn-success btn-md" data-toggle="modal" data-target="#abrirmodalEstado">
                            
                                        <i class="fa fa-check fa-2x"></i> Activar
                                    </button>
                                @endif
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$categorias->render()}}
                
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar/actualizar-->
    <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar categoría</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>                
                <div class="modal-body"> 
                                       
                    <form action="{{route('categoria.store')}}" method="post" class="form-horizontal">
                        {{csrf_field()}}
                        @include('categoria.form')
                    </form>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="abrirmodalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Actualizar categoría</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>                
                <div class="modal-body"> 
                                       
                    <form action="{{route('categoria.update','test')}}" method="post" class="form-horizontal">
                        @method('PATCH')
                        @csrf
                        <input type="hidden" id="id_categoria" name="id_categoria">
                        @include('categoria.form')
                    </form>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="abrirmodalEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cambiar Estado Categoría</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>                
                <div class="modal-body"> 
                                       
                    <form action="{{route('categoria.destroy','test')}}" method="post" class="form-horizontal">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" id="id_categoria" name="id_categoria">
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