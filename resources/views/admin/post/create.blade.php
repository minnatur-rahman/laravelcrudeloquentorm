@extends('layouts.app')

@section('content')
<div class="container mt-5 ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Post') }}</div>
                  <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                         <div class="form-group">
                            <label for="disabledTextInput" class="form-label">Choose Category</label>
                              <select class="form-controll" name="category_id">
                                 {{-- @foreach ($categories as $row )
                                   <option value="{{ $row->id }}"> {{ $row->category_name }}</option>
                                 @endforeach --}}
                                 <option value="">Choose Category</option>
                              </select>
                          </div>
                          <div class="form-group">
                            <label for="disabledTextInput" class="form-label">Title</label>
                            <input type="text" name="title" id="disabledTextInput"
                            class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                            placeholder="Post Title">
                            @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush
