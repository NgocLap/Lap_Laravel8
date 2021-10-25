
@extends('layouts.admin')

@section('title')
    <title>Trang Chủ Dasboard</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'Category', 'key' => 'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
            <section class="content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Chỉnh Sửa Danh Mục</h3>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                        </div>
                      </div>

                      <div class="card-body">
                        <form action="{{route('update_category',['id'=>$category->id])}}" method="post">
                            <div class="form-group">
                            <label for="inputName">Tên Danh Mục : </label>
                            <input value="{{$category->name}}" type="text" id="name" name='name' class="form-control" placeholder="Nhập tên danh mục...">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Slug Danh Mục : </label>
                                <input value="{{$category->slug}}" type="text" id="slug" name='slug' class="form-control" >
                            </div>
                            <div class="form-group">
                            <label>Danh Mục Cha : </label>
                            <select  class="form-control custom-select" name="parent_id">
                                <option  value="0">Chọn danh mục cha</option>
                                {!!$htmlOption!!}
                            </select>
                            </div>
                            @csrf
                            <input type="submit" value="Cập nhập danh mục sản phẩm" class="btn btn-success ">
                            <a href="{{route('show_category')}}" class="btn btn-secondary">Thoát</a>
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
@endsection

