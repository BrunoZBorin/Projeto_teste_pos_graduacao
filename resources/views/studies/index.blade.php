@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Listagem de Estudos</h1>
        <div class="row justify-content-between">
        <a href="{{route('studies.create')}}" class="btn btn-info">Cadastrar</a>
        <a href="{{route('studies.list')}}" class="btn btn-info mr-6">Listar Situação</a>
        </div>
        <table class="table">
            <thead> 
                <tr>
                    <th>Id</th>
                    <th>Descrição</th>
                    <th>Área</th>
                    <th>Data inicial</th>
                    <th>Data final</th>
                    <th>Situação</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($studies as $study)
                <tr>
                    <td>{{$study->id}}</td>
                    <td>{{$study->description}}</td>
                    <td>{{$study->area->description}}</td>
                    <td>{{$study->date_init}}</td>
                    <td>{{$study->date_finish}}</td>
                    <td>{{$study->status}}</td>
                    <td>
                    <div class="row">
                    <a href="{{ route('studies.edit', ['study' => $study->id]) }}" class="btn btn-info">Editar</a>
                        <form action="{{route('studies.destroy', ['study'=>$study->id])}}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
@endsection