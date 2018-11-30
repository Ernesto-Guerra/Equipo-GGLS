@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">LOGIN ADMIN</h1>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{route('login')}}">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                <label for="email">Email</label>
                                <input class="form-control" 
                                    type="email" 
                                    placeholder="Ingresa tu email"
                                    name="email" 
                                    value={{old('email')}} 
                                    >
                                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                                    <label for="password">Password</label>
                                    <input class="form-control" 
                                        type="password" 
                                        name="password" 
                                        placeholder="Ingresa tu password">
                                        {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                </div>

                                <button class="btn btn-primary btn-block">Iniciar Sesion</button>                                
                                <center>o</center>
                                <a href="/registro" class="btn btn-success btn-block">CREAR CUENTA</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        
@endsection