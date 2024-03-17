
@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Change Password') }}</div>

                <div class="card-body">

                    @if(session()->has('success'))
                        <strong class="text-success">{{ session()->get('success') }}</strong>
                    @endif

                    @if(session()->has('error'))
                    <strong class="text-danger">{{ session()->get('error') }}</strong>
                    @endif

                    <form method="POST" action="{{ route('update.password') }}">
                        @csrf
                        <div class="mb-3">
                          <label>Carrent Password</label>
                          <input type="password" name="current_password" placeholder="Carrent Password" class="form-control"
                          >
                        </div>

                        <div class="mb-3">
                            <label>New Password</label>
                            <input type="password" name="new_password" class="form-control @error('email') is-invalid @enderror" placeholder="New Password"
                            >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control " placeholder="Confirm Password"
                            >
                        </div>

                        <button type="submit" class="btn btn-primary">Password Change</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>





@endsection
