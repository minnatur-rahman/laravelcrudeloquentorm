@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active"> Post Table</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">All Posts</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Category</th>
                            <th>Subcategory</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>publish</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $key => $row)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $row->category->category_name }}</td>
                            <td>{{ $row->subcategory->subcategory_name }}</td>
                            <td>{{ $row->user->name }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ date('d F y',strtotime($row->post_date)) }}</td>
                            <td>
                                @if($row->status==1)
                                <span class="badge badge-success"> Active</span>
                                @else
                                <span class="badge badge-success"> Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('post.edit',$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ route('post.delete',$row->id) }}" class="btn btn-sm btn-danger delete" id="delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
          </div>
        </div>
      </div>
    </section>
@endsection
