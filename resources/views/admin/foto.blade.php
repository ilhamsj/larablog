@extends('layouts.admin')

@section('title_content')
  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="tambah_data">
    <i class="fa fa-plus-circle fa-sm text-white-50" aria-hidden="true"></i>
    Tambah Data
  </a>
@endsection
@section('content')

<div class="row" id="foto">
  <div class="col-4">
    <div class="card shadow mb-4">
      <div class="card-header">
          <h6 class="m-0 font-weight-bold text-primary">Foto</h6>
      </div>
      <div class="card-body">
        <img class="img-fluid rounded" src="https://an-naba.test/images/516268-PIISNV-188.jpg"/>
      </div>
      <div class="card-footer">
        <a href="#" class="btn btn-primary btn-icon-split btn-sm">
          <span class="icon text-white-50"><i class="fas fa-copy"></i>
          </span>
        </a>
        <a href="#" class="btn btn-danger btn-icon-split btn-sm">
          <span class="icon text-white-50"><i class="fas fa-trash-alt"></i>
          </span>
        </a>

      </div>
    </div>
  </div>
</div>

@endsection

@push('styles')
@endpush

@push('scripts')
  <script>
    $(document).ready(function () {

      $.ajax({
        type: "GET",
        url: "{{ route('file.index') }}",
        success: function (response) {
          var no = 1;
          $.map(response, function (value, key) {
            var foto = $('#foto > div:first-child').clone();
            $(foto).find('h6').text(value);
            $(foto).find('img').attr('src', '../images/'+value);
            $('#foto').append(foto);
          });
          $('#foto > div:first-child').remove();
        }
      });
    }); // end doc ready
  </script>
@endpush