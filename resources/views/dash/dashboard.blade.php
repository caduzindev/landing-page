@extends('layouts.app')

@section('content')
<div class="row mt-5">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-header card-item-header">
        <i class="fas fa-user-friends"></i>
      </div>
      <div class="card-body card-item-body">
        <h5 class="card-title">Depoimentos</h5>
        <p class="card-text">Aqui e onde se cria, exclui e edita os depoimentos do site</p>
        <a href="/depositions" class="btn btn-light">Acessar</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-header card-item-header">
        <i class="fas fa-sliders-h"></i>
      </div>
      <div class="card-body card-item-body">
        <h5 class="card-title">Carousel</h5>
        <p class="card-text">Aqui e onde se adiciona e exclui images do carousel</p>
        <a href="/caroulsels" class="btn btn-light">Acessar</a>
      </div>
    </div>
  </div>
</div>
@endsection