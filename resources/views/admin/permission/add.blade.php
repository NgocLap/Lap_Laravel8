@extends('layouts.admin')

@section('title')
    <title>Thêm Permission</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Permission', 'key' => 'Add'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Permission</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form action="{{route('store_permission')}}" method="post">
                                        <div class="form-group">
                                            <label>Chọn tên module : </label>
                                            <select required class="form-control custom-select" name="module_parent">
                                                <option value="">Chọn tên module :</option>
                                                @foreach (config('permissions.table_module') as $moduleItem)
                                                    <option value="{{$moduleItem}}">{{$moduleItem}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <div class="card card-success" data-type="permission-card">
                                                <div class="card-header">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox"
                                                            id="item-" value="" class="checkbox_all">
                                                        <label for="item-">
                                                            Chọn tất cả phương thức
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    @foreach (config('permissions.module_childrent') as $moduleItemChildrent)
                                                    <div class="col-sm-3">
                                                        <div class="card-body">
                                                            <div class="icheck-primary d-inline">
                                                                <input name="module_childrent[]" type="checkbox" id="{{ $moduleItemChildrent }}" value="{{$moduleItemChildrent}}"
                                                                    class="checkbox_childrent">
                                                                <label for="{{ $moduleItemChildrent }}">
                                                                    {{$moduleItemChildrent}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @csrf
                                        <input type="submit" value="Thêm permission" class="btn btn-success ">
                                        <a href="/" class="btn btn-secondary">Thoát</a>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </section>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@section('js')
    <script src="{{ asset('dist/permission/add/add.js') }}"></script>
@endsection
@endsection
