@extends('layouts.user')

@section('title_page', 'Ini halaman title')

@section('content')

<header class="masthead">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-heading row justify-content-center align-items-center" style="min-height: 100vh">
          <div class="col">
            <h1>
              {{ count($articles) != null ? $articles->first()->title : 'Belum ada postingan ' }}
            </h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="container" style="margin-top: 100px">
  <div class="row">
    <div class="col-8">
        <div class="row">
          @foreach ($articles as $item)
          <div class="col-6">
            <img class="img-fluid" src="{{ secure_url('images/IMG_3757.JPG') }}" alt="" srcset="">
          </div>
          <div class="col-6">
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
            <span class="bg-primary text-light">Popular Posts</span>
            @foreach ($articles as $item)
            <p>
                <a href="{{ route('user.artikel.show', $item->id) }}">{{ $item->title }}</a>
            </p>
            @endforeach
        </div>
        <div class="col-12">
            <span class="bg-primary text-light">Posts Category</span>
            @foreach ($articles as $item)
            <p>
                <a href="">{{ $item->category }}</a>
            </p>
            @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('styles')
<style>
  body {background-color: white}
</style>
@endpush

@push('scripts')
    <script>
      $('hr').last().remove();
  </script>
@endpush