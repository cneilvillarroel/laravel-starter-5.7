@extends('layouts.main')

@section('title', 'Mi primera app con Laravel')
@section('description', 'Así yo puedo agregar la descripción')

@section('content')     
<h1 class="mb-5">Lista de usuarios <a href="{{ route( 'editar.usuario') }}" class="btn btn-primary">Agregar usuario</a></h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Creado el</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($users as $user )
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>
                        <a href="{{ route( 'editar.usuario', $user->id ) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route( 'eliminar.usuario', $user->id ) }}" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tr>
    </tbody>
</table>

@endsection