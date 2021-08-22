@extends('layouts.app')

@section('content')
<figure class="text-center">
    <blockquote class="blockquote">
        <h1 class="mb-2 mt-2">Caroulsel</h1>
    </blockquote>
</figure>
<table class="table caption-top">
    <caption>O caroulsel so irá aparecer no site, se uma imagem for ativada(o fundo do item estará cinza caso ativo)</caption>
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Imagem</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($caroulsels as $caroulsel)
            <tr data-status="{{$caroulsel->status}}">
                <th scope="row">{{$caroulsel->id}}</th>
                <td scope="row">
                    <img src="{{$caroulsel->photo_url}}" style="height:200px" alt="...">
                </td>
                <td scope="row">
                    <a href="/caroulsel/delete/{{$caroulsel->id}}" class="btn btn-danger">
                        <i class="far fa-trash-alt"></i>
                    </a>
                    <button class="btn btn-dark text-white first-button" data-id="{{$caroulsel->id}}" data-bs-toggle="tooltip" data-bs-placement="right" title="Ativa a imagem\irá aparecer primeiro no caroulsel">Active</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<a href="/caroulsel/add" class="btn btn-success fixed-bottom btn-lg ms-2 mb-2 d-flex justify-content-center align-items-center" style="width:50px;height:50px">
    <i class="far fa-plus-square" style="font-size:1.8rem;"></i>
</a>
@endsection