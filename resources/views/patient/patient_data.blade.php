@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 mb-4">
            <h3 class="font-weight-bold">{{$patient->firstname}} {{$patient->lastname}}</h3>
            <h6 class="font-weight-normal mb-0">Patient's Statistical data</h6>
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-primary" href="{{route('patient.index')}}">
                <i class="ti-angle-left"></i> Back
             </a>
        </div>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">ECG Graph</h4>
                <canvas id="ecg_data_chart"></canvas>
              </div>
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="patient_data">
                  <thead>
                    <tr>
                      <th>
                        #
                      </th>
                      <th>
                        ECG Data
                      </th>
                      <th>
                          Status
                      </th>
                      <th>
                        Recorded At
                      </th>
                    </tr>
                  </thead>
                 <tbody>
                      @forelse ($ecgDatas as $ecg)
                          <tr>
                              <td>{{$loop->iteration++}}</td>
                              <td>{{$ecg->data}}</td>
                              <td>
                                @if ($ecg->data != 0)
                                  <label class="badge badge-outline-success">Normal</label>
                                @else
                                  <label class="badge badge-outline-danger">Critical</label>
                                @endif
                              </td>
                              <td>{{$ecg->created_at}}</td>
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
      $('#patient_data').DataTable();
      $(document).ready(function(){
            setInterval(function(){
                $('#average_emission').val()
                var url = "{{url('chart/data/'.$patient->id)}}";
        var dateTime = new Array();
        var ecgData = new Array();
            $.get(url, function(response){
                response.forEach(function(data){
                    dateTime.push(data.recorded_time);
                    ecgData.push(data.data);
                });
                var ecgChart = document.getElementById("ecg_data_chart").getContext('2d');

                var ecgDiagram = new Chart(ecgChart, {
                    type: 'line',
                    data: {
                        labels:dateTime,
                        datasets: [{
                            label: 'ECG Level',
                            data: ecgData,
                            borderWidth: 3,
                            borderColor: 'rgb(0, 127, 212)',
                            fill:false,
                            tension: 0.3,
                            pointRadius: 0
                        }]
                    },
                    options: {
                        animation:{
                            duration: 0
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true,
                                    userCallback: function(value, index, values) {
                                        value = value.toString();
                                        value = value.split(/(?=(?:...)*$)/);
                                        value = value.join(',');
                                        return value;
                                    }
                                }
                            }],

                            xAxes: [{
                                gridLines: {
                                    color: '#f2f3f8'
                                },
                                ticks: {
                                    display: false //this will remove only the label
                                }
                            }]
                        },
                    }
                });
            });
            },1000)

        });
    </script>
@endpush
