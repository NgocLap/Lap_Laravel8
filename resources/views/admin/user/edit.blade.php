@extends('layouts.admin')

@section('title')
    <title>Sửa User</title>
@endsection

@section('css')
    <link href="{{ asset('css_js/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/user/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'User', 'key' => 'Edit'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">User</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form action="{{ route('update_user',['id'=>$users->id]) }}" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="inputName">Tên User : </label>
                                            <input type="text" id="name" name='name'
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Nhập tên user..." value="{{ $users->name }}">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName">Email : </label>
                                            <input type="email" id="email" name='email'
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Nhập Email..." value="{{ $users->email }}">
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName">Password : </label>
                                            <input type="password" id="password" name='password'
                                                class="form-control @error('password') is-invalid @enderror"
                                                >
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Chọn vai trò User : </label>
                                            <select
                                                class="form-control select2_init  @error('role_id ') is-invalid @enderror"
                                                name="role_id[]" multiple>
                                                <option value="">Chọn vai trò User : </option>
                                                @foreach ($roles as $item)
                                                <option
                                                {{$roles->contains('id', $item->id) ? 'selected' : ''}}
                                                value="{{$item->id}}">{{$item->name}} </option>
                                                @endforeach
                                                {{-- {!! $htmlOption !!} --}}
                                            </select>
                                            @error('role_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        @csrf
                                        <input type="submit" value="Cập Nhập User" class="btn btn-success ">
                                        <a href="{{ route('show_user') }}" class="btn btn-secondary">Thoát</a>
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
    {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}
    <script src="{{ asset('css_js/select2/select2.min.js') }}"></script>
    <script src="{{ asset('dist/user/add/add.js') }}"></script>

@endsection
@endsection
