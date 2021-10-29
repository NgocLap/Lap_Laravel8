@extends('layouts.admin')

@section('title')
    <title>Sửa Vai Trò</title>
@endsection

@section('css')
    <link href="{{ asset('css_js/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/role/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Role', 'key' => 'Edit'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <section class="content">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Role</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form action="{{route('update_role',['id'=>$role->id])}}" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="inputName">Tên Vai Trò : </label>
                                            <input type="text" id="name" name='name'
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Nhập vai trò ..." value="{{ $role->name }}">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName">Mô tả Vai Trò : </label>
                                            <textarea
                                                class="form-control tinymce_editor @error('display_name') is-invalid @enderror"
                                                name="display_name" rows="10" cols="10">
                                                {{ $role->display_name }}
                                            </textarea>
                                            @error('display_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="card card-danger" data-type="permission-card">
                                            <div class="card-header">
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" id="item-" value="" class="check_all">
                                                    <label for="item-">
                                                        Chọn Tất Cả
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        @foreach ($permissionParent as $permissionParentItem)
                                            <div class="form-group">
                                                <div class="card card-success" data-type="permission-card">
                                                    <div class="card-header">
                                                        <div class="icheck-primary d-inline">
                                                            <input type="checkbox"
                                                                id="item-{{ $permissionParentItem['id'] }}" value="" class="checkbox_wrapper">
                                                            <label for="item-{{ $permissionParentItem['id'] }}">
                                                                Bảng {{ $permissionParentItem->name }}
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        @foreach ($permissionParentItem->permissionsChildrent as $permissionChildrentItem)
                                                            <div class="col-sm-3">
                                                                <div class="card-body">
                                                                    <div class="icheck-primary d-inline">
                                                                        <input name="permission_id[]" type="checkbox"
                                                                            id="{{ $permissionParentItem['id'] . $permissionChildrentItem['id'] }}"
                                                                            value="{{$permissionChildrentItem->id}}" class="checkbox_childrent"
                                                                            {{$permissionsChecked->contains('id',$permissionChildrentItem->id) ? 'checked' : ''}}>
                                                                        <label
                                                                            for="{{ $permissionParentItem['id'] . $permissionChildrentItem['id'] }}">
                                                                            {{ $permissionChildrentItem->name }}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                </div>
                            </div>

                            @csrf
                            <input type="submit" value="Cập Nhập Vai Trò" class="btn btn-success ">
                            <a href="{{ route('show_role') }}" class="btn btn-secondary">Thoát</a>
                            </form>
                        </div>
                    </div>
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
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('css_js/select2/select2.min.js') }}"></script>
    <script src="{{ asset('dist/role/add/add.js') }}"></script>
@endsection
@endsection
