@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 mb-4">
            <h3 class="font-weight-bold">Edit Patient</h3>
            <h6 class="font-weight-normal mb-0">{{$patient->firstname}} {{$patient->lastname}}</h6>
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-primary" href="{{route('patient.index')}}">
                <i class="ti-angle-left"></i> Back
             </a>
        </div>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <form action="{{route('patient.update', $patient->id)}}" method="POST">
                  @method('PUT')
                  @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                                <p class="card-description">
                                  Personal Information
                                </p>
                                  <div class="form-group">
                                    <label for="firstname">Firstname</label>
                                    <input type="text" class="form-control" id="firstname" placeholder="Ex: John" name="firstname" value="{{$patient->firstname}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="lastname">Lastname</label>
                                    <input type="text" class="form-control" id="lastname" placeholder="Ex: Doe" name="lastname" value="{{$patient->lastname}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Password" name="email" value="{{$patient->email}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="phoneNumber">Phone number</label>
                                    <input type="number" class="form-control" id="phone_number" placeholder="Ex: 250788000000" name="phone_number" value="{{$patient->phone_number}}">
                                  </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <p class="card-description">
                                  Other Information
                                </p>
                                  <div class="form-group">
                                    <label for="exampleInputUsername1">District</label>
                                    <input type="text" class="form-control" id="district" placeholder="Ex: Nyarugenge" name="district" value="{{$patient->district}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Province/City</label>
                                    <input type="text" class="form-control" id="province" placeholder="Ex: Kigali" name="province" value="{{$patient->province}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Other Information</label>
                                    <textarea name="comments" id="comments" class="form-control" cols="30" rows="9" placeholder="Any Comment">{{$patient->other_information}}</textarea>
                                  </div>
                                  <div class="text-right">
                                    <button type="submit" class="btn btn-primary mt-3 mb-2 w-50">Update</button>
                                  </div>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
          </div>
    </div>
@endsection
