@extends('layouts.admin')

@section('title_page', 'Dashboard')
@section('title_content')
  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
  </a>
@endsection
@php
    $info = [
      'pengumumuman' => [
        'jumlah'  => 100,
        'color'   => 'primary',
        'icon'    => '',
        'size'    => 'col-xl-3 col-md-6 '
      ],
      'kegiatan' => [
        'jumlah'  => 200,
        'color'   => 'success',
        'icon'    => '',
        'size'    => 'col-xl-3 col-md-6 '
      ],
      'postingan' => [
        'jumlah'  => 200,
        'color'   => 'info',
        'icon'    => '',
        'size'    => 'col-xl-3 col-md-6 '
      ],
      'kritik dan saran' => [
        'jumlah'  => 1990,
        'color'   => 'danger',
        'icon'    => '',
        'size'    => 'col-xl-3 col-md-6'
      ],
    ];
@endphp
@section('content')
<div class="row">
  @foreach ($info as $key => $val)
    <div class="{{ $val['size'] }} mb-4">
      <div class="card border-0 border-left-{{ $val['color'] }} shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-{{ $val['color'] }} text-uppercase mb-1">{{ $key }}</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $val['jumlah'] }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
</div>

@endsection
