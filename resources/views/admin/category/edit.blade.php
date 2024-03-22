@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Category') }}</div>

                    <form action="{{ route('category.update',$data->id) }}" method="POST">
                        @csrf
                          <div class="form-group">
                            <label for="disabledTextInput">Category Name</label>
                            <input type="text" name="category_name" id="disabledTextInput"
                            class="form-control" value="{{ $data->category_name }}">

                          </div>
                          <br><br>
                          <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
