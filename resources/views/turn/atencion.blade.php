@extends('layouts.app', ['activePage' => '', 'titlePage' => __('Atension de turnos')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 d-flex align-items-start">
                                <img src=" {{ asset('material') }}/img/mensageria.png" alt="">
                                <span><h2>&nbsp;Atencion al cliente</h2></span>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
