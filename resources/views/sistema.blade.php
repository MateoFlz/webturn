@extends('layouts.app', ['class' => 'Turnero', 'activePage' => '', 'titlePage' => __('Bienvenido a sistema de turnos')])
@section('content')
<div id="app" >
    <div class="row justify-content-center pt-2" >
        <div class="col-6" style="max-height: 500px;">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                  <img class="d-block w-100 border rounded" src="{{ asset('material')}}/img/slide01.jpg" alt="First slide" width="300" height="580px;">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100 border rounded" src="{{ asset('material')}}/img/slide02.jpg" alt="Second slide" width="300" height="580px">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100 border rounded" src="{{ asset('material')}}/img/slide03.jpg" alt="Third slide" width="300px" height="580px">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100 border rounded" src="{{ asset('material')}}/img/slide04.jpg" alt="Third slide" width="300px" height="580px">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100 border rounded" src="{{ asset('material')}}/img/slide05.jpg" alt="Third slide" width="300px" height="580px">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
        <div class="col-6" id="listturnos">
        @foreach ($list as $item)
        <div class="col-md-12">
            <div class="alert shadow bg-light border rounded">
                <div class="row">
                    <div class="col-md-12 d-flex align-items-center">
                        <div class="col-md-3 badge badge-success ">
                            <h1><strong>{{$item->namemodulo}}</strong></h1>
                        </div>
                        <div class="col-md-9">
                            <h2><strong>{{$item->namecliente}}</strong></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>
</div>
@endsection
