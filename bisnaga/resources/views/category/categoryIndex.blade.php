@extends('layout')
@section('content')
<table class="table table-dark table-striped-columns">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">Descrição</th>
      <th scope="col">Editar</th>
      <th scope="col">Mostrar</th>
    </tr>
  </thead>
  <tbody class="table-group-divider"> 
    @foreach($categories as $cat)
    <tr>
      <th scope="row">{{ $cat->id }}</th>
      <td>{{ $cat->name }}</td>
      <td>{{ $cat->description  }}</td>
      <td><a href="{{route('category.edit', $cat->id)}}"><button type="button" class="btn btn-success">Editar</button></a></td>
      <td><a href="{{route('category.show', $cat->id)}}"><button type="button" class="btn btn-success">Mostrar</button></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</table>
@endsection