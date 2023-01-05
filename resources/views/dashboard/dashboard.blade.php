@extends('layouts.app')

@section('content')
    <div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <h3 class="font-weight-bold">Welcome {{auth()->user()->name}}</h3>
                <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 pending reports!</span></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4 stretch-card transparent">
              <div class="card card-tale">
                <div class="card-body">
                  <p class="mb-4">Pending Reports</p>
                  <p class="fs-30 mb-2">4,000</p>
                  {{-- <p>10.00% (30 days)</p> --}}
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-4 stretch-card transparent">
              <div class="card card-dark-blue">
                <div class="card-body">
                  <p class="mb-4">Total Patients</p>
                  <p class="fs-30 mb-2">{{$patient}}</p>
                  {{-- <p>22.00% (30 days)</p> --}}
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection