@extends('layout')
@section('content')
<table class="table table-dark table-striped-columns">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nome</th>
        <th scope="col">Descrição</th>
        <th scope="col">Pontos Necessários</th>
        <th scope="col">Editar</th>
        <th scope="col">Mostrar</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @foreach($reward as $rew)
      <tr>
        <th scope="row">{{ $rew->id }}</th>
        <td>{{ $rew->name }}</td>
        <td>{{ $rew->description  }}</td>
        <td>{{ $rew->require_points  }}</td>
        <td><a href="{{route('reward.edit', $rew->id)}}"><button type="button" class="btn btn-success">Editar</button></a></td>
        <td><a href="{{route('reward.show', $rew->id)}}"><button type="button" class="btn btn-success">Mostrar</button></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</table>
@endsection