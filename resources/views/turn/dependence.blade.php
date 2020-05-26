@extends('layouts.app', ['class' => 'Turnero', 'activePage' => '', 'titlePage' => __('Bienvenido a sistema de turnos')])
@section('content')
<div id="app" class="container" style="height: auto; margin-top: 30px;">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Bienvenido a sistema de turnos</h4>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            @foreach($dependencia as $item)
                            <div class="col-md-5" onclick="document.getElementById('form-turn{{$item->id}}').submit();">
                                <div class="card" id="divs" style="cursor: pointer">
                                    <div class="card-header card-header-icon card-header-success">
                                        <div class="card-icon">
                                            <i class="material-icons">receipt</i>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><strong>{{ $item->name }}</strong></h4>
                                        {{ $item->descripcion }}
                                    </div>
                                </div>
                            </div>
                            <form id="form-turn{{$item->id}}" action=" {{ route('turno.store') }}" method="POST" style="display: none">
                                @csrf
                                <input type="hidden" id="iddependencia" name="iddependencia" value="{{ $item->id }}">
                                <input type="hidden" id="cedula" name="cedula" value="{{ $idclient }}">
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
