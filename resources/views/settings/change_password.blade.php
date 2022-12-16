@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 mb-4">
            <h3 class="font-weight-bold">Change your password</h3>
            <h6 class="font-weight-normal mb-0">Fill the form below.</h6>
        </div>
        <div class="col-md-6 text-right">
            
        </div>
        <div class="col-md-12">
            @include('layouts.partials.notification')
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <form action="{{route('setting.update', auth()->user()->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <p class="card-description">
                            Reset password
                        </p>
                        <div class="form-group">
                        <label for="firstname">Current password</label>
                        <input type="password" class="form-control" id="current_password" name="currentPassword">
                        </div>
                        <div class="form-group">
                        <label for="lastname">New password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                        <label for="email">Confirm password</label>
                        <input type="password" class="form-control" id="confirmation" name="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 mb-2 w-50">Change</button>
                    </div>
                </form>
            </div>
          </div>
    </div>
@endsection
