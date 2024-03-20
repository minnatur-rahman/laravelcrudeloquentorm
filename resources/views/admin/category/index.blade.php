@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Category') }}</div>

                <div class="card-body"><a href="{{route('category.create')}}">Add Category</a>

                    <br><br>
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $key => $row)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $row->category_name }}</td>
                                <td>{{ $row->category_slug }}</td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="{{ route('category.edit',$row->id) }}">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="{{ route('category.delete',$row->id) }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Category Table</li>
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
                  <h3 class="card-title">All Category</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $key => $row)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $row->category_name }}</td>
                            <td>{{ $row->category_slug }}</td>
                            <td>
                                <a class="btn btn-sm btn-info" href="{{ route('category.edit',$row->id) }}">Edit</a>
                                <a class="btn btn-sm btn-danger" href="{{ route('category.delete',$row->id) }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Rendering engine</th>
                      <th>Browser</th>
                      <th>Platform(s)</th>
                      <th>Engine version</th>
                      <th>CSS grade</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
          </div>
        </div>
      </div>
    </section>
@endsection
