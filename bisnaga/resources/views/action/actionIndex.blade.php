@extends('layout')
@section('content')
<table class="table table-dark table-striped-columns">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Título</th>
      <th scope="col">Descrição</th>
      <th scope="col">Pontos</th>
      <th scope="col">Categoria</th>
      <th scope="col">Editar</th>
      <th scope="col">Mostrar</th>
    </tr>
  </thead>
  <tbody class="table-group-divider"> 
    @foreach($actions as $at)
    <tr>
      <th scope="row">{{ $at->id }}</th>
      <td>{{ $at->title }}</td>
      <td>{{ $at->descriptions  }}</td>
      <td>{{ $at->points  }}</td>
      <td>{{ $at->categories->name }}</td>
      <td><a href="{{--route('category.edit', $at->id)--}}"><button type="button" class="btn btn-success">Editar</button></a></td>
      <td><a href="{{--route('category.show', $at->id)--}}"><button type="button" class="btn btn-success">Mostrar</button></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</table>
@endsection