@extends('layouts.user')

@section('title_page', 'Ini halaman title')

@section('content')

<header class="masthead">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="post-heading row justify-content-center align-items-center">
          <div class="col text-center">
            <h1>{{ $item->title }}</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="container" style="margin: 100px auto">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-9 pr-4">
      <div class="row">
        <div class="col-12 mb-4">
          <h1>{{ $item->title }}</h1>
          {{ $item->created_at->format('d F Y') }} / <a href="" class="badge badge-primary"> {{ $item->category}}</a>
        </div>
        <div class="col-12 mb-4">
          <img src="{{ secure_url($item->cover) }}" class="img-fluid rounded" alt="" srcset="">
        </div>
        <div class="col-12 mb-4" id="content">
          {!! $item->content !!}
        </div>
        <div class="col-12">
          <h3>Komentar</h3>
          <hr>
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

            <button type="submit" class="btn btn-primary">Komentari</button>
          </form>
        </div>

        <div class="w-100"></div>
      </div>
    </div>

    <div class="col">
      <div class="row">
        <div class="col-12">
          <span class="badge badge-primary">Pengumuman Terbaru</span>
          <hr>

          @foreach ($articles as $item)
            <p>
              <a href="{{ route('user.artikel.show', $item->id) }}">{{ $item->title }}</a>
            </p>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('styles')
<style>
  body {
    background-color: white
  }
</style>
@endpush

@push('scripts')
<script>

  $('#content').find('span').removeAttr('style');
  $('#content').find('img').toggleClass('note-float-right rounded img-fluid').removeAttr('style');

  
</script>
@endpush