@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row text-center">
        <h1>Bienvenue {{ Auth::user()->first_name . " " . Auth::user()->last_name }} Contract'R</h1>
    </div>
    <div class="row ">
        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide bg-primary" data-ride="carousel" data-interval="3000">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox" >
            <div class="item active">
              <img src="https://di-uploads-pod3.dealerinspire.com/beavertoyotastaugustine/uploads/2017/11/cc_2018TOS110002_01_2100_1D6-1024x768.png" alt="...">
              <div class="carousel-caption">
                <h1>Le meilleur de la voiture</h1>
              </div>
            </div>
            <div class="item">
              <img src="http://www.cars2let.com/wp-content/uploads/2015/10/step3.png" alt="...">
              <div class="carousel-caption">
                ...
              </div>
            </div>
            <div class="item">
              <img src="https://www.salemdist.com/sites/default/files/diamondtools4.png" alt="...">
              <div class="carousel-caption">
                ...
              </div>
            </div>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        </div>

    </div>
</div>
@endsection
