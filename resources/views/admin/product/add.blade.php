@extends('layouts.admin')

@section('title')
    <title>Thêm Sản Phẩm</title>
@endsection

@section('css')
    <link href="{{ asset('css_js/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Product', 'key' => 'Add'])
        {{-- <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div> --}}

        <div class="content">
            <div class="container-fluid">
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h1 class="card-title">Sản Phẩm</h1>
                                    <div class="card-tools">

                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form action="{{ route('store_product') }}" method="post"
                                        enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputName">Tên sản phẩm : </label>
                                                    <input type="text" id="name" name='name'
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        placeholder="Nhập tên sản phẩm..." value="{{old('name')}}">
                                                    @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputName">Giá sản phẩm : </label>
                                                    <input type="text" id="price" name='price'
                                                        class="form-control @error('price') is-invalid @enderror"
                                                        placeholder="Nhập giá sản phẩm..." value="{{old('price')}}">
                                                    @error('price')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Ảnh đại diện sản phẩm</label>
                                                    <input id="feature_image_path" type="file" name="feature_image_path"
                                                        class="form-control @error('feature_image_path') is-invalid @enderror"
                                                        onchange="changeImg(this)">
                                                    <img id="avatar" class="thumbnail" width="200px"
                                                        src="{{ asset('Adminlte/dist/img/default-150x150.png') }}">
                                                    @error('feature_image_path')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Danh Mục Sản Phẩm : </label>
                                                    <select
                                                        class="form-control select2_init  @error('category_id ') is-invalid @enderror"
                                                        name="category_id">
                                                        <option value="">Chọn Danh Mục Sản Phẩm : </option>
                                                        {!! $htmlOption !!}
                                                    </select>
                                                    @error('category_id')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputName">Slug Sản Phẩm : </label>
                                                    <input type="text" id="slug" name='slug' class="form-control" value="{{old('slug')}}">
                                                </div>

                                                <div class="form-group">
                                                    <label>Tag Sản Phẩm : </label>
                                                    <select name="tags[]"
                                                        class="form-control tags_select_choose @error('tags') is-invalid @enderror"
                                                        multiple="multiple" >
                                                    </select>
                                                    @error('tags')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Ảnh chi tiết sản phẩm</label>
                                                    <input type="file" multiple class="form-control-file"
                                                        name="image_path[]" >
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Mô tả sản phẩm :</label>
                                                    <textarea
                                                        class="form-control tinymce_editor @error('content') is-invalid @enderror"
                                                        name="content" >
                                                        {{old('content')}}
                                                    </textarea>
                                                    @error('content')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <input type="submit" value="Thêm sản phẩm" class="btn btn-success ">
                                                <a href="{{ route('show_product') }}" class="btn btn-secondary">Thoát</a>
                                            </div>

                                            @csrf

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
    <script src="{{ asset('css_js/select2/select2.min.js') }}"></script>
    <script src="{{ asset('dist/product/add/add.js') }}"></script>
@endsection

@endsection
