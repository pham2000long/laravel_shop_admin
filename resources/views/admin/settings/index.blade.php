@extends('layouts.admin')

@section('title')
    <title>List Setting</title>
@endsection

@section('js')
    <script src="{{ asset('venders/sweetAlert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('admins/main.js') }}"></script>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Setting', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dropdown float-right m-3 p-2">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Add Setting
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a href=" {{ route('settings.create') . '?type=Text' }} "
                                        class="dropdown-item">Text</a></li>
                                <li><a href=" {{ route('settings.create') . '?type=Textarea' }} "
                                        class="dropdown-item">Textarea</a></li>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Config key</th>
                                    <th scope="col">Config value</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($settings as $setting)
                                    <tr>
                                        <th scope="row">{{ $setting->id }}</th>
                                        <td>{{ $setting->config_key }}</td>
                                        <td>{{ $setting->config_value }}</td>
                                        <td>
                                            <a href=" {{ route('settings.edit', ['id' => $setting->id]) . '?type=' . $setting->type }}
                                                    " class="btn btn-default">Edit</a>
                                            <a data-url="{{ route('settings.delete', ['id' => $setting->id]) }}"
                                                class="btn btn-danger action_del">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $settings->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
