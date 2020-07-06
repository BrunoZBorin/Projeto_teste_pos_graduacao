    @extends('layouts.app')
    @section('content')
    <div class="container">
        <h1>Listagem de Status</h1>
        <div class="row justify-content-between">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Status "finalizado"</div>
                <div class="card-body">
                    <h5 class="card-title">{{$finalizado[0]["numero"]}}</h5>
                </div>
            </div>
            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                <div class="card-header">Status "Em andamento"</div>
                <div class="card-body">
                    <h5 class="card-title">{{$em_andamento[0]["numero"]}}</h5>
                </div>
            </div>
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">Status "Em atraso"</div>
                <div class="card-body">
                    <h5 class="card-title">{{$em_atraso[0]["numero"]}}</h5>
                </div>
            </div>
        </div>   
    </div>
    @endsection