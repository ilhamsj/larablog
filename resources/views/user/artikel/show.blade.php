@extends('layouts.user')

@section('title_page', 'Ini halaman title')

@section('content')

<header class="masthead">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="post-heading row justify-content-center align-items-center" style="min-height: 10vh">
          <div class="col">
            <h1>
              {{ $item->title }}
            </h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="container" style="margin: 100px auto">
  <div class="row">
    <div class="col-8">
      <div class="row">
        <div class="col">
          <h3><a href="{{ route('user.artikel.show', $item->id) }}">{{ $item->title }}</a></h3>
          <p>
            <span style="font-size: medium">
              {{ $item->created_at->format('d F Y') }} / <a href=""> {{ $item->category}}</a>
            </span>
          </p>
        </div>
        <div class="col-12 mb-4">
          <img class="img-fluid rounded" src="{{ secure_url('images/IMG_3757.JPG') }}" alt="" srcset="">
        </div>
        <div class="col-12">
          {!! Str::limit($item->content, 100) !!}
        </div>
        <div class="w-100"></div>
      </div>
    </div>
    <div class="col">
      <div class="row">
        <div class="col-12">
          <span class="bg-primary text-light">Pengumuman Terbaru</span>
          <hr>
          <p>
            <a href="{{ route('user.artikel.show', $item->id) }}">{{ $item->title }}</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('styles')
<style>
  body {
    background-color: white
  }
</style>
@endpush