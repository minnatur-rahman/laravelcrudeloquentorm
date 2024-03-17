
@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Change Password') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('update.password') }}">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Carrent Password</label>
                          <input type="password" name="old_password" placeholder="Carrent Password" class="form-control "
                          id="exampleInputPassword1">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">New Password</label>
                            <input type="password" name="new_password" class="form-control @error('email') is-invalid @enderror" placeholder="New Password"
                            id="exampleInputPassword1">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control " placeholder="Confirm Password"
                            id="exampleInputPassword1">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>





@endsection
