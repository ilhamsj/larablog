<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title_page') | {{ env('APP_NAME') }}</title>
  <link href='{{ secure_url('vendor/Lora.css') }}' rel='stylesheet' type='text/css'>
  <link href='{{ secure_url('vendor/Open-Sans.css') }}' rel='stylesheet' type='text/css'>
  <link href='{{ secure_url('vendor/holder.js') }}' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="{{ secure_url('css/app.css') }}">
  <link href='https://api.mapbox.com/mapbox-gl-js/v0.54.0/mapbox-gl.css' rel='stylesheet' />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
  <style>
    .whatsapp {
      transform: rotate(-90deg);
      bottom: 50vh;
      right: -65px;
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
            'link'  => route('welcome'),
          ],
          'Profil' => [
            'icon'  => 'fas fa-fw fa-tachometer-alt',
            'link'  => route('user.artikel.show', 'tentang-kami'),
          ],
          'Kegiatan' => [
            'icon'  => 'fas fa-fw fa-tachometer-alt',
            'link'  => route('user.kegiatan.index'),
          ],
          'Kontak' => [
            'icon'  => 'fas fa-fw fa-tachometer-alt',
            'link'  => route('user.artikel.show', 'kontak'),
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
            <a class="nav-link {{ $val['link'] == URL::current() ? '' : '' }}" href="{{ $val['link'] }}">
            {!! $val['link'] == URL::current() ? '<i class="fa fa-circle"></i>' : '' !!} {{ $key }}
            </a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </nav>

  @yield('header')
  <div class="container" style="margin: 10vh auto">
    <div class="row">
      <div class="col-12 col-sm-9" id="ini_content">
        @yield('content')
      </div>
      <div class="col">
        <div class="card">
          <div class="card-body">
            {{ date('F, d Y') }}
            <strong id="clock"></strong>
          </div>
        </div>
        <div class="card border-0">
          <div class="card-body px-0">
            <span class="btn btn-info btn-block">Profil</span>
          </div>
          <ul class="list-group list-group-flush">
            @guest
            <li class="list-group-item px-0">
              <a href="{{ route('login') }}">Login</a>
            </li>
            <li class="list-group-item px-0">
              <a href="{{ route('register') }}">Register</a>
            </li>
            @else            
            <li class="list-group-item mb-4 px-0"><a href="{{ route('home') }}">{{ Auth::user()->name }}</a></li>
            <li class="list-group-item mb-4 px-0">
              <a class="" href="{{ route('logout') }}" id="logout">
                  Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </li>
            @endguest
          </ul>
        </div>
        <div class="card mb-4 border-0">
          <div class="card-body px-0">
            <span class="btn btn-info btn-block" >Pengumumuman</span>
          </div>
          <ul class="list-group list-group-flush">
            @foreach ($news as $item)
              <li class="list-group-item px-0 mb-1">
                <span class="" style="font-size: small">{{ $item->created_at->format('d F Y') }}</span> <br/>
                <a href="{{ route('user.artikel.show', $item->slug) }}">{{ $item->title }}</a> <br/>
              </li>
            @endforeach
          </ul>
        </div>

        <div class="card border-0">
          <div class="card-body px-0">
            <span class="btn btn-info btn-block">Dokumen</span>
          </div>
          <ul class="list-group list-group-flush">
            @foreach ($documents as $item)
              <li class="list-group-item mb-1 px-0">
                <a href="../{{ $item->file }}" target="_blank">
                  {{ $item->title }}
                  {{ $item->category }}
                  Download
                  <i class="fa fa-download" aria-hidden="true"></i>
                </a>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>

  @yield('gallery')
  
  @php
      $footer = [
        env("APP_NAME") => [
          '<i class="fa fa-home"></i> Tanggulangin, Genjahan, Ponjong, Gunungkidul Yogyakarta Indonesia'  => '#',
          '<i class="fa fa-envelope"></i> tmlansia.annaba@gmail.com'                                      => '#',
          '<i class="fa fa-phone-alt"></i> 628129801782'                                                 => '#',
        ],
        'Tentang Kami' => [
          'Tujuan'              => route('user.artikel.show', 'tentang-kami'),
          'Perkenalan'          => route('user.artikel.show', 'tentang-kami'),
          'Motto dan Motivasi'  => route('user.artikel.show', 'tentang-kami'),
          'Sasaran'             => route('user.artikel.show', 'tentang-kami'),
          'Standar Pengasuhan'  => route('user.artikel.show', 'tentang-kami'),
          'Target'              => route('user.artikel.show', 'tentang-kami'),
        ],
        'Link' => [
          'Artikel'        => route('user.artikel.index'),
          'Kegiatan'    => route('user.kegiatan.index'),
          'Pengumuman'  => route('user.pengumuman.index'),
          'Dokumen'     => route('user.dokumen.index'),
        ],
        'Copyright' => '© '.env('APP_NAME').date(' Y ').'All Rights Reserved'
      ];
  @endphp
  <section>
    <div id='mapid' style='width: 100%; height: 50vh'></div>
  </section>
  <!-- Footer -->
  <footer style="background-color: #1b4b72" class="text-light">
    <div class="container">
      <div class="row">
        @foreach ($footer as $key => $val)
          <div class="col mb-4" id="{{ Str::slug($key) }}">

            <h4>{!! strtoupper($key) !!}</h4>
            @if (is_array($val))
            <ul class="nav flex-column">
                @foreach ($val as $k => $v)
                  <li class="nav-item">
                    <a href="{{ $v }}" class="nav-link text-light pl-0">{!! $k !!}</a>
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
          <h5 class="modal-title">Kritik dan Saran <i class="fa fa-comment"></i> </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          @auth
          <form action="">
            @csrf
            <input type="text" name="category" id="category" class="form-control" placeholder="" aria-describedby="helpId" value="Review" hidden>
            <input type="text" name="user_id" id="user_id" class="form-control" placeholder="" aria-describedby="helpId" value="{{ Auth::user()->id }}" hidden>
  
            <div class="form-group">
              <label for="">Kritik dan Saran</label>
              <textarea class="form-control" name="content" id="content" rows="3"></textarea>
            </div>
          </form>
          @else
            <a href="{{ route('login') }}" style="text-decoration: underline">Login</a> atau
            <a href="{{ route('register') }}" style="text-decoration: underline">register</a> terlebih dahulu
          @endauth
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ secure_url('js/app.js') }}"></script>
  <script src='https://api.mapbox.com/mapbox-gl-js/v0.54.0/mapbox-gl.js'></script>
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
  <script src="{{ secure_url('js/map.js') }}"></script>
  <script>
  $(document).ready(function () {

      // show error
      function displayError(res, target) {
        if ($.isEmptyObject(res) == false)
        {
          $.each(res.errors, function (key, value) {
              $(target).find('#'+key)
                .addClass("is-invalid")  
                .closest('.form-group')
                .append('<span class="invalid-feedback" role="alert"> <strong>'+ value +'</strong> </span>')
          })
        }
      }

      function hapusError()
      {
        $('.invalid-feedback').remove();
        $('.form-group').find('textarea').removeClass("is-invalid");
      }

    $('#logout').click(function (e) { 
      e.preventDefault();
      alert();
      document.getElementById('logout-form').submit();
    });
    
    startTime()
    function startTime() {
      var today = new Date();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      document.getElementById('clock').innerHTML =
      h + ":" + m + ":" + s;
      var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
      if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
      return i;
    }

    $('#kritik_saran').find('button:last-child').click(function (e) { 
      e.preventDefault();
      
      var data = $('#kritik_saran').find('form').serialize()
      $.ajax({
        type: "POST",
        url: "{{ route('review') }}",
        data: data,
        success: function (response) {
          $('#kritik_saran').find('form').trigger('reset');
          $('#kritik_saran').modal('hide');
          alert(response.status);
        },
        error: function (xhr) {
          displayError(xhr.responseJSON, '#kritik_saran');
        }
      });
    });
    
    $('#{{ Str::slug(env("APP_NAME")) }}').toggleClass('col col-12 col-sm-7');
    $('#copyright').toggleClass('col col-12 mb-4');
    $('#copyright > h4').remove();
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
