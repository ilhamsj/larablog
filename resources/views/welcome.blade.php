@extends('layouts.user')

@section('title_page', 'Ini halaman title')

@section('header')
  <header class="masthead">
    <div class="overlay"></div>
    <div class="swiper-container">
      <div class="swiper-wrapper">
        @foreach ($slider as $item)
        <div class="swiper-slide text-center" style="max-height:100vh">
          <img class="img-fluid" src="{{$item->file}}" alt="" srcset="">
        </div>
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
  <div class="col-12" style="margin-bottom: 100px">
    <strong class="">Tentang <span class="text-primary">{{env('APP_NAME')}}</span></strong>
    <hr>
    <h3>
      <a href="{{ route('user.artikel.show', $articles->first()->id) }}">{{ $articles->first()->title }}</a>
    </h3>
    <span style="font-size: medium">
      <i class="fas fa-calendar-alt"></i>
      {{ $articles->first()->created_at->format('d F Y') }}
      
      <i class="fa fa-comments ml-4" aria-hidden="true"></i>
      {{ count($articles->first()->Review)}} 
      Komentar

      <i class="fa fa-tag ml-4"></i>
      <a href="" class=""> {{ $articles->first()->category}}</a> 
    </span>
    <p>
      <img class="img-fluid rounded" src="{{ file_exists($articles->first()->cover) ? $articles->first()->cover : 'holder.js/1200x800?auto=yes&text=Image Not Found&random=yes' }}" alt="" srcset="">
    </p>
    {!! strip_tags(Str::limit($articles->first()->content, 100, '')) !!} 
    <a href="{{ route('user.artikel.show', $articles->first()->id) }}">
      <strong>Pelajari selengkapnya <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </strong>
    </a>
  </div>

  {{-- Post --}}
  <div class="col-12">
    <strong class="">Postingan <span class="text-primary">Terbaru</span></strong>
    <hr>
  </div>
  @foreach ($articles as $item)
  <div class="col-12 col-sm-6 mb-4">
    <img class="img-fluid" src="{{ file_exists($item->cover) ? $item->cover : 'holder.js/500x300?auto=yes&text=Image Not Found&random=yes' }}" alt="" srcset="">
  </div>
  <div class="col-12 col-sm-6 mb-4">
    <p>
        <span style="font-size: medium">
          <i class="fas fa-calendar-alt"></i>
          {{ $item->created_at->format('d M Y') }}
          
          <i class="fa fa-comments ml-2" aria-hidden="true"></i>
          {{ count($item->Review)}} 
          Komentar

          <i class="fa fa-tag ml-2"></i>
          <a href="" class=""> {{ $item->category}}</a> 
        </span>
    </p>
    <h3>
      <a href="{{ route('user.artikel.show', $item->id) }}">{{ $item->title }}</a>
    </h3>
    {!! strip_tags(Str::limit($item->content, 100)) !!} 
  </div>
  <div class="w-100"></div>
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
            <div class="col-6 col-sm-3 mb-4">
              <img style="cursor: pointer" class="img-fluid rounded"  href="{{ secure_url($item->file) }}" src="{{ secure_url($item->file) }}" alt="" srcset="">
            </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
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