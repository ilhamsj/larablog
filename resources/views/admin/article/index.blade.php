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
  @for ($i = 0; $i < 10; $i++)
    <div class="col-12 col-md-4">
      <div class="card border-0 shadow mb-4">
        <a href="#collapse{{ $i }}" class="d-block card-header py-3 border-0" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapse{{ $i }}">
          <h6 class="m-0 font-weight-bold text-primary">Collapsable Card Example</h6>
        </a>
        <div class="collapse show" id="collapse{{ $i }}">
          <div class="card-img-top">
            <img class="img-fluid" data-src="holder.js/1366x768?random=yes&texmode=exact&auto=yes" alt="" srcset="">
          </div>
          <div class="card-body">
            This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
            This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
          </div>
        </div>
      </div>
    </div>
  @endfor
</div>
@endsection

@push('scripts')
<script src="https://cdn.rawgit.com/imsky/holder/master/holder.js"></script>
@endpush