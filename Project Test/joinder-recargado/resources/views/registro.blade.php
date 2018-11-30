@extends('layouts.app')

@section('content')
    
<form action="" method="post">
    <legend>Registro</legend>
    <fieldset>
        <label for="nombre">Nombre:</label>
        <input class="form-control" type="text" name="nombre"><br>

        <label for="apellido_paterno">Apellido Paterno:</label>
        <input class="form-control" type="text" name="apellido_paterno"><br>

        <label for="apellido_materno">Apellido Materno:</label>
        <input class="form-control" type="text" name="apellido_materno"><br>

        <label for="telefono">Telefono:</label>
        <input class="form-control" type="text" name="telefono"><br>

        <label for="email">Correo:</label>
        <input class="form-control" type="text" name="email"><br>

        <label for="password">Contraseña:</label>
        <input class="form-control" type="text" name="password"><br>

        <input type="radio" name="genero" value="Masculino" checked>Masculino
        <input type="radio" name="genero" value="Femenino">Femenino

        <br>

        <label for="tipo">Tipo</label>
        <select class="form-control" name="tipo">
            <option value="Miembro">Miembro</option>
            <option value="Anfitrion">Anfitrion</option>
        </select>
    </fieldset>
</form>
@endsection