@extends('layout')
@section('content')
@if(session()->has('message'))
    {{session()->get('message')}}
@endif

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{route('action.update', $action->id)}}" method="POST" class="container mt-4">
@csrf
@method('PUT')
    <legend>Editar Ação</legend>
    <div class="mb-3">
        <label for="disableTextInput" class="form-label">Nome</label>
        <input type="text" id="disableTextInput" name="title" class="form-control" value="{{$action->title}}">
    </div>
     <div class="mb-3">
        <label for="disableTextInput" class="form-label">Descrição</label>
        <input type="text" id="disableTextInput" name="description" class="form-control" value="{{$action->description}}">
    </div>
    <div class="mb-3">
        <label for="disableTextInput" class="form-label">ID categoria</label>
        <input type="text" id="disableTextInput" name="category_id" class="form-control" value="{{$action->category_id}}">
    </div>
     <div class="mb-3">
        <label for="disableTextInput" class="form-label">Pontos</label>
        <input type="text" id="disableTextInput" name="points" class="form-control" value="{{$action->points}}">
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
   
    </form>
    @endsection