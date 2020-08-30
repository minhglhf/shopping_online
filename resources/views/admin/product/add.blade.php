@extends('layouts.admin')

@section('title')
    <title>Add Product</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet"/>
@endsection

{{--@section('sidebar')--}}
{{--    @parent--}}

{{--    <p>This is appended to the master sidebar.</p>--}}
{{--@endsection--}}

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Product', 'key' => 'Add'])

    <!-- Main content -->
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">

                            @csrf
                            <div class="form-group">
                                <label>Ten San Pham</label>
                                <input type="text" class="form-control"
                                       name="name"
                                       placeholder="Nhap ten San Pham">
                            </div>

                            <div class="form-group">
                                <label>Gia San Pham</label>
                                <input type="text" class="form-control"
                                       name="price"
                                       placeholder="Nhap gia San Pham">
                            </div>

                            <div class="form-group">
                                <label>Hinh Anh San Pham</label>
                                <input type="file" class="form-control-file"
                                       name="feature_image_path">
                            </div>

                            <div class="form-group">
                                <label>Hinh Anh chi tiet cua san pham</label>
                                <input type="file" multiple class="form-control-file"
                                       name="image_path[]">
                            </div>


                            <div class="form-group">
                                <label>Chon Danh Muc</label>
                                <select class="form-control select2_init" name="category_id">
                                    <option value="0">chon danh muc</option>
                                    {!! $optionHtml !!}

                                </select>
                            </div>

                            <div class="form-group">
                                <label>nhap tags cho san pham</label>
                                <select name="tags[]" class="form-control tags_select" multiple="multiple">

                                </select>
                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="contents">Noi Dung san pham</label>
                                <textarea class="form-control tinymce_editor_init" id="contents" name="contents"
                                          rows="8"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        </form>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
@endsection

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection
