@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Category') }}</div>

                <div class="card-body"><a href="{{route('category.index')}}">All Category</a>

                    <br><br>

                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                          <div class="form-group">
                            <label for="disabledTextInput" class="form-label">Category Name</label>
                            <input type="text" name="category_name" id="disabledTextInput"
                            class="form-control @error('category_name') is-invalid @enderror"
                            placeholder="Category Name">
                            @error('category_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                          </div>
                          <br><br>
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
