@extends('layouts.user')

@section('title_page', Auth::user()->name)

@section('header')
<header class="masthead" style="background-color: #32373D">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg col-md-10 mx-auto">
        <div class="post-heading">
          <h1>{{ Auth::user()->name }}</h1>
          <span class="meta">
              {{ Auth::user()->role }}
          </span>
        </div>
      </div>
    </div>
  </div>
</header>
@endsection

{{-- @section('content')
  <div class="card mb-4 p-0">
    <div class="card-body" id="content">
    </div>
  </div>
@endsection --}}

@push('styles')
<style>
  body {
    background-color: white
  }

  #ini_content {
    top: -155px;
    position: relative;
  }
</style>
@endpush

@push('scripts')
@endpush
