@extends('layouts.app')

@section('content')
<main>
    <div id="main-carousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#main-carousel" data-slide-to="1"></li>
        <li data-target="#main-carousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="center-block" src="image/earth-1.jpg" alt="First slide">
          <div class="carousel-caption">
            <h2>
              <img id="beginner-img" src="{{ asset('image/beginner-logo.png') }}">
            </h2>
            <a class="btn square_btn" href="{{ url('/exam?target=beginner') }}" role="button">初級問題に挑む</a>
          </div>
        </div>
        <div class="item">
          <img class="center-block" src="image/earth-2.jpg" alt="Second slide">
          <div class="carousel-caption" style="display:none;">
            <h2>
              <img id="intermediate-img" src="{{ asset('image/intermediate-logo.png') }}">
            </h2>
            <a class="btn square_btn" href="{{ url('/exam?target=intermediate') }}" role="button">中級問題に挑む</a>
          </div>
        </div>
        <div class="item">
          <img class="center-block" src="image/space.jpg" alt="Second slide">
          <div class="carousel-caption" style="display:none;">
            <h2>
              <img id="senior-img" src="{{ asset('image/senior-logo.png') }}">
            </h2>
            <a class="btn square_btn disabled" href="{{ url('/exam?target=senior') }}" role="button">上級問題に挑む</a>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#main-carousel" data-slide="prev"><i class="icon-prev fa fa-angle-left"></i></a>
      <a class="right carousel-control" href="#main-carousel" data-slide="next"><i class="icon-next fa fa-angle-right"></i></a>
    </div>
</main>
@endsection

@section('js')
    <script src="{{ asset('js/carousel.js') }}"></script>
@endsection