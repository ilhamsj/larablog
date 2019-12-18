@extends('layouts.admin')

@section('title_page', 'Kegiatan')
@section('title_content')
<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="tambah_data">
  <i class="fa fa-plus-circle fa-sm text-white-50" aria-hidden="true"></i>
  Tambah Data
</a>
@endsection
@section('content')

<div class="row">
  <div class="col">
    <div class="card border-0 shadow mb-4">
      <a href="#collapseCardExample" class="d-block card-header py-3 border-0" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Data</h6>
      </a>
      <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Action</th>
                  <th>Title</th>
                  <th>Kategori</th>
                  <th>Document</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDocuments" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="">
          <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="helpId">
          </div>

          <div class="form-group">
            <label for="">Kategori</label>
            <select class="form-control" name="category" id="category">
              <option value="Slider">Slider</option>
              <option value="Kegiatan">Kegiatan</option>
              <option value="Postingan">Dokumen</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Dokumen</label>
            <input onchange="preview_image(event)" type="file" class="form-control-file" name="file" id="file" placeholder="" aria-describedby="fileHelpId">
          </div>

          <img class="collapse img-fluid rounded" id="output_image"/>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
  $(document).ready(function () {

      // read
      var table = $('table').DataTable({
        order : [[4,'desc']],
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{route('v2.file.index')}}",
        columns: [
          { data: 'file', name: 'file' },
          { data: 'title', name: 'title' },
          { data: 'category', name: 'category' },
          { data: 'created_at', name: 'created_at' },
          { data: 'updated_at', name: 'updated_at' },
          { data: 'action', name: 'action'},
        ]
      });

      // delete
      $('table').on('click', '.btnDelete', function (e) {
        e.preventDefault()
        var url = $(this).attr('data-url');

        $.ajax({
          type: "DELETE",
          url: url,
          success: function (response) {
            console.log(response);
            table.draw()
          }
        });
      });

      // create / show modal
      $('#tambah_data').click(function (e) { 
        e.preventDefault();
        $('#modalDocuments').find('h5').text('Tambah Data')
        $('#modalDocuments').find('button:last-child').attr('id', 'btnStore').text('Simpan');
        $('#modalDocuments').find('img').hide()
        $('#modalDocuments').modal('show');
        $('#modalDocuments').find('form').trigger('reset');
      });

      // store data
      $('#modalDocuments').on('click', '#btnStore', function (e) {
        e.preventDefault();
        var form = $('#modalDocuments').find('form')[0];
        var data = new FormData(form);

        $.ajax({
          type: "POST",
          url: '{{ route("v2.file.store") }}',
          data: data,
          contentType: false,
          processData: false,
          cache: false,
          success: function (response) {
            console.log(response);
            table.draw()
            $('#modalDocuments').modal('hide')
          }
        });
      });

      // update - show modal before edit
      $('table').on('click', '.btnEdit', function (e) {
        e.preventDefault()

        var url = $(this).attr('data-url');
        $('#modalDocuments').find('h5').text('Edit Data')
        $('#modalDocuments').find('button:last-child').attr('id', 'btnUpdate').attr('data-url', url).text('Perbarui');
        $('#modalDocuments').modal('show');

        $.ajax({
          type: "GET",
          url: url,
          success: function (response) {
            var form = $('#modalDocuments > div > div > div.modal-body > form');
            $.each(response.data, function (index, value) {
              if(index != 'file') {
                $('#'+index).val(value);
              } else {
                $(form).find('img').show().attr('src', '../'+value)
              }
            });
          }
        }); // end ajax
      });

      // update
      $('#modalDocuments').on('click', '#btnUpdate', function (e) {
        e.preventDefault();
        var form = $('#modalDocuments').find('form')[0];
        var data = new FormData(form);
        data.append('_method', 'PUT');
        var id = 11;
        $.ajax({
          type: "POST",
          url: $(this).attr('data-url'),
          data: data,
          contentType: false,
          processData: false,
          cache: false,
          success: function (response) {
            console.log(response);
            table.draw();
            $('#modalDocuments').modal('hide');
          }
        });
      });      
    });

    preview_image = (event) => {
      $('#output_image').show()
      var reader = new FileReader();
      reader.onload = function()
      {
        var output = document.getElementById('output_image');
        output.src = reader.result;
      }
      reader.readAsDataURL(event.target.files[0]);
    }
    // end doc ready
</script>
@endpush