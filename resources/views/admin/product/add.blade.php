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
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h1 class="card-title">Sản Phẩm</h1>
                                    <div class="card-tools">
                                        <input type="submit" value="Thêm sản phẩm" class="btn btn-success ">
                                        <a href="{{ route('show_product') }}" class="btn btn-secondary">Thoát</a>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputName">Tên sản phẩm : </label>
                                                    <input type="text" id="name" name='name' class="form-control"
                                                        placeholder="Nhập tên sản phẩm...">
                                                </div>



                                                <div class="form-group">
                                                    <label for="inputName">Giá sản phẩm : </label>
                                                    <input type="text" id="price" name='price' class="form-control"
                                                        placeholder="Nhập giá sản phẩm...">
                                                </div>

                                                <div class="form-group">
                                                    <label>Ảnh đại diện sản phẩm</label>
                                                    <input required id="feature_image_path" type="file"
                                                        name="feature_image_path" class="form-control-file"
                                                        onchange="changeImg(this)">
                                                    <img id="avatar" class="thumbnail" width="200px"
                                                        src="{{ asset('Image/imgdefault.png') }}">
                                                </div>

                                                <div class="form-group">
                                                    <label>Danh Mục Sản Phẩm : </label>
                                                    <select class="form-control select2_init" name="parent_id">
                                                        <option value="">Chọn Danh Mục Sản Phẩm : </option>
                                                        {!! $htmlOption !!}
                                                    </select>
                                                </div>







                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputName">Slug Sản Phẩm : </label>
                                                    <input type="text" id="slug" name='slug' class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Tag Sản Phẩm : </label>
                                                    <select name="tags[]" class="form-control tags_select_choose"
                                                        multiple="multiple">
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Ảnh chi tiết sản phẩm</label>
                                                    <input required type="file" multiple class="form-control-file"
                                                        name="image_path[]">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Mô tả sản phẩm :</label>
                                                    <textarea  class="form-control tinymce_editor" name="content"></textarea>
                                                </div>
                                            </div>

                                            @csrf

                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">

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
