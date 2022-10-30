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

                <h2>Listado de Productos</h2><br/>
                
                <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                    <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar Producto
                </button>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        {!!Form::open(array('url'=>'producto','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                        <div class="input-group">
                            <select class="form-control col-md-3">
                                <option value="nombre">prodgoría</option>
                                <option value="descripcion">Descripción</option>
                            </select>
                            <input type="text" class="form-control" name="buscarTexto" value="{{$buscarTexto}}" placeholder="Buscar texto">
                            <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr class="bg-primary">
                            
                            <th>Categoria</th>
                            <th>Producto</th>
                            <th>Codigo</th>
                            <th>Precio Venta (USD$)</th>
                            <th>Stock</th>
                            <th>Imagen</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Cambiar Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $prod)
                        <tr>
                            
                            <td>{{$prod->categoria}}</td>
                            <td>{{$prod->nombre}}</td>
                            <td>{{$prod->codigo}}</td>
                            <td>{{$prod->precio_venta}}</td>
                            <td>{{$prod->stock}}</td>
                            <td>
                                <img src="{{asset('storage/img/producto/'.$prod->imagen)}}" id="imagen1" class="img-responsive" width="100px" height="100px" >
                            </td>
                            <td>
                                @if($prod->condicion =="1") 
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
                                <button type="button" class="btn btn-info btn-md" data-id_producto="{{$prod->id}}" data-id_categoria="{{$prod->idcategoria}}" data-codigo="{{$prod->codigo}}"  data-stock="{{$prod->stock}}" data-nombre="{{$prod->nombre}}" data-precio_venta="{{$prod->precio_venta}}" data-toggle="modal" data-target="#abrirEditarProducto">

                                    <i class="fa fa-edit fa-2x"></i> Editar
                                </button> &nbsp;
                            </td>

                            <td>

                                
                                @if($prod->condicion) 
                                    <button type="button" data-id_producto="{{$prod->id}}" class="btn btn-danger btn-md" data-toggle="modal" data-target="#abrirEstadoProducto">
                                
                                        <i class="fa fa-check fa-2x"></i> Desactivar
                                    </button>
                                @else
                                    <button type="button" data-id_producto="{{$prod->id}}" class="btn btn-success btn-md" data-toggle="modal" data-target="#abrirEstadoProducto">
                            
                                        <i class="fa fa-check fa-2x"></i> Activar
                                    </button>
                                @endif
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$productos->render()}}
                
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar/actualizar-->
    <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Productos</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>                
                <div class="modal-body"> 
                                       
                    <form action="{{route('producto.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @include('producto.form')
                    </form>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="abrirEditarProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Actualizar Productos</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>                
                <div class="modal-body"> 
                                       
                    <form action="{{ route('producto.update','test') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        
                        <input type="hidden" id="id_producto" name="id_producto">
                        @include('producto.form')
                    </form>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="abrirEstadoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cambiar Estado Productos</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>                
                <div class="modal-body"> 
                                       
                    <form action="{{route('producto.destroy','test')}}" method="post" class="form-horizontal">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" id="id_producto" name="id_producto">
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