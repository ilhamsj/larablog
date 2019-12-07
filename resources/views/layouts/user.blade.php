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
  <style>
    .whatsapp {
      transform: rotate(-90deg);
      bottom: 50vh;
      right: -45px;
    }
  </style>
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

  @yield('content')
  
  <!-- Footer -->
  <footer class="bg-light">
    <div class="container">
      <div class="row flex-row-reverse">
        <div class="col-6">
          Tentang kami
          <hr>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi voluptate dignissimos fuga in sit tenetur incidunt enim obcaecati perspiciatis quo nihil unde libero, laborum, explicabo accusantium quaerat aut. Dolorem, omnis?
        </div>
        <div class="col">
          Didukung oleh
          <hr>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi voluptate dignissimos fuga in sit tenetur incidunt enim obcaecati perspiciatis quo nihil unde libero, laborum, explicabo accusantium quaerat aut. Dolorem, omnis?
        </div>
        <div class="col">
          Didukung oleh
          <hr>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi voluptate dignissimos fuga in sit tenetur incidunt enim obcaecati perspiciatis quo nihil unde libero, laborum, explicabo accusantium quaerat aut. Dolorem, omnis?
        </div>
        <div class="col-12">
          <hr>
            Copyright © 2019. All Rights Reserved
        </div>
      </div>
    </div>
  </footer>
  <section class="whatsapp position-fixed rounded-left">
      <a href="" class="btn btn-primary rounded-top">Whatsapp</a>
  </section>
  <script src="{{ secure_url('js/app.js') }}"></script>
  @stack('scripts')
</body>

</html>
