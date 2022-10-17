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
                        <h1 class="m-0">Sliders List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <a href="{{ route('admin.slider.add') }}" class="float-sm-right btn btn-success"><i
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
                                <h3 class="card-title">Sliders</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>URL</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Priority</th>
                                            <th>Status</th>
                                            <th>Create At</th>
                                            <th>Update At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sliders as $slider)
                                            <tr>
                                                <td>{{ $slider->id }}</td>
                                                <td>{{ $slider->title }}</td>
                                                <td>{{ $slider->url }}</td>
                                                <td>{{ $slider->description }}</td>
                                                <td><img width="100px" src="{{ $slider->image }}" alt=""></td>
                                                <td>{{ $slider->priority }}</td>
                                                <td>
                                                    @if ($slider->status == 'active')
                                                        <a href="{{ route('admin.slider.disable', ['slider' => $slider]) }}"
                                                            type="button" class="btn btn-round btn-success">Active</a>
                                                    @else
                                                        <a href="{{ route('admin.slider.active', ['slider' => $slider]) }}"
                                                            type="button" class="btn btn-round btn-danger">Disabled</a>
                                                    @endif
                                                </td>
                                                <td>{{ $slider->created_at }}</td>
                                                <td>{{ $slider->updated_at }}</td>
                                                <td>
                                                    <a title="Edit"
                                                        href="{{ route('admin.slider.edit', ['slider' => $slider]) }}"
                                                        type="button" class="btn btn-round btn-warning"><i
                                                            class="fa fa-pen" aria-hidden="true"></i>
                                                    </a>
                                                    <a title="Delete"
                                                        href="{{ route('admin.slider.delete', ['slider' => $slider]) }}"
                                                        type="button" class="btn btn-round btn-danger"><i
                                                            class="fa fa-trash" aria-hidden="true"></i>
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
