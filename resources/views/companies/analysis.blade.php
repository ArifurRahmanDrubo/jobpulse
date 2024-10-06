
@extends('companies.dashboard')

@section('content')
   <div class="row">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4 ml-5">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">weekend</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Total Applied Job</p>
            <h4 class="mb-0">{{ $details }}</h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer  p-3">
          <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4 ml-5">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">person</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Total Post Job</p>
            <h4 class="mb-0">{{ $totalJobPost }}</h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p>
        </div>
      </div>
    </div>
  </div>  
  @endsection  