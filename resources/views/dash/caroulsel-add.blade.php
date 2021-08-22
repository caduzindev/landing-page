@extends('layouts.app')

@section('content')
<h1>Caroulsel-add</h1>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif
<form action="/caroulsel/store" method="post" enctype= multipart/form-data>
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Imagem</label>
        <input type="file" class="form-control" id="exampleCheck1" name="image">
        <div id="emailHelp" class="form-text">(jpeg,png,jpg)(resolução minima 1300x220)</div>
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection