<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema Compras-Ventas con Laravel y Vue Js- webtraining-it.com">
    <meta name="keyword" content="Sistema Compras-Ventas con Laravel y Vue Js">
    <title>Proyecto</title>
    <!-- Icons -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/simple-line-icons.min.css')}}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
<header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!--PONER LOGO-->
        <!--<a class="navbar-brand" href="#"></a>-->
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-3">
                <a class="nav-link" href="#">Dashbord</a>
            </li>
           
        </ul>
        <ul class="nav navbar-nav ml-auto">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="{{asset('img/avatars/6.jpg')}}" class="img-avatar" alt="admin@bootstrapm')}}aster.com">
                    <span class="d-md-down-none">{{Auth::user()->usuario}} </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Cuenta</strong>
                    </div>
                    <a class="dropdown-item" href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i> Cerrar sesi??n</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{csrf_field()}}
                    </form>
                </div>
            </li>
        </ul>
    </header>

    <div class="app-body">
        
        @if(Auth::check())
            @if(Auth::user()->idrol==1)
                @include('plantilla.sidebaradministrador')
            @elseif (Auth::user()->idrol==2)
                @include('plantilla.sidebarvendedor')
            @elseif (Auth::user()->idrol ==3)
                @include('plantilla.sidebarcomprador')
            @else
            @endif

        @endif
        <!-- Contenido Principal -->
        @yield('contenido')
        <!-- /Fin del contenido principal -->
    </div>   

    <footer class="app-footer">
        <span><a href="http://www.webtraining-it.com/">webtraining-it.com</a> &copy; 2019</span>
        <span class="ml-auto">Desarrollado por <a href="http://www.webtraining-it.com/">webtraining-it.com</a></span>
    </footer>

    <!-- Bootstrap and necessary plugins -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/pace.min.js')}}"></script>
    <!-- Plugins and scripts required by all views -->
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <!-- GenesisUI main scripts -->
    <script src="{{asset('js/template.js')}}"></script>
    <script>
    $('#abrirmodalEditar').on('show.bs.modal', function (event) {
        
        var button = $(event.relatedTarget) 
        var nombre_modal_editar = button.data('nombre')
        var descripcion_modal_editar = button.data('descripcion')
        var id_categoria = button.data('id_categoria')
        var modal = $(this)
        console.log(nombre_modal_editar);
        // modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body #nombre').val(nombre_modal_editar);
        modal.find('.modal-body #descripcion').val(descripcion_modal_editar);
        modal.find('.modal-body #id_categoria').val(id_categoria);
    })
    $('#abrirmodalEstado').on('show.bs.modal', function (event) {
        
        var button = $(event.relatedTarget) 
        var id_categoria = button.data('id_categoria')
        var modal = $(this)
   
        // modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body #id_categoria').val(id_categoria);
    })
    $('#abrirEditarProducto').on('show.bs.modal', function (event) {
        
        var button = $(event.relatedTarget) 
        var id_categoria = button.data('id_categoria')
        var nombre_modal_editar = button.data('nombre')
        var precio_venta_modal_editar = button.data('precio_venta')
        var codigo_modal_editar = button.data('codigo')
        var stock_venta_modal_editar = button.data('stock')
        var id_producto = button.data('id_producto')
        var modal = $(this)
        console.log(nombre_modal_editar);
        // modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body #id').val(id_categoria);
        modal.find('.modal-body #nombre').val(nombre_modal_editar);
        modal.find('.modal-body #precio_venta').val(precio_venta_modal_editar);        
        modal.find('.modal-body #codigo').val(codigo_modal_editar);
        modal.find('.modal-body #stock').val(stock_venta_modal_editar);
        modal.find('.modal-body #id_producto').val(id_producto);
    })
    $('#abrirEstadoProducto').on('show.bs.modal', function (event) {
        
        var button = $(event.relatedTarget) 
        var id_producto = button.data('id_producto')
        var modal = $(this)
   
        // modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body #id_producto').val(id_producto);
    })

    $('#abrirEditarProveedor').on('show.bs.modal', function (event) {
        
        var button = $(event.relatedTarget) 
        var id_proveedor = button.data('id_proveedor')
        var nombre_modal_editar = button.data('nombre')
        var tipo_documento_modal_editar = button.data('tipo_documento')
        var num_documento_modal_editar = button.data('num_documento')
        var direccion_venta_modal_editar = button.data('direccion')
        var telefeno = button.data('telefeno')
        var email = button.data('email')
        var modal = $(this)
        console.log(nombre_modal_editar);
        // modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body #id_proveedor').val(id_proveedor);
        modal.find('.modal-body #nombre').val(nombre_modal_editar);
        modal.find('.modal-body #tipo_documento').val(tipo_documento_modal_editar);        
        modal.find('.modal-body #num_documento').val(num_documento_modal_editar);
        modal.find('.modal-body #direccion').val(direccion_venta_modal_editar);
        modal.find('.modal-body #telefeno').val(telefeno);
        modal.find('.modal-body #email').val(email);
    })

    $('#abrirEditarCliente').on('show.bs.modal', function (event) {
        
        var button = $(event.relatedTarget) 
        var id_cliente = button.data('id_cliente')
        var nombre_modal_editar = button.data('nombre')
        var tipo_documento_modal_editar = button.data('tipo_documento')
        var num_documento_modal_editar = button.data('num_documento')
        var direccion_venta_modal_editar = button.data('direccion')
        var telefeno = button.data('telefeno')
        var email = button.data('email')
        var modal = $(this)
        console.log(nombre_modal_editar);
        // modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body #id_cliente').val(id_cliente);
        modal.find('.modal-body #nombre').val(nombre_modal_editar);
        modal.find('.modal-body #tipo_documento').val(tipo_documento_modal_editar);        
        modal.find('.modal-body #num_documento').val(num_documento_modal_editar);
        modal.find('.modal-body #direccion').val(direccion_venta_modal_editar);
        modal.find('.modal-body #telefeno').val(telefeno);
        modal.find('.modal-body #email').val(email);
    })
    $('#abrirEditarUsuario').on('show.bs.modal', function (event) {
        
        var button = $(event.relatedTarget) 
        var id_usuario = button.data('id_usuario')
        var nombre_modal_editar = button.data('nombre')
        var tipo_documento_modal_editar = button.data('tipo_documento')
        var num_documento_modal_editar = button.data('num_documento')
        var direccion_venta_modal_editar = button.data('direccion')
        var telefono = button.data('telefono')
        var email = button.data('email')
        var rol=button.data('id_rol')
        var usuario=button.data('usuario')
       
        var modal = $(this)
        console.log(nombre_modal_editar);
        // modal.find('.modal-title').text('New message to ' + recipient)
       
        modal.find('.modal-body #id_usuario').val(id_usuario);        
        modal.find('.modal-body #nombre').val(nombre_modal_editar);
        modal.find('.modal-body #tipo_documento').val(tipo_documento_modal_editar);        
        modal.find('.modal-body #num_documento').val(num_documento_modal_editar);
        modal.find('.modal-body #direccion').val(direccion_venta_modal_editar);
        modal.find('.modal-body #telefono').val(telefono);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #id_rol').val(rol);
        modal.find('.modal-body #usuario').val(usuario);
    })
    $('#abrirEstadoUsuario').on('show.bs.modal', function (event) {
        
        var button = $(event.relatedTarget) 
        var id_usuario = button.data('id_usuario')
        var modal = $(this)
   
        // modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body #id_usuario').val(id_usuario);
    })
</script>
</body>

</html>