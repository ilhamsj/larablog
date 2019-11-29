@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col">
    <div class="card border-0 shadow mb-4">
      <a href="#collapseCardExample" class="d-block card-header py-3 border-0 bg-primary " data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-light">Collapsable Card Example</h6>
      </a>
      <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
          <form method="POST">
            @csrf
            <div class="form-group">
              <label for="">Title</label>
              <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="" value="{{ old('email') ? old('email') : \Faker\Factory::create()->realText(50, 1) }}">
            </div>

            <div class="form-group">
              <label for="content">Content</label>
              <textarea class="form-control" name="content" id="content" rows="">{{ old('content') ? old('content') : \Faker\Factory::create()->realText(2000, 1) }}</textarea>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form> 
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('styles')
  {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet"> --}}
@endpush

@push('scripts')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script> --}}
<script>

    $('form').submit(function (e) { 
      e.preventDefault();

      var x = $('form').serialize()
      $.ajax({
        type: "POST",
        url: "/api/v1/artikel",
        data: x,
        success: function (response) {
          console.log(response);
        }
      });
    });

    $('form') .find('#content').summernote({
        tabsize: 2,
        height: 500,
        followingToolbar: false,
        callbacks: {
          onImageUpload: function(files) {
            uploadImage(files[0])
          }
        }
    });

    function uploadImage(files) {

      var data = new FormData();
      data.append("file", files);
      
      $.ajax({
        type: "POST",
        url: "/api/v1/file",
        contentType: false,
        cache: false,
        processData: false,
        data: data,
        success: function (response) {
          console.log(response);
          $('form').find('#content').summernote('insertImage', response);
        }
      });
    }
</script>
@endpush