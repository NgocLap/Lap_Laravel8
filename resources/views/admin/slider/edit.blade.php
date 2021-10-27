@extends('layouts.admin')

@section('title')
    <title>Sửa Slider</title>
@endsection

@section('css')
    <link href="{{ asset('dist/slider/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Slider', 'key' => 'Edit'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Slider</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form action="{{ route('update_slider',['id'=>$sliderEdit->id]) }}" method="post"
                                        enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="inputName">Tên Slider : </label>
                                            <input type="text" id="name" name='name'
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Nhập tên Slider..." value="{{ $sliderEdit->name }}">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName">Mô tả Slider : </label>
                                            <textarea
                                                class="form-control tinymce_editor @error('description') is-invalid @enderror"
                                                name="description">
                                            {{ $sliderEdit->description }}
                                            </textarea>
                                            @error('description')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <label>Ảnh Slider :</label>
                                            <input id="image_path" type="file" name="image_path"
                                                class="form-control @error('image_path') is-invalid @enderror"
                                                onchange="changeImg(this)">
                                            @error('image_path')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <img id="avatar" class="thumbnail" width="200px"
                                                src="{{ $sliderEdit->image_path }}">

                                        </div>

                                        @csrf
                                        <input type="submit" value="Cập Nhập Slider" class="btn btn-success ">
                                        <a href="{{ route('show_slider') }}" class="btn btn-secondary">Thoát</a>
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
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    {{-- <script src="{{ asset('css_js/select2/select2.min.js') }}"></script> --}}
    <script src="{{ asset('dist/slider/add/add.js') }}"></script>
@endsection
@endsection
