@extends('layouts.admin')

@section('title')
    <title>Danh Sách Vai Trò</title>
@endsection

@section('css')
    <link href="{{ asset('dist/role/show/show.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Roles', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                {{-- <h3 class="card-title">DataTable with minimal features & hover style</h3> --}}
                                <a href="{{ route('create_role') }}" class="btn btn-success float-right">
                                    <i class="fas fa-plus"></i> &nbsp Thêm Vai Trò</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID : </th>
                                            <th>Tên Vai Trò : </th>
                                            <th>Vai Trò : </th>
                                            <th>Hành Động : </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($roles as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{!! $item->display_name !!}</td>

                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="{{ route('edit_role', ['id' => $item->id]) }}"
                                                            class="btn btn-info">
                                                            <i class="fas fa-pencil-alt"></i> Chỉnh Sửa</a>
                                                        &ensp;
                                                        <a href=""
                                                            data-url="{{ route('delete_role', ['id' => $item->id]) }}"
                                                            class="btn btn-danger action_delete">
                                                            <i class="fas fa-trash"></i> Xóa</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID : </th>
                                            <th>Tên Vai Trò : </th>
                                            <th>Vai Trò : </th>
                                            <th>Hành Động : </th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="row">
                                    <div class="col-sm-5 hidden-xs">
                                        <div class="dataTables_info" id="example-datatable_info" role="status"
                                            aria-live="polite">
                                            <strong>Trang {{ $roles->currentPage() }} /
                                                {{ $roles->lastPage() }}</strong>
                                        </div>
                                    </div>
                                    <div class="col-sm-7 col-xs-12">
                                        <div>
                                            <ul class="pagination pagination-sm mb-0 d-flex justify-content-end">
                                                {{ $roles->links() }}
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


                    </div>

                    <!-- /.col -->
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@section('js')
    <script src="{{ asset('css_js/sweetAlert2/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('dist/user/show/show.js') }}"></script>
@endsection
@endsection
