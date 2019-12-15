@extends('layouts.user')

@section('title_page', 'Ini halaman title')

@section('content')

<header class="masthead">
  <div class="overlay"></div>
  <div class="swiper-container">
    <div class="swiper-wrapper">
      @foreach ($slider as $item)
      <div class="swiper-slide text-center" style="max-height:100vh">
        {{-- <img class="img-fluid" data-src="holder.js/1349x699?auto=yes&textmode=exact&random=yes" alt="" srcset=""> --}}
        <img class="img-fluid" src="{{$item->file}}" alt="" srcset="">
      </div>
      @endforeach
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</header>

<div class="container" style="margin: 100px auto">
  <div class="row">
    <div class="col-12 col-sm-9">
        <div class="row">
          <div class="col-12">
            <span class="btn-primary">Postingan Terbaru</span>
            <hr>
          </div>
          @foreach ($articles as $item)
          <div class="col-12 col-sm-6 mb-4">            
            <img class="img-fluid" src="{{ file_exists($item->cover) ? $item->cover : 'holder.js/500x300?auto=yes&text=Image Not Found&random=yes' }}" alt="" srcset="">
          </div>
          <div class="col-12 col-sm-6 mb-4">
            <h3>
              <a href="{{ route('user.artikel.show', $item->id) }}">{{ $item->title }}</a>
            </h3>
            {!! strip_tags(Str::limit($item->content, 100)) !!} 
            <p>
                <span style="font-size: medium">
                  {{ $item->created_at->format('d F Y') }} / {{ count($item->Review)}} Komentar / <a href="" class=""> {{ $item->category}}</a> 
                </span>
            </p>
          </div>
          <div class="w-100"></div>
          @endforeach
        </div>
    </div>
    <div class="col">
      <div class="row">
        <div class="col-12 mb-4">
            <span class="bg-primary text-light">Pengumuman Terbaru</span>
            <hr>
            @foreach ($news as $item)
            <p>
                <a href="{{ route('user.artikel.show', $item->id) }}">{{ $item->title }}</a>
            </p>
            @endforeach
        </div>
        <div class="col-12">
            <span class="bg-primary text-light"> Download dokumen</span>
            <hr>
            @foreach ($documents as $item)
            <p>
                {{ $item->title}}
                <a target="_blank" href="{{ $item->file }}">Download</a>
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
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"> --}}
<style>
  body {background-color: white}
</style>
@endpush

@push('scripts')
  <script src="vendor/swiper.min.js"></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script> --}}
  <script src="vendor/holder.js"></script>
  <script>    
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

  </script>
@endpush