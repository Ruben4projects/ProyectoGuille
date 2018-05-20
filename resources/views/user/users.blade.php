
@extends('layouts.app')


@section('content')
@include('user.bar')
    <!-- Styles -->
<div class="container">
    <div class="row col-md-8 col-md-offset-1 custyle">
    <table class="table table-striped custab">
    <thead>
  
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Nombre de usuario</th>
            <th class="text-center">Accion</th>
        </tr>
    </thead>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->surname}}</td>
                <td>{{$user->nick}}</td>
                <td class="text-center"><a href="{{route('deleteUser', ['idUser' => $user->id])}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
            </tr>
           @endforeach
    </table>
         {{$users->links()}}

    </div>

</div>

@endsection