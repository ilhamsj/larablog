@extends('layouts.admin')

@section('title_page', 'Publikasi')
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
      <a href="#collapseCardExample" class="d-block card-header py-3 border-0" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Collapsable Card Example</h6>
      </a>
      <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                          <th>Title</th>
                          <th>Created at</th>
                          <th>ِِAksi</th>
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
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal Title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          @csrf
          <div class="form-group">
            <label for="">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="" value="{{ old('email') ? old('email') : \Faker\Factory::create()->realText(50, 1) }}">
          </div>

          <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" rows="10">{{ old('content') ? old('content') : \Faker\Factory::create()->realText(200, 1) }}</textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="publishContent">Save</button>
      </div>
    </div>
  </div>
</div>

@endsection

@push('styles')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@push('scripts')
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> 
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> 

  <script>
    $(document).ready(function () {

      // read
      var table = $('table').DataTable({
          order : [[1,'desc']],
          responsive: true,
          processing: true,
          serverSide: true,
          ajax: "/api/v1/artikel",
          columns: [
              { data: 'title', name: 'title' },
              { data: 'created_at', name: 'created_at' },
              { data: 'action', name: 'action' }
          ]
      });

      // modal show
      $('#tambah_data').click(function (e) { 
        e.preventDefault();
        $('#modelId').modal('show');
      });

      $('#publishContent').click(function (e) { 
        e.preventDefault();
        $.ajax({
          type: "POST",
          url: "{{ route('artikel.store') }}",
          data: $('#modelId').find('form').serialize(),
          success: function (response) {
            $('#modelId').modal('hide')
            table.draw()
          }
        });
      });

      $('#modelId').on('hidden.bs.modal', function () {
          var form = $('#modelId form');
          form.trigger('reset');
      });
    });
  </script>
@endpush