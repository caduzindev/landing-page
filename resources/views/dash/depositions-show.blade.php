@extends('layouts.app')

@section('content')

<h1>Edit Depositions</h1>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif
<form action="/depositions/edit/{{$deposition->id}}" method="post" enctype= multipart/form-data>
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nome</label>
        <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$deposition->name}}">
        <div id="emailHelp" class="form-text">Nome da pessoa aqui</div>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descrição</label>
        <textarea name="description" id="" cols="30" rows="10" class="form-control" style="resize:none">{{$deposition->description}}</textarea>
        <div id="emailHelp" class="form-text">Escreva o depoimento</div>
    </div>
    <div class="mb-3">
        <img src="{{$deposition->photo_url}}" class="img-thumbnail" style="height:200px" alt="...">
        <input type="file" class="form-control" id="exampleCheck1" name="photo">
        <div id="emailHelp" class="form-text">(jpeg,png,jpg)</div>
  </div>
  <button type="submit" class="btn btn-primary">Editar</button>
</form>

@endsection