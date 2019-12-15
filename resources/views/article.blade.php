@extends('layouts.user')

@section('title_page', 'Ini halaman title')

@section('content')

<!-- Page Header -->
<header class="masthead" style="background-image: url('../{{$item->cover}}'); background-size: cover; background-position: center">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg col-md-10 mx-auto">
        <div class="post-heading">
          <h1>{{ $item->title }}</h1>
          <span class="meta">
            Posted by <a href="#">Admin</a> / 
            on {{ $item->created_at->format('F d, Y') }} / 
            at <a href="#">{{ $item->category}}</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</header>

<article>
  <div class="container" style="margin-bottom:50px">
    <div class="row">
      <div class="col-lg-9 pr-4 mx-auto">
        <div class="card mb-4 p-0">
          <div class="card-body">
            <h1>{{ $item->title }}</h1>
          </div>
          <div class="card-body" id="content">
            {!! $item->content !!}
          </div>
        </div>

        <div class="card mb-4">
          <div class="card-body">
            <h2 class="card-title">
              {{ count($item->Review) }} Komentar
            </h2>
            <p class="card-text">Baca komentar terlebih dahulu</p>
          </div>
          <ul class="list-group list-group-flush">
            @foreach ($item->Review as $key => $value)
            <li class="list-group-item">
              <h3>{{ $value->name }}</h3>
              {{ $value->created_at->format('F d, Y') }}
              <p>{{ strip_tags($value->content) }}</p>
            </li>
            @endforeach
          </ul>
        </div>

        <div class="card">
          <div class="card-body">
            <h2 class="card-title">
              Tulis Komentar
            </h2>
          </div>
          <div class="card-body">
            <form action="" id="formKomentar">
              @csrf
              <input type="text" name="article_id" id="article_id" value="{{ $item->id }}" hidden>
              <input type="text" name="category" id="category" class="form-control" placeholder="" aria-describedby="helpId" value="Komentar" hidden>
  
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
        </div>
      </div>
      <div class="col">
        <div class="card mb-4">
          <div class="card-body">
            <span class="btn btn-info btn-block">Pengumumuman</span>
          </div>
          <ul class="list-group list-group-flush">
            @foreach ($news as $item)
              <li class="list-group-item mb-4">
                <span class="badge badge-light">{{ $item->created_at->format('d F Y') }}</span>
                <a href="">{{ $item->title }}</a>
              </li>
            @endforeach
          </ul>
        </div>

        <div class="card">
          <div class="card-body">
            <span class="btn btn-info btn-block">Dokumen</span>
          </div>
          <ul class="list-group list-group-flush">
            @foreach ($documents as $item)
              <li class="list-group-item mb-4">
                {{ $item->title }}
                <i class="fa fa-download" aria-hidden="true"></i>
                <a href="../{{ $item->file }}" target="_blank">
                  <u> Download</u>
                </a>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</article>
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
  
  $('#formKomentar').on('submit', function (e) {
    e.preventDefault()

    var data = $('#formKomentar').serialize()
    
    $.ajax({
      type: "POST",
      url: "{{ route('review') }}",
      data: data,
      success: function (response) {
        $('#formKomentar').trigger('reset');
        alert(response.status + ' Reload your browser')
      },
      error: function (xhr) {
        $.each(xhr.responseJSON.errors, function (index, value) { 
          alert(value[0])
        });
      }
    });
  });

  $('.card').toggleClass('mb-4 border-0');
  $('.card-body').toggleClass('px-0');
  $('.list-group-item').toggleClass('p-0');
</script>
@endpush
