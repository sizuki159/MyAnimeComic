@extends('admin.main')

@section('append_css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Comics List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <a href="{{ route('admin.comic.add') }}" class="float-sm-right btn btn-success"><i
                                class="fa fa-plus-circle"></i> Thêm mới</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Comics</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Author</th>
                                            <th>Status</th>
                                            <th>Category</th>
                                            <th>Create At</th>
                                            <th>Update At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($comics as $comic)
                                            @php
                                                $path = 'comics/' . $comic->id . '/';
                                                $comic->image = json_decode($comic->image);
                                            @endphp
                                            <tr>
                                                <td>{{ $comic->id }}</td>
                                                <td>{{ $comic->title }}</td>
                                                <td><img width="100px" src="{{asset($path . $comic->image)}}" alt=""></td>
                                                <td>{{ $comic->author }}</td>
                                                <td>
                                                    @if ($comic->status == 'active')
                                                        <a href="{{ route('admin.comic.disable', ['id' => $comic->id]) }}"
                                                            type="button" class="btn btn-round btn-success">Active</a>
                                                    @else
                                                        <a href="{{ route('admin.comic.active', ['id' => $comic->id]) }}"
                                                            type="button" class="btn btn-round btn-danger">Disabled</a>
                                                    @endif
                                                </td>
                                                <td>{{ optional($comic->category)->name }}</td>
                                                <td>{{ $comic->created_at }}</td>
                                                <td>{{ $comic->updated_at }}</td>
                                                <td>
                                                    <a title="Edit" href="{{ route('admin.comic.edit', ['id' => $comic->id]) }}"
                                                        type="button" class="btn btn-round btn-warning"><i
                                                            class="fa fa-pen" aria-hidden="true"></i>
                                                    </a>
                                                    <a title="Delete" href="{{ route('admin.comic.delete', ['id' => $comic->id]) }}"
                                                        type="button" class="btn btn-round btn-danger"><i
                                                            class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                    <a title="View Chapters" href="{{ route('admin.chapters.list', ['comicId' => $comic->id]) }}"
                                                        type="button" class="btn btn-round btn-danger"><i class="fa fa-eye"
                                                            aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('append_script')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endsection
