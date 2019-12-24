@extends('layouts.user')

@section('title_page', 'Artikel')

@section('header')
<header class="masthead">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg col-md-10 mx-auto">
        <div class="post-heading">
          <h1>{{ Str::title(Str::after(URL::current(), env('APP_URL'))) }}</h1>
        </div>
      </div>
    </div>
  </div>
</header>
@endsection

@section('content')
<div class="row">
  {{-- Post --}}
  <div class="col-12">
    <strong class="">
      {{ Str::title(Str::after(URL::current(), env('APP_URL'))) }}
      <span class="text-primary">Terbaru</span>
    </strong>
    <hr>
  </div>
  @foreach ($articles as $item)
  <div class="col-12 col-sm-6 mb-4">
    @if (URL::current() == route('user.kegiatan.index'))
      @if (env('APP_ENV') == 'local')
      <img class="img-fluid rounded mb-4" data-src="holder.js/800x600?auto=yes&random=yes&textmode=exact" alt="" srcset="">
      @else
      <img class="img-fluid rounded mb-4" src="{{ $item->file }}" alt="" srcset="">
      @endif
    @endif
    <h3>
      {{ $item->title }}
    </h3>
    <span style="font-size: medium">
      <i class="fas fa-calendar-alt"></i>
      {{ $item->created_at->format('d M Y h:i:s') }}

      <i class="fa fa-tag ml-2"></i>
      <a href="" class=""> {{ $item->category}}</a>
    </span>
    @if (URL::current() != route('user.kegiatan.index'))
    <p>
      <a target="_blank" href="{{ secure_url($item->file) }}">Download</a>
    </p>
    @endif
    <hr>
  </div>
  @endforeach
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="vendor/swiper.min.css">
<style>
  body {background-color: white}
</style>
@endpush

@push('scripts')
  <script src="vendor/swiper.min.js"></script>
  <script src="vendor/holder.js"></script>
  <script>
  $(document).ready(function () {
    
    // gallery
    $('.parent-container').magnificPopup({
      delegate: 'img',
      type: 'image',
      gallery:{
        enabled:true
      }
    });

    // swi
    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  });
  </script>
@endpush