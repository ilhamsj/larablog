@extends('layouts.admin')

@section('title_page', 'Pengguna')
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
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Role</th>
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
          
          <!-- name -->
          <div class="form-group">
            <label for="name">name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
          </div>
          
          <!-- email -->
          <div class="form-group">
            <label for="email">email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId">
          </div>
          
          <!-- password -->
          <div class="form-group">
            <label for="password">password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId">
          </div>
          
          <!-- password_confirmation -->
          <div class="form-group">
            <label for="password_confirmation">password_confirmation</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="" aria-describedby="helpId">
          </div>

          <div class="form-group">
            <label for="role">role</label>
            <select class="form-control" name="role" id="role">
              <option value="admin">admin</option>
              <option value="user">user</option>
            </select>
          </div>
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
        ajax: "{{route('user.index')}}",
        columns: [
          { data: 'action', name: 'action'},
          { data: 'name', name: 'name' },
          { data: 'email', name: 'email' },
          { data: 'role', name: 'role' },
          { data: 'created_at', name: 'created_at' },
          { data: 'updated_at', name: 'updated_at' },
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
        $('#modalDocuments').modal('show');
        $('#modalDocuments').find('form').trigger('reset');
      });

      // store data
      $('#modalDocuments').on('click', '#btnStore', function (e) {
        e.preventDefault();
        var data = $('#modalDocuments').find('form').serialize()

        $.ajax({
          type: "POST",
          url: '{{ route("user.store") }}',
          data: data,
          success: function (response) {
            console.log(response);
            table.draw()
            $('#modalDocuments').modal('hide')
          },
          error: function (xhr) {
            $.each(xhr.responseJSON.errors, function (index, value) { 
              alert(value[0])
            });
          }
        });
      });

      // update - show modal before edit
      $('table').on('click', '.btnEdit', function (e) {
        e.preventDefault()

        var url = $(this).attr('data-url');

        $('#modalDocuments').find('button:last-child').attr('id', 'btnUpdate').attr('data-url', url).text('Perbarui');
        $('#modalDocuments').modal('show');
        $('#modalDocuments').find('h5').text('Edit Data')

        $.ajax({
          type: "GET",
          url: url,
          success: function (response) {
            console.log(response);
            $.each(response, function (index, value) {
                $('#'+index).val(value);
            });
          }
        }); // end ajax
      });

      // update
      $('#modalDocuments').on('click', '#btnUpdate', function (e) {
        e.preventDefault();
        var data = $('#modalDocuments').find('form').serialize();

        $.ajax({
          type: "PUT",
          url: $(this).attr('data-url'),
          data: data,
          success: function (response) {
            console.log(response);
            table.draw();
            $('#modalDocuments').find('form').trigger('reset');
            $('#modalDocuments').modal('hide');
          },
          error: function (xhr) {
            $.each(xhr.responseJSON.errors, function (index, value) { 
              alert(value[0])
            });
          }
        });
      });      
    });
    // end doc ready
</script>
@endpush