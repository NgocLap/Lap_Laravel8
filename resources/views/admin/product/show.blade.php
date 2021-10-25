
@extends('layouts.admin')

@section('title')
    <title>Sản Phẩm</title>

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'Product', 'key' => 'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    {{-- <h3 class="card-title">DataTable with minimal features & hover style</h3> --}}
                    <a href="{{route('create_product')}}" class="btn btn-success float-right">
                        <i class="fas fa-plus"></i> &nbsp Thêm sản phẩm</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>ID : </th>
                        <th>Tên sản phẩm : </th>
                        <th>Giá : </th>
                        <th>Hình Ảnh : </th>
                        <th>Thuộc Danh Mục : </th>
                        <th>Hành Động : </th>
                      </tr>
                      </thead>

                      <tbody>
                      {{-- @foreach ($menus as $item)
                      <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>

                        @if ($item->parent_id == 0)
                        <td>Không thuộc danh mục nào</td>
                        @else
                        @foreach ($menus as $sub_item)
                        @if ($item->parent_id == $sub_item->id)
                        <td>{{ $sub_item->name }}</td>
                        @break
                        @endif
                        @endforeach
                        @endif

                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                              <a href="{{route('edit_menu', ['id'=>$item->id])}}" class="btn btn-info">
                                <i class="fas fa-pencil-alt"></i> Chỉnh Sửa</a>
                                &ensp;
                              <a href="{{route('delete_menu', ['id'=>$item->id])}}" class="btn btn-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa {{$item->name}} !')">
                                <i class="fas fa-trash"></i>  Xóa</a>
                            </div>
                        </td>
                      </tr>
                      @endforeach --}}
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>ID : </th>
                        <th>Tên sản phẩm : </th>
                        <th>Giá : </th>
                        <th>Hình Ảnh : </th>
                        <th>Thuộc Danh Mục : </th>
                        <th>Hành Động :</th>
                      </tr>
                      </tfoot>
                    </table>
                        {{-- <div class="row">
                            <div class="col-sm-5 hidden-xs">
                                <div class="dataTables_info" id="example-datatable_info" role="status"
                                    aria-live="polite">
                                    <strong>Trang {{ $menus->currentPage() }} /
                                        {{ $menus->lastPage() }}</strong>
                                </div>
                            </div>
                            <div class="col-sm-7 col-xs-12" >
                                <div>
                                    <ul class="pagination pagination-sm mb-0 d-flex justify-content-end">
                                        {{ $menus->links() }}
                                    </ul>
                                </div>
                            </div>
                        </div> --}}

                  </div>

                </div>


            </div>

              <!-- /.col -->
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

