@extends('layouts.user')

@section('title_page', 'Ini halaman title')

@section('header_content')
<div class="site-heading">
  <h1>Clean Blog</h1>
  <span class="subheading">A Blog Theme by Start Bootstrap</span>
</div>
@endsection

@section('content')
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
      <div class="col-md-3 my-2">
        <div class="post-preview">
          
          <img class="test-popup-link img-fluid" href="images/{{ $item }}" src="images/{{ $item }}" alt="" srcset="">
        </div>
      </div>
      @endforeach
    </div>

  </div>
@endsection

@push('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" integrity="sha256-RdH19s+RN0bEXdaXsajztxnALYs/Z43H/Cdm1U4ar24=" crossorigin="anonymous" />
@endpush

@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.6/holder.js" integrity="sha256-0iasEOr4ksR7mLxVGBr26uozejqfHx6L4RL1L4lJPuE=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js" integrity="sha256-wk7QMTzYE7BJvko9BsywPzRmKzhCtIQKTuN6/B9sRmw=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function () {
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