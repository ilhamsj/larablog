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
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @foreach ($items as $item)
        <div class="post-preview">
            <a href="{{ route('user.artikel.show', $item->id) }}">
              <h2 class="post-title">
                {{ $item->title }}
              </h2>
              <h3 class="post-subtitle">
                {{ Str::limit($item->content, 100) }}
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
        @endforeach
          <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>
@endsection