@extends('layouts.admin')

@section('title')
    <title>Edit Product</title>
@endsection

@section('css')
    <link href="{{asset('venders/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet"/>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Product', 'key' => 'Edit'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action=" {{ route('products.update', ['id' => $product->id]) }} " method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control" placeholder="Nhập tên sản phẩm"
                                    name="name" value="{{$product->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input type="text" class="form-control" placeholder="Nhập giá sản phẩm"
                                    name="price" value="{{$product->price}}">
                                </div>
                                <div class="form-group">
                                    <label>Ảnh đại diện</label>
                                    <input type="file" multiple class="form-control-file" name="feture_image_path">
                                    <div class="col-md-4 container_feture_image">
                                        <div class="row">
                                            <img class="image_avatar" src="{{$product->feture_image_path}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Ảnh chi tiết</label>
                                    <input type="file" class="form-control-file" multiple="multiple" name="image_path[]">
                                    <div class="col-md-12 container_image_detail">
                                        <div class="row">
                                            @foreach ($product->productImages as $productImageItem)
                                                <div class="col-md-3">
                                                    <img class="image_detail_product" src="{{$productImageItem->image_path}}" alt="">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Chọn danh mục</label>
                                    <select class="form-control select2_init" name="category_id">
                                        <option value="">Chọn danh mục</option>
                                        {!! $htmlOption !!}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nhập tags cho sản phẩm</label>
                                    <select class="form-control tags_select2_choose" multiple="multiple" name="tags[]">
                                        @foreach ($product->tags as $tagItem)
                                            <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="content"  class="my_editor" rows="12">{{$product->content }}</textarea>
                                </div>
                            </div>
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

@section('js')
    <script src="{{asset('venders/select2/select2.min.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{asset('admins/product/add/add.js')}}"></script>
@endsection
