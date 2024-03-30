@extends('layouts.app')

@section('content')
<div class="container mt-5 ">
    <div class="row">
        <div class="col-md-9">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit Post</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
                  @csrf
                  {{-- <input type="hidden" name="id" value="{{ $post->id }}"> --}}
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail4">Post Title</label>
                      <input type="text" class="form-control" value="{{ $post->title }}" name="title"
                      placeholder="Post Title" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword3">Category</label>
                       <select class="form-control" name="subcategory_id" id="exampleInputPassword3">
                        <option value="">Choose Category</option>
                        @foreach ($category as $cat )
                        @php
                            $subcategories=DB::table('subcategories')->where('category_id',$cat->id)->get();
                        @endphp
                            <option disabled class="text-danger">{{$cat->category_name}}</option>
                            @foreach ($subcategories as $sub )
                               <option value="{{ $sub->id }}" class="text-success" @if($sub->id==$post->subcategory_id) selected @endif>----{{$sub->subcategory_name}}</option>
                            @endforeach
                        @endforeach

                       </select>
                    </div>
                    {{-- <div class="form-group">
                        <label for="exampleInputPassword1"> Sub Category</label>
                         <select class="form-control" name="subcategory_id" id="exampleInputPassword1">
                          <option>Example One</option>
                         </select>
                      </div> --}}
                      <div class="form-group">
                        <label for="exampleInpu1tPassword1">Post Date</label>
                        <input type="date" name="post_date" id="exampleInpu1tPassword1" required class="form-control" value="{{ $post->post_date }}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPa3ssword1">Tages</label>
                        <input type="text" name="tags" class="form-control" id="exampleInputPa3ssword1" required value="{{ $post->tags }}">
                      </div>
                      <div class="form-group">
                        <label for="summernote">Description</label>
                        <textarea class="form-control summernote" name="description" rows="4">{{ $post->description }}</textarea>
                      </div>
                    <div class="form-group">
                      <label for="exampleInputFile">File Input</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="image" class="custom-file-input" id="exampleInputFil4e">
                          <label class="custom-file-label" for="exampleInputFil4e">Choose file</label>
                        </div>
                        <input type="hidden" name="old_image" value="{{ $post->image }}">
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" name="status" value="1" class="form-check-input" @if($post->status==1) checked @endif id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Publish Now </label>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
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
