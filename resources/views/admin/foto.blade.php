@extends('layouts.admin')

@section('title_content')
  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="tambah_data">
    <i class="fa fa-plus-circle fa-sm text-white-50" aria-hidden="true"></i>
    Tambah Data
  </a>
@endsection
@section('content')

<div class="row" id="foto">
  <div class="col-6 col-sm-6 col-md-4">
    <div class="card shadow mb-4">
      <div class="card-header">
          <h6 class="m-0 font-weight-bold text-primary">Foto</h6>
      </div>
      <div class="card-body">
        <img class="img-fluid rounded" src=""/>
      </div>
      <div class="card-footer">

        <a href="#" class="copyFoto btn btn-primary btn-icon-split btn-sm">
          <span class="icon text-white-50"><i class="fas fa-copy"></i>
          </span>
        </a>
        <input type="text" value="" class="form-control form-control-sm collapse">
      
        <a href="#" class="hapusFoto btn btn-danger btn-icon-split btn-sm">
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
  <script>
    $(document).ready(function () {



      showImages()

      function showImages() {
        $.ajax({
          type: "GET",
          url: "{{ route('file.index') }}",
          success: function (response) {
            var no = 1;
            $.map(response, function (value, key) {
              var foto = $('#foto > div:first-child').clone();
              $(foto).find('h6').text(value);
              $(foto).find('img').attr('src', '../images/'+value);
              $(foto).find('input').attr('value', '{{ env("APP_URL") }}images/'+value).attr('id', 'foto'+key);
              $(foto).find('a:first-child').attr('data-clipboard-target', '#foto'+key);
              $(foto).find('.hapusFoto').attr('data-url', value);
              $('#foto').append(foto);
            });
            $('#foto > div:first-child').remove();
          }
        });
      } 

      new ClipboardJS('.copyFoto');

      $('#foto').on('click', '.copyFoto', function (e) {
        console.log($(this).next().attr('value'));
      });

      $('#foto').on('click', '.hapusFoto', function (e) {
        e.preventDefault()
        var x = $(this).attr('data-url');
        $.ajax({
          type: "DELETE",
          url: "../api/v1/file/"+x,
          data: '',
          success: function (response) {
            showMessage(response + ' Berhasil dihapus')
            $('#foto > div').not(':first-child').remove();
            showImages()
          }
        });
      });

    }); // end doc ready
  </script>
@endpush