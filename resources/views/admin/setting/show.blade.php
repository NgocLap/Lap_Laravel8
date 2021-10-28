@extends('layouts.admin')

@section('title')
    <title>Setting</title>
@endsection

@section('css')
    <link href="{{ asset('dist/setting/show/show.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Setting', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card card-success collapsed-card float-right">
                                    <div class="card-header">

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <h3 class="card-title">Chọn loại Setting </h3>&nbsp&nbsp
                                                <i class="fas fa-plus"></i>

                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <nav class="mt-2">
                                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview"
                                                role="menu" data-accordion="false">
                                                <li class="nav-item">
                                                    <a href="{{ route('create_setting') . '?type=Text' }}"
                                                        class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>
                                                            Text
                                                        </p>
                                                    </a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="{{ route('create_setting') . '?type=Textarea' }}"
                                                        class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>
                                                            Textarea
                                                        </p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID : </th>
                                            <th>Config_key : </th>
                                            <th>Config_value : </th>
                                            <th>Type : </th>
                                            <th>Hành Động : </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($settings as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->config_key }}</td>
                                                <td>{!! $item->config_value !!}</td>
                                                <td>{{ $item->type }}</td>
                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="{{ route('edit_setting', ['id' => $item->id]). '?type=' . $item->type }}"
                                                            class="btn btn-info">
                                                            <i class="fas fa-pencil-alt"></i> Chỉnh Sửa</a>
                                                        &ensp;
                                                        <a href=""
                                                            data-url="{{ route('delete_setting', ['id' => $item->id]) }}"
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
                                            <th>Config_key : </th>
                                            <th>Config_value : </th>
                                            <th>Type : </th>
                                            <th>Hành Động : </th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="row">
                                    <div class="col-sm-5 hidden-xs">
                                        <div class="dataTables_info" id="example-datatable_info" role="status"
                                            aria-live="polite">
                                            <strong>Trang {{ $settings->currentPage() }} /
                                                {{ $settings->lastPage() }}</strong>
                                        </div>
                                    </div>
                                    <div class="col-sm-7 col-xs-12">
                                        <div>
                                            <ul class="pagination pagination-sm mb-0 d-flex justify-content-end">
                                                {{ $settings->links() }}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </div>
@section('js')
    <script src="{{ asset('css_js/sweetAlert2/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('dist/setting/show/show.js') }}"></script>
@endsection
@endsection
