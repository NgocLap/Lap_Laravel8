@extends('layouts.admin')

@section('title')
    <title>Thêm Vai Trò</title>
@endsection

@section('css')
    <link href="{{ asset('css_js/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/role/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Role', 'key' => 'Add'])
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
                                    <form action="{{ route('store_role') }}" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="inputName">Tên Vai Trò : </label>
                                            <input type="text" id="name" name='name'
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Nhập vai trò ..." value="{{ old('name') }}">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName">Mô tả Vai Trò : </label>
                                            <textarea
                                                class="form-control tinymce_editor @error('display_name') is-invalid @enderror"
                                                name="display_name" rows="10" cols="10">
                                                            {{ old('display_name') }}
                                                            </textarea>
                                            @error('display_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="card card-success">
                                                <div class="card-header">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" id="checkboxPrimary3">
                                                        <label for="checkboxPrimary3">
                                                            Model User
                                                        </label>
                                                    </div>
                                                    {{-- <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                        </button>
                                                    </div> --}}
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="card-body">
                                                            <div class="icheck-primary d-inline">
                                                                <input type="checkbox" id="checkboxPrimary2">
                                                                <label for="checkboxPrimary2">
                                                                    Role
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="card-body">
                                                            <div class="icheck-primary d-inline">
                                                                <input type="checkbox" id="checkboxPrimary23">
                                                                <label for="checkboxPrimary23">
                                                                    Role
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="card-body">
                                                            <div class="icheck-primary d-inline">
                                                                <input type="checkbox" id="checkboxPrimary24">
                                                                <label for="checkboxPrimary24">
                                                                    Role
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="card-body">
                                                            <div class="icheck-primary d-inline">
                                                                <input type="checkbox" id="checkboxPrimary25">
                                                                <label for="checkboxPrimary25">
                                                                    Role
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>

                                        @csrf
                                        <input type="submit" value="Thêm Vai Trò" class="btn btn-success ">
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
