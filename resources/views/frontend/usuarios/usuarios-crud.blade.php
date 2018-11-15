@extends('layouts.main')

@section('title', 'Mi primera app con Laravel')
@section('description', 'Así yo puedo agregar la descripción')

@section('content')     
    <h1>CRUD de usuarios</h1>

    <form method="POST" action="{{ route('actualizar.usuario') }}">
        
        @csrf

        @if($user->id)
            <input type="hidden" name="id" value="{{$user->id}}">            
        @endif

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}">            
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" value="{{$user->email}}">
        </div>

        @if(!$user->id)

            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" name="password">
            </div>

            <div class="form-group">
                <label>Confirmar Pass</label>
                <input type="text" class="form-control" name="password_confirmation">
            </div>
        
        @endif

        <!-- Muestra errores de validacion del formulario -->

        @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <ul>
                    @foreach ($errors->all() as $error)                        
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

@endsection