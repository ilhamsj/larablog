@extends('layouts.user')

@section('title_page', 'Ini halaman title')

@section('content')

<div class="swiper-container">
    <div class="swiper-wrapper">
      @foreach ($images as $item)
        <div class="swiper-slide text-center bg-dark">
          <img class="img-fluid" src="{{ secure_url('images/'.$item) }}" alt="" srcset="">
        </div>
      @endforeach
    </div>
      <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>

<div class="container">
    <div class="row" id="artikel">
      @foreach ($items as $item)
      <div class="col-md-4 mx-auto">
        <div class="post-preview">
            <a href="{{ route('user.artikel.show', $item->id) }}">
              <h2 class="post-title">
                {{ $item->title }}
              </h2>
              <h3 class="post-subtitle">
                {{ strip_tags(Str::limit($item->content, 100)) }}
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="#">
                  {{ \Faker\Factory::create()->name }}
              </a>
              on {{ $item->created_at->format('F d, Y') }}
            </p>
          </div>
          <hr>
        </div>
        @endforeach
    </div>
    
    <div class="row" id="galeri">
      @foreach ($images as $item)
      <div class="col-6 col-md-4 my-3">
        <div class="post-preview">
          <img class="test-popup-link img-fluid" href="images/{{ $item }}" src="images/{{ $item }}" alt="" srcset="">
        </div>
      </div>
      @endforeach
    </div>
  </div>

  @php
  $footer = [
    // 'Lokasi'  => [
    //   $items
    // ],
    'Pengumuman'  => [
      $items
    ],
    'Unduhan'  => [
      $items
    ],
    'Pengunjung'  => [
      // $items
    ],
  ];
@endphp
<section class="bg-light py-4">
  <div class="container">
    <div class="row">
      @foreach ($footer as $key => $val)
      <div class="col-md">
          <h4>{{ strtoupper( $key )}}</h4>

          @foreach ($items as $k => $v)
            <a href="">{{ $v->title }}</a>
            <hr>
          @endforeach
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" integrity="sha256-RdH19s+RN0bEXdaXsajztxnALYs/Z43H/Cdm1U4ar24=" crossorigin="anonymous" />
@endpush

@push('scripts')
  <script src="https://unpkg.com/swiper/js/swiper.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.6/holder.js" integrity="sha256-0iasEOr4ksR7mLxVGBr26uozejqfHx6L4RL1L4lJPuE=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js" integrity="sha256-wk7QMTzYE7BJvko9BsywPzRmKzhCtIQKTuN6/B9sRmw=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function () {
      var swiper = new Swiper('.swiper-container', {
        centeredSlides: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });

      var x = $('#artikel > div:first-child').toggleClass('col-md-4 col-12');
      // $(x).find('hr').remove()
      $('#galeri').prepend($(x).clone());

      $('#galeri').magnificPopup({
        delegate: 'img', // child items selector, by clicking on it popup will open
        gallery: {
          enabled: true
        },
        type: 'image'
        // other options
      });

      $('#galeri').find('img').addClass('rounded');
    });
  </script>
@endpush