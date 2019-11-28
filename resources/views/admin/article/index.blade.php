@extends('layouts.admin')

@section('title_page', 'Publikasi')
@section('title_content')
  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    <i class="fa fa-plus  fa-sm text-white-50" aria-hidden="true"></i>
    Tambah Data
  </a>
@endsection
@section('content')
<div class="row">
  @foreach ($items as $item)
    <div class="col-12 col-md-4">
      <div class="card border-0 shadow mb-4">
          <div class="card-img-top">
            <img class="img-fluid" data-src="holder.js/1366x768?random=yes&texmode=exact&auto=yes" alt="" srcset="">
          </div>
          <div class="card-body">
            <h6 class="m-0 font-weight-bold text-primary">{{ $item->title }}</h6>
            {{ $item->content }}

          </div>
          <div class="card-body">
            <a href="" class="btn btn-secondary">
              <i class="fas fa-pencil-alt    "></i>
            </a>
            <a href="" class="btn btn-danger">
              <i class="fas fa-trash-alt    "></i>
            </a>
          </div>
      </div>
    </div>
  @endforeach
</div>

@endsection

@push('scripts')
<script src="https://cdn.rawgit.com/imsky/holder/master/holder.js"></script>
@endpush