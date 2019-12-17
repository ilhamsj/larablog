@extends('layouts.admin')

@section('title_page', 'Dashboard')
@php
    $info = [
      'Blog' => [
        'jumlah'  => count($articles),
        'color'   => 'primary',
        'icon'    => 'fas fa-newspaper',
        'size'    => 'col-xl-3 col-md-6 '
      ],
      'Berita' => [
        'jumlah'  => count($news),
        'color'   => 'primary',
        'icon'    => 'fas fa-newspaper',
        'size'    => 'col-xl-3 col-md-6'
      ],
      'Pengguna' => [
        'jumlah'  => count($users),
        'color'   => 'primary',
        'icon'    => 'fa fa-user',
        'size'    => 'col-xl-3 col-md-6'
      ],
      'Dokumen' => [
        'jumlah'  => count($documents),
        'color'   => 'primary',
        'icon'    => '',
        'size'    => 'col-xl-3 col-md-6'
      ],
      'Foto Kegiatan' => [
        'jumlah'  => count($photos),
        'color'   => 'primary',
        'icon'    => 'fas fa-image',
        'size'    => 'col-xl-3 col-md-6 '
      ],
      'Slider' => [
        'jumlah'  => count($sliders),
        'color'   => 'primary',
        'icon'    => '',
        'size'    => 'col-xl-3 col-md-6 '
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
              <i class="{{ $val['icon'] }} fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
</div>

@endsection
