<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ env('APP_NAME') }} - @yield('title_page')</title>
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="{{ secure_url('css/app.css') }}">
  @stack('styles')
</head>

<body>
    @php
        $sosmed = [
          'twitter' => [
            'icon' => 'fab fa-twitter fa-stack-1x fa-inverse',
            'url'   => '#'
          ],
          'facebook' => [
            'icon' => 'fab fa-facebook-f fa-stack-1x fa-inverse',
            'url'   => '#'
          ],
          'instagram' => [
            'icon' => 'fab fa-instagram fa-stack-1x fa-inverse',
            'url'   => '#'
          ],
        ];

        $menu = [
          'Home' => [
            'icon'  => 'fas fa-fw fa-tachometer-alt',
            'link'  => '/',
          ],
          'Profil' => [
            'icon'  => 'fas fa-fw fa-tachometer-alt',
            'link'  => '#linksadk',
          ],
          'Kegiatan' => [
            'icon'  => 'fas fa-fw fa-tachometer-alt',
            'link'  => '#linksadk',
          ],
          'Kontak' => [
            'icon'  => 'fas fa-fw fa-tachometer-alt',
            'link'  =>  route("user.kontak.index"),
          ],
        ];
    @endphp

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="{{ env('APP_URL') }}"> {{ env('APP_NAME') }}</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          @foreach ($menu as $key => $val)
          <li class="nav-item">
            <a class="nav-link" href="{{ $val['link'] }}">{{ $key }}</a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </nav>

  <header class="masthead" style="background-image: url('{{secure_url('img/home-bg.jpg')}}')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @yield('header_content')
      </div>
    </div>
  </div>
  </header>

  @yield('content')
  
  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            @foreach ($sosmed as $key => $val)
              <li class="list-inline-item">
                <a href="{{ $val['url'] }}">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="{{ $val['icon'] }}"></i>
                  </span>
                </a>
              </li>
            @endforeach
          </ul>
          <p class="copyright text-muted">Copyright &copy; <a href="{{ env('APP_URL') }}">{{ env('APP_NAME') }}</a> {{ date('Y') }}</p>
        </div>
      </div>
    </div>
  </footer>
  <script src="{{ secure_url('js/app.js') }}"></script>
  @stack('scripts')
</body>

</html>
