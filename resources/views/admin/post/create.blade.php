@extends('layouts.app')

@section('content')
<div class="container mt-5 ">
    <div class="row">
        <div class="col-md-9">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add New Post</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail4">Post Title</label>
                      <input type="text" class="form-control" id="exampleInputEmail4" name="title"
                      placeholder="Post Title" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword3">Category</label>
                       <select class="form-control" name="category_id" id="exampleInputPassword3">
                        <option value="">Example One</option>
                       </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Sub Category</label>
                         <select class="form-control" name="subcategory_id" id="exampleInputPassword1">
                          <option>Example One</option>
                         </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Post Date</label>
                        <input type="date" name="post_date" required class="form-control">
                      </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Sub Category</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush
