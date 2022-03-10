@extends('layouts.admin')

@section('title')
    <title>Add Role</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/slider/add/add.css') }}">
    <style>
        .card-header {
            background-color: rgb(115, 115, 219);
            color: white;
            font-size: 20px;
        }

        input[type="checkbox"] {
            transform: scale(1.2);
        }

    </style>
@endsection

@section('js')
    <script>
        $(function() {
            $('.checkbox_wrapper').on('click', function() {
                $(this).parents('.card').find('.checkbox_childrent').prop('checked', $(this).prop(
                    'checked'));
            });
            $('.check_all').on('click', function() {
                $(this).parents().find('.checkbox_wrapper').prop('checked', $(this).prop('checked'));
                $(this).parents().find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
            });
        });
    </script>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Role', 'key' => 'Add'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action=" {{ route('roles.store') }} " method="post" enctype="multipart/form-data"
                        style="width: 100%">
                        <div class="col-md-12">
                            @csrf
                            <div class="form-group">
                                <label>Tên vai trò</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Nhập tên vai trò" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mô tả vai trò</label>
                                <textarea name="display_name"
                                    class="form-control @error('display_name') is-invalid @enderror"
                                    rows="4">{{ old('display_name') }}</textarea>
                                @error('display_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>
                                        <input type="checkbox" class="check_all">
                                        Check All
                                    </label>
                                </div>
                                @foreach ($permissionsParent as $permissionsParentItem)
                                    <div class="card border-primary mb-3 col-md-12">
                                        <div class="card-header">
                                            <label for="">
                                                <input type="checkbox" value="" class="checkbox_wrapper">
                                            </label>
                                            Module {{ $permissionsParentItem->name }}
                                        </div>
                                        <div class="row">
                                            @foreach ($permissionsParentItem->permissionsChildrent as $permissionsChildrentItem)


                                                <div class="card-body text-primary col-md-3">
                                                    <h5 class="card-title">
                                                        <label for="">
                                                            <input type="checkbox" name="permission_id[]" \
                                                                class="checkbox_childrent"
                                                                value="{{ $permissionsChildrentItem->id }}">
                                                        </label>
                                                        {{ $permissionsChildrentItem->name }}
                                                    </h5>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach

                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
