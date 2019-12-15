<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ env('APP_NAME') }} - @yield('title_page')</title>
  <link href='vendor/Lora.css' rel='stylesheet' type='text/css'>
  <link href='vendor/Open-Sans.css' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="{{ secure_url('css/app.css') }}">
  <style>
    .whatsapp {
      transform: rotate(-90deg);
      bottom: 50vh;
      right: -55px;
    }
    /* * {
      font-family: 'poppins';
      font-size: 1rem
    } */
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
  
  @php
      $footer = [
        env("APP_NAME") => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. ',
        'Useful links' => [
          'Blog' => 'https://an-naba.test/',
          'Kegiatan' => 'https://an-naba.test/',
          'Halaman muka' => 'https://an-naba.test/',
          'Tentang kami' => 'https://an-naba.test/',
        ],
        'di dukung oleh' => [
          'Blog' => 'https://an-naba.test/',
          'Kegiatan' => 'https://an-naba.test/',
          'Halaman muka' => 'https://an-naba.test/',
          'Tentang kami' => 'https://an-naba.test/',
        ],
        'Copyright'  => '©' . date(' Y ') . env('APP_NAME').' 2019 All Rights Reserved'
      ];
  @endphp

  <!-- Footer -->
  <footer class="bg-dark text-light">
    <div class="container">
      <div class="row">
        @foreach ($footer as $key => $val)
          <div class="col mb-4" id="{{ Str::slug($key) }}">
            <h4>{{ Str::title($key) }}</h4>
            @if (is_array($val))
            <ul class="nav flex-column">
                @foreach ($val as $k => $v)
                  <li class="nav-item">
                    <a href="" class="nav-link text-light pl-0">{{ $k }}</a>
                  </li>
                @endforeach
            </ul>
            @else
                {{ $val }}
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </footer>  
  <section class="whatsapp position-fixed rounded-left" id="saran">
      <a href="" class="btn btn-primary rounded-top">Kritik Saran</a>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="kritik_saran" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="">
          @csrf
          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId" value="{{ \Faker\Factory::create()->name}}">
          </div>

          <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId" value="{{ \Faker\Factory::create()->email}}">
          </div>

          <div class="form-group">
            <label for="">Kritik dan Saran</label>
            <textarea class="form-control" name="content" id="content" rows="3">{{ \Faker\Factory::create()->realText()}}</textarea>
          </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ secure_url('js/app.js') }}"></script>
  <script>
  $(document).ready(function () {

    $('#kritik_saran').find('button:last-child').click(function (e) { 
      e.preventDefault();
      
      var data = $('#kritik_saran').find('form').serialize()
      $.ajax({
        type: "POST",
        url: "{{ route('review') }}",
        data: data,
        success: function (response) {
          console.log(response);
          $('#kritik_saran').find('form').trigger('reset');
          $('#kritik_saran').modal('hide');
          alert(response.status);
        }
      });
    });

    $('#{{ Str::slug(env("APP_NAME")) }}').toggleClass('col col-12 col-sm-8');
    $('#copyright').toggleClass('col col-12 mt-4').find('h4').remove();
    $('#saran').click(function (e) { 
      e.preventDefault();
      $('#kritik_saran').modal('show')
    });

    $(window).on('resize', function () {
      var getSize = $(this);
      responsiveX(getSize.width())
    });

    responsiveX($(window).width())

    function responsiveX(widthSize) {
      if(widthSize < 576) {
        console.log(widthSize);
        $('#mainNav').css('position', 'relative');
      } else {
        $('#mainNav').css('position', 'absolute');
      }
    }

  });

  </script>
  @stack('scripts')
</body>

</html>
