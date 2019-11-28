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
        @for ($i = 0; $i < 10; $i++)
          <div class="post-preview">
            <a href="/berita">
              <h2 class="post-title">
                {{ \Faker\Factory::create()->realText($maxNbChars = 70, $indexSize = 1)}}
              </h2>
              <h3 class="post-subtitle">
                {{ \Faker\Factory::create()->realText($maxNbChars = 50, $indexSize = 1)}}
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="#">
                  {{ \Faker\Factory::create()->name }}
              </a>
              on {{ \Faker\Factory::create()->date('F d, Y') }}
            </p>
          </div>
          <hr>
        @endfor
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>
@endsection