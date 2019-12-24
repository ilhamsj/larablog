@extends('layouts.user')

@section('title_page', 'Welcome')

@section('header')
<header class="masthead">
  <div class="overlay"></div>
  <div class="swiper-container">
    <div class="swiper-wrapper">
      @foreach ($slider as $item)
      @if (env('APP_ENV') == 'local')
      <div class="swiper-slide text-center" style="max-height:100vh">
        <img class="img-fluid" data-src="holder.js/1366x768?auto=yes&random=yes&textmode=exact" alt="" srcset="">
      </div>
      @else
      <div class="swiper-slide text-center" style="max-height:100vh">
        <img class="img-fluid" src="{{$item->file}}" alt="" srcset="">
      </div>
      @endif
      @endforeach
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</header>
@endsection

@section('content')
<div class="row">
  @if (count($articles) > 0)
  <div class="col-12" style="margin-bottom: 100px">
    <strong class="">Tentang <span class="text-primary">{{env('APP_NAME')}}</span></strong>
    <hr>
    <h3>
      <a href="{{ route('user.artikel.show', $articles->last()->slug) }}">{{ $articles->last()->title }}</a>
    </h3>
    <span style="font-size: medium">
      <i class="fas fa-calendar-alt"></i>
      {{ $articles->last()->created_at->format('d F Y') }}

      <i class="fa fa-comments ml-4" aria-hidden="true"></i>
      {{ count($articles->last()->Review)}}
      Komentar

      <i class="fa fa-tag ml-4"></i>
      <a href="" class=""> {{ $articles->last()->category}}</a>
    </span>
    <p>
      @if (env('APP_ENV') == 'local')
      <img class="img-fluid rounded" data-src="holder.js/1366x768?auto=yes&random=yes&textmode=exact" alt="" srcset="">
      @else
      <img class="img-fluid rounded" src="{{ $articles->last()->cover }}" alt="" srcset="">
      @endif
    </p>
    {!! strip_tags(Str::limit($articles->last()->content, 100, '')) !!}
    <a href="{{ route('user.artikel.show', $articles->last()->slug) }}">
      <strong>Pelajari selengkapnya <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </strong>
    </a>
  </div>
  @endif
  {{-- Post --}}
  <div class="col-12">
    <strong class="">Postingan <span class="text-primary">Terbaru</span></strong>
    <hr>
  </div>
  @foreach ($articles as $item)
    @include('include.articles')
  @endforeach
</div>
@endsection

@section('gallery')
<section>
  <div class="container" style="margin: 100px auto">
    <div class="row">
      <div class="col">
        <div class="row parent-container">
          <div class="col-12">
            <strong class="">Galeri <span class="text-primary">Kegiatan</span></strong>
            <hr>
          </div>
          @foreach ($photos as $item)
            @include('include.galleries')
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ secure_url('vendor/swiper.min.css') }}">
<style>
  body {
    background-color: white
  }
</style>
@endpush

@push('scripts')
<script src="{{ secure_url('vendor/swiper.min.js') }}"></script>
<script src="{{ secure_url('vendor/holder.js') }}"></script>
<script>
  $(document).ready(function() {

    // gallery
    $('.parent-container').magnificPopup({
      delegate: 'img',
      type: 'image',
      gallery: {
        enabled: true
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