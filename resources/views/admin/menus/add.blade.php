
@extends('layouts.admin')

@section('title')
    <title>Thêm Menu</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'Menu', 'key' => 'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
            <section class="content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Menu</h3>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                        </div>
                      </div>

                      <div class="card-body">
                        <form action="{{route('store_menu')}}" method="post">
                            <div class="form-group">
                            <label for="inputName">Tên Menu : </label>
                            <input type="text" id="name" name='name' class="form-control" placeholder="Nhập tên menu...">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Slug Menu : </label>
                                <input type="text" id="slug" name='slug' class="form-control" >
                            </div>
                            <div class="form-group">
                            <label>Menu Cha : </label>
                            <select  class="form-control custom-select" name="parent_id">
                                <option  value="0" >Chọn menu cha</option>
                                {!!$optionSelect!!}
                            </select>
                            </div>
                            @csrf
                            <input type="submit" value="Thêm menu" class="btn btn-success ">
                            <a href="{{route('show_menu')}}" class="btn btn-secondary">Thoát</a>
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

