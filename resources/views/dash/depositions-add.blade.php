@extends('layouts.app')

@section('content')

<h1>Add Depositions</h1>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif
<form action="/depositions/store" method="post" enctype= multipart/form-data>
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nome</label>
        <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Nome da pessoa aqui</div>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descrição</label>
        <textarea name="description" id="" cols="30" rows="10" class="form-control" style="resize:none"></textarea>
        <div id="emailHelp" class="form-text">Escreva o depoimento</div>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Foto</label>
        <input type="file" class="form-control" id="exampleCheck1" name="photo">
        <div id="emailHelp" class="form-text">(jpeg,png,jpg)(resolução minima 500x500)</div>
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection