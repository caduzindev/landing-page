@extends('layouts.app')

@section('content')
<figure class="text-center">
    <blockquote class="blockquote">
        <h1 class="mb-2 mt-2">Depoimentos</h1>
    </blockquote>
</figure>
<div class="row justify-content-center">
    @foreach($depositions as $deposition)
        <div class="card" style="width: 18rem;">
            <img src="{{$deposition->photo_url}}" class="img-thumbnail" style="width:100%;height:200px" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$deposition->name}}</h5>
                <p class="card-text card-text-item">{{$deposition->description}}</p>
            </div>
            <div class="d-flex justify-content-end gap-1">
                <a href="/depositions/delete/{{$deposition->id}}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                <a href="/depositions/show/{{$deposition->id}}" class="btn btn-warning"><i class="far fa-edit"></i></a>
            </div>
        </div>
    @endforeach
</div>
<a href="/depositions/add" class="btn btn-success fixed-bottom btn-lg ms-2 mb-2 d-flex justify-content-center align-items-center" style="width:50px;height:50px">
    <i class="far fa-plus-square" style="font-size:2rem"></i>
</a>
@endsection