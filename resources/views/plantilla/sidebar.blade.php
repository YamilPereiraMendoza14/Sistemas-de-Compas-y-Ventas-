<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="#"><i class="icon-speedometer"></i> Dashbord</a>
            </li>
            <li class="nav-title">
                Menú
            </li>

            
            <li class="nav-item">
                <a class="nav-link" href="{{ url('categoria') }}" onclick="event.preventDefault();document.getElementById('categoria-form').submit();"><i class="fa fa-list"></i> Categorías</a>
                <form id="categoria-form" action="{{ url('categoria') }}" style="display:none;">{{csrf_field()}}</form>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ url('producto')}}" onclick="event.preventDefault();document.getElementById('producto-form').submit();"><i class="fa fa-tasks"></i> Productos</a>
                <form id="producto-form" action="{{ url('producto') }}" style="display:none;">{{csrf_field()}}</form>
            </li>
                
    
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i> Compras</a>
            </li>

            <li class="nav-item">               
                <a class="nav-link" href="{{ url('proveedor')}}" onclick="event.preventDefault();document.getElementById('proveedor-form').submit();"><i class="fa fa-tasks"></i> Proveedores</a>
                <form id="proveedor-form" action="{{ url('proveedor') }}" style="display:none;">{{csrf_field()}}</form>
            </li>
                
            
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-suitcase"></i> Ventas</a>
            </li>

            <li class="nav-item">
               
                <a class="nav-link" href="{{ url('cliente')}}" onclick="event.preventDefault();document.getElementById('cliente-form').submit();"><i class="fa fa-users"></i> Clientes</a>
                <form id="clienteform" action="{{ url('cliente') }}" style="display:none;">{{csrf_field()}}</form>
            </li>
                
            
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-user"></i> Usuarios</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-list"></i> Roles</a>
            </li>
                
            
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
