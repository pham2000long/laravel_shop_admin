@extends('layouts.admin')

@section('title')
    <title>List Product</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admins/product/index/list.css')}}">
@endsection

@section('js')
    <script src="{{ asset('venders/sweetAlert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('admins/product/index/list.js') }}"></script>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Product', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href=" {{ route('products.create') }} " class="btn btn-success float-right m-2">ADD</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{ $product->id }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ number_format($product->price) }}</td>
                                    <td>
                                        <img class="product_image" src="{{ $product->feture_image_path }}" alt="">
                                    </td>
                                    <td>{{ optional($product->category)->name }}</td>
                                    <td>
                                        <a href=" {{ route('products.edit', ['id' => $product->id]) }} " class="btn btn-default">Edit</a>
                                        <a data-url="{{ route('products.delete', ['id' => $product->id]) }}" href=""
                                             class="btn btn-danger action_del">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $products->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
