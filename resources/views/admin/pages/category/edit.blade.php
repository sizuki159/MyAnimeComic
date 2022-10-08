@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category Form</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Category</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{ route('admin.category.update') }}">
                                @csrf
                                <div class="card-body">

                                    @if (\Session::has('message'))
                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">&times;</button>
                                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                                            {!! \Session::get('message') !!}
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                        <input value="{{$category->name}}" type="text" class="form-control" name="name" id="name"
                                            placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control select2" style="width: 100%;">
                                            <option {{$category->status ==  "active" ? "selected" : ""}} value="active">Active</option>
                                            <option {{$category->status ==  "disabled" ? "selected" : ""}} value="disabled">Disable</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="id" value="{{$category->id}}">
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
