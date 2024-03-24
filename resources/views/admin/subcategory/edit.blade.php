@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update SubCategory') }}</div>

                    <form action="{{ route('subcategory.update',$data->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="disabledTextInput" class="form-label">Choose Category</label>
                              <select class="form-controll" name="category_id">
                                 @foreach ($categories as $row )
                                   <option value="{{ $row->id }}" @if($row->==$data->category_id) selected @endif> {{ $row->category_name }}</option>
                                 @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                            <label for="disabledTextInput" class="form-label">SubCategory Name</label>
                            <input type="text" name="subcategory_name" id="disabledTextInput"
                            class="form-control @error('subcategory_name') is-invalid @enderror" value="{{ old($data->subcategory_name) }}"
                            placeholder="SubCategory Name">
                            @error('subcategory_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                          </div>
                          <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
