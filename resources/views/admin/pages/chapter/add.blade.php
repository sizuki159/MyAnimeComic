@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Chapter</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Chapter</li>
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
                                <h3 class="card-title">Comic: <span
                                        style="color: yellow;"><strong>{{ $comic->title }}</strong></span></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form enctype="multipart/form-data" method="POST" action="{{ route('admin.chapter.store', ['comic' => $comic]) }}">
                                @csrf
                                <div class="card-body" id="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <p class="text-danger">{{ $errors->first('name') }}</p>

                                        <input readonly value="Chapter {{$chapter_number}}" type="text" class="form-control" name="name" id="name"
                                            placeholder="Enter Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control select2" style="width: 100%;">
                                            <option selected="selected" value="active">Active</option>
                                            <option value="disabled">Disable</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image[]">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="new_image"></div>

                                    <div class="form-group">
                                        <button type="button" name="add_image" id="add_image" class="btn btn-success">Add
                                            More</button>
                                    </div>
                                </div>
                                <input type="hidden" name="chapter_number" value="{{$chapter_number}}">
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

@section('append_script')
    <!-- bs-custom-file-input -->
    <script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });

        $("#add_image").click(function() {
            var html = `
            
            <div class="form-group" id="input_image">
                <label>File input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image[]">
                        <label class="custom-file-label">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                    </div>
                </div>
            </div> 
            `;
            $('#new_image').append(html);

            $(function() {
                bsCustomFileInput.init();
            });
        });


        // remove image
        $(document).on('click', '#removeRow', function() {
            $(this).closest('#input_image').remove();
        });
    </script>
@endsection
