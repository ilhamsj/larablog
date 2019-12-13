@extends('layouts.user')

@section('title_page', 'Ini halaman title')

@section('content')

<header class="masthead">
  <div class="overlay"></div>
  <div class="swiper-container">
    <div class="swiper-wrapper">
        @for ($i = 0; $i < 7; $i++)
        <div class="swiper-slide text-center">
          <img class="img-fluid" data-src="holder.js/1366x768?auto=yes&textmode=exact&random=yes" alt="" srcset="">
        </div>
        @endfor
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</header>

<div class="container" style="margin: 100px auto">
  <div class="row">
    <div class="col-12 col-sm-8">
        <div class="row">
          <div class="col-12">
            <span class="btn-primary">Postingan Terbaru</span>
            <hr>
          </div>
          @foreach ($articles as $item)
          <div class="col-12 col-sm-6">
            <img class="img-fluid" src="{{ secure_url('images/IMG_3757.JPG') }}" alt="" srcset="">
          </div>
          <div class="col-12 col-sm-6">
            <h3>
              <a href="{{ route('user.artikel.show', $item->id) }}">{{ $item->title }}</a>
            </h3>
            {!! Str::limit($item->content, 100) !!} 
            <p>
                <span style="font-size: medium">
                  {{ $item->created_at->format('d F Y') }} / <a href=""> {{ $item->category}}</a>
                </span>
            </p>
          </div>
          <div class="w-100"></div>
          @endforeach
        </div>
    </div>
    <div class="col">
      <div class="row">
        <div class="col-12">
            <span class="bg-primary text-light">Pengumuman Terbaru</span>
            <hr>
            @foreach ($articles as $item)
            <p>
                <a href="{{ route('user.artikel.show', $item->id) }}">{{ $item->title }}</a>
            </p>
            @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

<section>
  <div class="container" style="margin: 100px auto">
    <div class="row">
      <div class="col">
        <div class="row parent-container">
            <div class="col-12">
              <span class="bg-primary text-light">Galeri Kegiatan</span>
              <hr>
            </div>
            @for ($i = 0; $i < 7; $i++)
            <div class="col-6 col-sm-3 mb-4">
              <img class="img-fluid rounded"  href="{{ secure_url('images/IMG_3757.JPG') }}" src="{{ secure_url('images/IMG_3757.JPG') }}" alt="" srcset="">
            </div>
            @endfor
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<style>
  body {background-color: white}
</style>
@endpush

@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.6/holder.js"></script>
  <script src="https://unpkg.com/swiper/js/swiper.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
  <script>

  
    $(window).on('resize', function () {
      var getSize = $(this);
      if(getSize.width() < 576) {
        console.log(getSize.width());
        $('#mainNav').css('position', 'relative');
      } else {
        // console.log(getSize.width());
        $('#mainNav').css('position', 'absolute');
      }
    });
    
    // gallery
    $('.parent-container').magnificPopup({
      delegate: 'img', // child items selector, by clicking on it popup will open
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

  </script>
@endpush