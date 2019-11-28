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
                        </tr>
                    </thead>
                </table>
            </div> 
        </div>
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
          responsive: true,
          processing: true,
          serverSide: true,
          ajax: "{{ route('artikel.index') }}",
          columns: [
              { data: 'title', name: 'title' },
              { data: 'created_at', name: 'created_at' },
          ]
      });
      
    });
  </script>
@endpush