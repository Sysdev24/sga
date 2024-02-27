@extends('adminlte::page')

@section('title', 'Usuario')

@section('content_header')
    <b><h1 class="m-0 text-dark">Registrar Usuarios</h1></b>
@stop

@section('content')

<div class="row form-group">

	<div class="col-md-6">
		<label for="descripcion">Nombre y Apellido</label>
		<input type="text" class="form-control" name="name" id="name"  required />
	</div>
	<br><br>
	<div class="col-md-6">
		<label for="descripcion">Email</label>
		<input type="email" class="form-control" name="email" id="email"  required />
	</div>
	<br><br>

	<div class="col-md-6">
		<div class="form-group col-md-12">
			<label for="descripcion">Cédula</label>
                	<input type="text"  class="form-control" name="cedula" id="cedula" maxlength="8" minlength="5" />
			<label for="descripcion">Usuario</label>
			<input type="text" class="form-control" name="usuario" id="usuario"  />
		</div>

        <div class="col-md-6">
            <label for="descripcion">Roles</label>
            <select class="form-control" id="role" name="role" required>
                <option value="" selected>Seleccione una opción</option>
                 @foreach ($roles as $role)
                    <option value="{{$role}}">{{$role}} </option>
                @endforeach
            </select>
        </div>
	</div>

    <div class="col-md-6">
		<label for="descripcion">Estatus del usuario</label>
        <select class="form-control" name="estatus" id="estatus" required>
            <option value="" selected>Seleccione una opción</option>
            <option value="5" selected> Activo</option>
            <option value="9" > Inactivo</option>
          </select>
	</div>


</div>
<div class="row form-group">
	<div class="col-md-6 text-left">
	  <a href="javascript:history.back()" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Atras </a>
   </div>
   <div class="col-md-1 text-right">
	<input type="submit" class="btn btn-primary btn-sm" value="Guardar">
 </div>
</div>
</form>

@stop
