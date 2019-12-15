@extends('layouts.user')

@section('title_page', 'Ini halaman title')

@section('header')
<header class="masthead">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg col-md-10 mx-auto">
        <div class="post-heading">
          <h1>Blog Post</h1>
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