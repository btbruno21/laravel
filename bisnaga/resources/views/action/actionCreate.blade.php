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
<form action="{{route('action.store')}}" method="POST" class="container mt-4">
@csrf

    <legend>Adicionar Action</legend>
    <div class="mb-3">
        <label for="disableTextInput" class="form-label">Titulo</label>
        <input type="text" id="disableTextInput" name="title" value="{{ old('title') }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="disableTextInput" class="form-label">Descrição</label>
        <input type="text" id="disableTextInput" name="descriptions"  value="{{ old('descriptions') }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="disableTextInput" class="form-label">ID de Categoria</label>
        <input type="text" id="disableTextInput" name="category_id" value="{{ old('category_id') }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="disableTextInput" class="form-label">Pontos</label>
        <input type="text" id="disableTextInput" name="points" value="{{ old('points') }}" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
   
    </form>
    @endsection