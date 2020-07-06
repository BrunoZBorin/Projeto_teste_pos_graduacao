@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Listagem de Áreas</h1>
        <a href="/areas/create">
            <button class="btn btn-primary">Cadastrar</button>
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descrição</th>
                    <th>Cor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @Foreach($areas as $area)
                <tr>
                    <td>{{$area->id}}</td>
                    <td>{{$area->description}}</td>
                    <td>{{$area->color}}</td>
                    <td>
                    <div class="row">
                        <a href="{{route('areas.edit',['area'=>$area->id])}}" class="btn btn-primary">Editar</a>
                        <form action="{{route('areas.destroy',['area'=>$area->id])}}" method="post"
                            onsubmit="return confirm('Está certo da exclusão?')">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <button class="btn btn-danger">Excluir</button>
                        </form>
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            {{$areas->links()}}
            </div>
@endsection