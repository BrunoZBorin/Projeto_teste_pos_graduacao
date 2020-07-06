@extends('layouts.app')
@section('content')
<div class="container">
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Cadastro de Estudos</h1>
    <form action="{{route('studies.store')}}" class="mt-3" method="post">
        @include('studies._partial.form')
    </form>
</div>
@endsection