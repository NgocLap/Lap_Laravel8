@extends('layouts.admin')

@section('title')
    <title>Trang Chủ Dasboard</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Category', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                {{-- <h3 class="card-title">DataTable with minimal features & hover style</h3> --}}
                                @can('category-add')
                                <a href="{{ route('create_category') }}" class="btn btn-success float-right">
                                    <i class="fas fa-plus"></i> &nbsp Thêm danh mục sản phẩm</a>
                                @endcan
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID : </th>
                                            <th>Tên Danh Mục : </th>
                                            <th>Danh Mục Cha : </th>
                                            <th>Hành Động : </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($categories as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>

                                                @if ($item->parent_id == 0)
                                                    <td>Không thuộc danh mục nào</td>
                                                @else
                                                    @foreach ($categories as $sub_item)
                                                        @if ($item->parent_id == $sub_item->id)
                                                            <td>{{ $sub_item->name }}</td>
                                                        @break
                                                    @endif
                                                @endforeach
                                        @endif

                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                @can('category-edit')
                                                <a href="{{ route('edit_category', ['id' => $item->id]) }}"
                                                    class="btn btn-info">
                                                    <i class="fas fa-pencil-alt"></i> Chỉnh Sửa</a>
                                                @endcan
                                                &ensp;
                                                @can('category-delete')
                                                <a href="{{ route('delete_category', ['id' => $item->id]) }}"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa {{ $item->name }} !')">
                                                    <i class="fas fa-trash"></i> Xóa</a>
                                                @endcan
                                            </div>
                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID : </th>
                                            <th>Tên Danh Mục :</th>
                                            <th>Danh Mục Cha : </th>
                                            <th>Hành Động :</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-5 hidden-xs">
                                        <div class="dataTables_info" id="example-datatable_info" role="status"
                                            aria-live="polite">
                                            <strong>Trang {{ $categories->currentPage() }} /
                                                {{ $categories->lastPage() }}</strong>
                                        </div>
                                    </div>
                                    <div class="col-sm-7 col-xs-12">
                                        <div>
                                            <ul class="pagination pagination-sm mb-0 d-flex justify-content-end">
                                                {{ $categories->links() }}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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
