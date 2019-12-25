<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title_page') | {{ env('APP_NAME') }}</title>
  <link rel="stylesheet" href="{{ secure_url('css/admin.css') }}">
  @stack('styles')
</head>

<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ env('APP_URL') }}">
        <div class="sidebar-brand-icon">
          <i class="fa fa-cog fa-spin"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }} <sup>2</sup></div>
      </a>
      @php
          $menu = [
            'Dashboard' => [
              'icon'  => 'fas fa-fw fa-tachometer-alt',
              'link'  => route('admin.dashboard'),
            ],
            'Blog' => [
              'icon'  => 'fas fa-newspaper',
              'link'  => [
                'Blog'     => '#',
                'Kegiatan'    => '#',
                'Pengumuman'  => route('admin.artikel'),
              ],
            ],
            'Galeri' => [
              'icon'  => 'fas fa-image',
              'link'  => [
                'Slider'    => route('admin.gallery'),
                'Kegiatan'  => route('admin.gallery'),
                'Dokumen'   => route('admin.document'),
              ],
            ],
            'Kritik dan Saran' => [
              'icon'  => 'fa fa-comments',
              'link'  => route('admin.review'),
            ],
            'Pengaturan' => [
              'icon'  => 'fa fa-wrench',
              'link'  => [
                'Pengguna'   => route('admin.user'),
              ],
            ],
          ];
          @endphp
        <hr class="sidebar-divider my-0">
        @foreach ($menu as $key => $val)

          <li class="nav-item {{ url()->current() == $val['link'] ? 'active' : ''}}">
            @if (!is_array($val['link']))
              <a class="nav-link" href="{{ $val['link'] }}">
                <i class="{{ $val['icon'] }}"></i>
                <span>{{ $key }}</span>
              </a>
            @else
              <a class="nav-link" href="#" data-toggle="collapse" data-target="#{{ Str::slug($key) }}" aria-expanded="true" aria-controls="{{ Str::slug($key) }}">
                <i class="{{ $val['icon'] }}"></i>
                <span>{{ $key }}</span>
              </a>
              <div id="{{ Str::slug($key) }}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu {{ $key }} :</h6>
                  @foreach ($val['link'] as $k => $v)
                    <a class="collapse-item {{ url()->current() == $v ? 'active' : ''}}" href="{{ $v }}">{{ $k }}</a>
                  @endforeach
                </div>
              </div>
            @endif
          </li>
        @endforeach
        <hr class="sidebar-divider d-none d-md-block">

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  @auth
                      {{ Auth::user()->name }}
                  @else
                      Valerie Luna
                  @endauth
                </span>
                <img class="img-profile rounded-circle" data-src="holder.js/50x50?random=yes&auto=yes&textmode=exact">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('home') }}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="{{ route('admin.user') }}">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>

        <div class="container-fluid">

          <div class="alert alert-success collapse" role="alert">
            <strong>primary</strong>
          </div>

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('title_page')</h1>
            @yield('title_content')
          </div>
          @yield('content')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; {{ env('app_name') }} {{ date('Y')}}</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          @auth
            <a id="logout" class="btn btn-primary" href="#">Logout</a>
            @else
            <a class="btn btn-primary" href="{{ route('login') }}">Logout</a>
          @endauth
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ secure_url('js/admin.js') }}"></script>
  <script src="{{ secure_url('js/holder.js') }}"></script>
  <script>
    
    $('#logout').click(function (e) { 
      e.preventDefault();
      alert();
      document.getElementById('logout-form').submit();
    });
    
    function showMessage(message) {
      $('.alert').show()
      $('.alert').find('strong').text(message);

      $(".alert").delay(2500).slideUp(200, function() {
          $(this).hide()
      });
    }
  </script>
  @stack('scripts')
</body>
</html>
