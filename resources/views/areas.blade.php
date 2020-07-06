@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Listagem de Áreas</h1>
        <a href="/areas/create">
            <button class="btn btn-primary">Cadastrar</button>
        </a>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Cor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @Foreach($areas as $area)
                <tr>
                    <td>{{$area->description}}</td>
                    <td>{{$area->color}}</td>
                    <td>
                        <button class="btn btn-primary">Editar</button>
                        <button class="btn btn-danger">Excluir</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
@endsection