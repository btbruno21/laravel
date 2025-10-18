@extends('layout')
@section('content')
@if(session()->has('message'))
    {{session()->get('message')}}
@endif
<form action="{{route('action.destroy', $action->id)}}" method="POST" class="container mt-4">
@csrf
@method('DELETE')
    <legend>Mostrar Action</legend>
    <div class="mb-3">
        <label for="disableTextInput" class="form-label">Nome</label>
        <input type="text" id="disableTextInput" name="name" class="form-control" placeholder="{{$action->title}}">
    </div>
     <div class="mb-3">
        <label for="disableTextInput" class="form-label">Descrição</label>
        <input type="text" id="disableTextInput" name="descriptions" class="form-control" placeholder="{{$action->descriptions}}">
    </div>
     <div class="mb-3">
        <label for="disableTextInput" class="form-label">ID categoria</label>
        <input type="text" id="disableTextInput" name="category_id" class="form-control" placeholder="{{$action->category_id}}">
    </div>
     <div class="mb-3">
        <label for="disableTextInput" class="form-label">Pontos</label>
        <input type="text" id="disableTextInput" name="points" class="form-control" placeholder="{{$action->points}}">
    </div>
    <button type="submit" class="btn btn-danger">Excluir</button>
   
    </form>
    @endsection