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
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Category Name</label>
                          <input type="text" class="form-control" name="category_name" id="exampleInputEmail1"
                           aria-describedby="emailHelp" placeholder="Category Name" required>
                          <div id="emailHelp" class="form-text">Write Your Category Name</div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
