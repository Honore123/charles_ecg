@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 mb-4">
            <h3 class="font-weight-bold">Manage Patients</h3>
            <h6 class="font-weight-normal mb-0">Total Patients: <span class="text-primary">{{$patients->count()}}</span></h6>
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-primary" href="{{route('patient.add')}}">
                <i class="ti-plus"></i> Add Patient
             </a>
        </div>
        <div class="col-md-12">
          @include('layouts.partials.notification')
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                
                <div class="table-responsive">
                  <table class="table table-bordered table-hover" id="patientTable">
                    <thead>
                      <tr>
                        <th>
                          #
                        </th>
                        <th>
                          Names
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Phone Number
                        </th>
                        <th>
                            Location
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                          Actions
                        </th>
                      </tr>
                    </thead>
                   <tbody>
                        @forelse ($patients as $patient)
                            <tr>
                                <td>{{$loop->iteration++}}</td>
                                <td>{{$patient->lastname}} {{$patient->firstname}}</td>
                                <td>{{$patient->email}}</td>
                                <td>{{$patient->phone_number}}</td>
                                <td>{{$patient->district}}-{{$patient->province}}</td>
                                <td>
                                  @if ($patient->status == 0)
                                  <label class="badge badge-outline-success">Normal</label>
                                  @elseif($patient->status = 1)
                                  <label class="badge badge-outline-danger">Critical</label>
                                  @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-outline-primary py-2 dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        Action
                                        </button>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item py-3" href="{{route('patient.data',$patient->id)}}">ECG Data</a>
                                        <a class="dropdown-item py-3" href="{{route('patient.edit',$patient->id)}}">Edit</a>
                                        <a class="dropdown-item py-3" href="#">Remove</a>
                                        </div>
                                  </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                   </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#patientTable').DataTable();
    </script>
@endpush