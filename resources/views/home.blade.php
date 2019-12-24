@extends('layouts.user')

@section('title_page', Auth::user()->name)

@section('header')
<header class="masthead" style="background-color: #32373D">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg col-md-10 mx-auto">
        <div class="post-heading">
          <h1>{{ Auth::user()->name }}</h1>
          <span class="meta">
              {{ Auth::user()->role }}
          </span>
        </div>
      </div>
    </div>
  </div>
</header>
@endsection

@section('content')
  <div class="card mb-4 p-0">
    <div class="card-body" id="content">
      <strong>Disukusi</strong>
      @foreach (Auth::user()->Review as $item)
        @foreach ($item->Article as $i)
        <p>
          <h3>
            <a href="{{ route('user.artikel.show', $i->slug) }}">{{ $i->title }}</a>
          </h3>
          <span class="badge badge-primary">{{ $item->created_at->format('F, d Y h:i:s') }}</span>
          {{ $item->content }}
        </p>
        @endforeach
      @endforeach
    </div>
  </div>
@endsection

@push('styles')
<style>
  body {
    background-color: white
  }

  #ini_content {
    top: -155px;
    position: relative;
  }
</style>
@endpush

@push('scripts')
@endpush
