   
    
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="codigo">Nombre</label>
        <div class="col-md-9">
            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese el nombre" required>
            
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="nombre">Direccion</label>
        <div class="col-md-9">
            <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Ingrese la Direccion" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="stock">Tipo de Documento</label>
        <div class="col-md-9">
            <select class="form-control" id="tipo_documento" name="tipo_documento">
                <option value="CEDULA">CEDULA</option>
                <option value="PASSPORTE">PASSPORTE</option>
            </select>
            
        </div>
    </div>

     <div class="form-group row">
        <label class="col-md-3 form-control-label" for="nombre">Numero Documento</label>
        <div class="col-md-9">
            <input type="text" id="num_documento" name="num_documento" class="form-control" placeholder="Ingrese la Numero " required>
        </div>
    </div>

   
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="nombre">Telefeno</label>
        <div class="col-md-9">
            <input type="number" id="telefono" name="telefono" class="form-control" placeholder="Ingrese la Telefeno" required>
        </div>
    </div> 
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="nombre">Email</label>
        <div class="col-md-9">
            <input type="email" id="email" name="email" class="form-control" placeholder="Ingrese la Email" required>
        </div>
    </div>
    <div class="form-group row">
            <label class="col-md-3 form-control-label" for="rol">Rol</label>
            
            <div class="col-md-9">
            
                <select class="form-control" name="idrol" id="idrol" required>
                                                
                <option value="0" disabled>Seleccione</option>
                
                @foreach($roles as $rol)
                  
                   <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                        
                @endforeach

                </select>
            
            </div>
                                       
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="nombre">Usuario</label>
        <div class="col-md-9">
            <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Ingrese la Usuario" required>
        </div>
    </div> 
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="nombre">Password</label>
        <div class="col-md-9">
            <input type="password" id="password" name="password" class="form-control" placeholder="Ingrese la Password" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="nombre">Imagen</label>
        <div class="col-md-9">
            <input type="file" id="imagen" name="imagen" class="form-control">
        </div>
    </div> 
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
        
    </div>