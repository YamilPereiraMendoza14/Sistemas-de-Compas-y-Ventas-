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

                <h2>Listado de Clientes</h2><br/>
                
                <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                    <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar Cliente
                </button>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        {!!Form::open(array('url'=>'cliente','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
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
                            
                            <th>Cliente</th>
                            <th>Tipo Documento</th>
                            <th>Numero Documento</th>
                            <th>Direccion</th>
                            <th>Telefeno</th>
                            <th>Email</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cli)
                        <tr>
                            
                            <td>{{$cli->nombre}}</td>
                            <td>{{$cli->tipo_documento}}</td>
                            <td>{{$cli->num_documento}}</td>
                            <td>{{$cli->direccion}}</td>
                            <td>{{$cli->telefeno}}</td>
                            <td>{{$cli->email}}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-md" data-id_cliente="{{$cli->id}}" data-nombre="{{$cli->nombre}}" data-tipo_documento="{{$cli->tipo_documento}}"  data-num_documento="{{$cli->num_documento}}"
                                data-direccion="{{$cli->direccion}}"
                                data-telefeno="{{$cli->telefeno}}"
                                data-email="{{$cli->email}}"
                                data-toggle="modal" data-target="#abrirEditarCliente">

                                    <i class="fa fa-edit fa-2x"></i> Editar
                                </button> &nbsp;
                            </td>

                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$clientes->render()}}
                
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar/actualizar-->
    <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>                
                <div class="modal-body"> 
                                       
                    <form action="{{route('cliente.store')}}" method="post" class="form-horizontal">
                        {{csrf_field()}}
                        @include('proveedor.form')
                    </form>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="abrirEditarCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Actualizar Cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>                
                <div class="modal-body"> 
                                       
                    <form action="{{route('cliente.update','test')}}" method="post" class="form-horizontal">
                        @method('PATCH')
                        @csrf
                        <input type="hidden" id="id_cliente" name="id_cliente">
                        @include('cliente.form')
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