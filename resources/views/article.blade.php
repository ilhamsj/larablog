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
          {{ $item->created_at->format('d F Y') }} / {{ count($item->Review)}} Komentar / <a href="" class="badge badge-primary"> {{ $item->category}}</a> 
        </div>
        <div class="col-12 mb-4">
          <img src="{{ secure_url($item->cover) }}" class="img-fluid rounded" alt="" srcset="">
        </div>
        <div class="col-12 mb-4" id="content">
          {!! $item->content !!}
        </div>
        <div class="w-100"><hr></div>
        <div class="col-12 mb-4">
          <h3>{{ count($item->Review) }} Komentar</h3>
        </div>
        <div class="col-12">
          @foreach ($item->Review as $key => $value)
            <h5>{{ $value->name }}</h5>
            {{ $value->created_at->format('F d, Y') }}
            <p>{{ strip_tags($value->content) }}</p>
          @endforeach
        </div>

        <div class="col-12">
          <h3>Tulis Komentar</h3>
          <hr>
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

        <div class="w-100"></div>
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
  
  $('#formKomentar').on('submit', function (e) {
    e.preventDefault()

    var data = $('#formKomentar').serialize()
    // console.log(data);
    
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
</script>
@endpush