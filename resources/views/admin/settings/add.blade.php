@extends('layouts.admin')

@section('title')
    <title>Add Setting</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Setting', 'key' => 'Add'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action=" {{ route('settings.store') . '?type=' . request()->type }} " method="post">
                            @csrf
                            <div class="form-group">
                                <label>Config key</label>
                                <input type="text" class="form-control" @error('config_key') is-invalid @enderror
                                    placeholder="Nhập config key" name="config_key" value="{{ old('config_key') }}">
                                @error('config_key')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @if (request()->type === 'Text')
                                <div class="form-group">
                                    <label>Config value</label>
                                    <input type="text" class="form-control" @error('config_value') is-invalid @enderror
                                        placeholder="Nhập config value" name="config_value"
                                        value="{{ old('config_value') }}">
                                    @error('config_value')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @elseif (request()->type === 'Textarea')
                                <div class="form-group">
                                    <label>Config value</label>
                                    <textarea name="config_value" rows="4" @error('config_value') is-invalid @enderror
                                        class="form-control"
                                        placeholder="Nhập config value">{{ old('config_value') }}</textarea>
                                    @error('config_value')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
