@extends('layouts.app')

@section('content')
<div class="container mt-5 ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New SubCategory') }}</div>
                  <div class="card-body">
                    <form action="{{ route('subcategory.store') }}" method="POST">
                        @csrf
                         <div class="form-group">
                            <label for="disabledTextInput" class="form-label">Choose Category</label>
                              <select>
                                @fo
                                <option></option>
                              </select>
                          </div>
                          <div class="form-group">
                            <label for="disabledTextInput" class="form-label">SubCategory Name</label>
                            <input type="text" name="subcategory_name" id="disabledTextInput"
                            class="form-control @error('subcategory_name') is-invalid @enderror" value="{{ old('subcatetory_name') }}"
                            placeholder="Category Name">
                            @error('subcategory_name')
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
