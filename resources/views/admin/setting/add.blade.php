@extends('layouts.admin')

@section('title')
    <title>Thêm Setting</title>
@endsection

@section('css')
    <link href="{{ asset('dist/setting/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Setting', 'key' => 'Add'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Setting</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form action="{{route('store_setting') . '?type=' . request()->type}}" method="post">
                                        <div class="form-group">
                                            <label for="inputName">Config_key : </label>
                                            <input type="text" id="config_key" name='config_key'
                                                class="form-control @error('config_key') is-invalid @enderror"
                                                placeholder="Nhập Config_key..." value="{{ old('config_key') }}">
                                            @error('config_key')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        @if (request()->type === 'Text')
                                            <div class="form-group">
                                                <label for="inputName">Config_value : </label>
                                                <input type="text" id="config_value" name='config_value'
                                                    class="form-control @error('config_value') is-invalid @enderror"
                                                    placeholder="Nhập Config_value..." value="{{ old('config_value') }}">
                                                @error('config_value')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @elseif(request()->type === 'Textarea')
                                            <div class="form-group">
                                                <label for="inputName">Config_value : </label>
                                                <textarea
                                                    class="form-control  @error('config_value') is-invalid @enderror"
                                                    name="config_value" cols="30" rows="15">
                                                {{ old('config_value') }}
                                                </textarea>
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @endif

                                        @csrf
                                        <input type="submit" value="Thêm Setting" class="btn btn-success ">
                                        <a href="{{ route('show_setting') }}" class="btn btn-secondary">Thoát</a>
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
    <script src="{{ asset('dist/setting/add/add.js') }}"></script>
@endsection
@endsection
