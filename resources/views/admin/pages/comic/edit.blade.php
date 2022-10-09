@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Comic Form</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Comic</li>
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
                                <h3 class="card-title">Edit Comic</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{ route('admin.comic.update') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <p class="text-danger">{{ $errors->first('title') }}</p>
                                        <input value="{{$comic->title}}" type="text" class="form-control" name="title" id="title"
                                            placeholder="Enter Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="author">Author</label>
                                        <p class="text-danger">{{ $errors->first('author') }}</p>
                                        <input value="{{$comic->author}}" type="text" class="form-control" name="author" id="author"
                                            placeholder="Enter Author">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control select2" style="width: 100%;">
                                            <option {{$comic->status ==  "active" ? "selected" : ""}} value="active">Active</option>
                                            <option {{$comic->status ==  "disabled" ? "selected" : ""}} value="disabled">Disable</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="category_id" class="form-control select2" style="width: 100%;">
                                            @foreach ($categories as $category)
                                            <option {{optional($comic->category)->id == $category->id ? "selected" : ""}} value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="comic_id" value="{{$comic->id}}">
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
