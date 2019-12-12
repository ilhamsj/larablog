@extends('layouts.admin')

@section('title_page', 'Dashboard')
@section('title_content')
  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
  </a>
@endsection

@section('content')
<div class="row">
  @for ($i = 0; $i < 4; $i++)
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pending Requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endfor
</div>

<div class="row">
  @for ($i = 0; $i < 4; $i++)
  <div class="col-6">
    <div class="card shadow mb-4">
      <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Collapsable Card </h6>
      </div>
      <div class="card-body">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos corporis hic dolor vel, nam dolorum voluptatem consectetur dolorem cumque placeat, iure aliquid? Labore aliquam officia non velit illum sunt unde!
      </div>
    </div>
  </div>
  @endfor

</div>
@endsection
