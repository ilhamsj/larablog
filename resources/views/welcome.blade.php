@extends('layouts.user')

@section('content')
      <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Clean Blog</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @for ($i = 0; $i < 10; $i++)
          <div class="post-preview">
            <a href="/berita">
              <h2 class="post-title">
                {{-- Man must explore, and this is exploration at its greatest --}}
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
              {{-- on September 24, 2019 --}}
              on {{ \Faker\Factory::create()->date('F d, Y') }}
            </p>
          </div>
          <hr>
        @endfor
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>
@endsection