@extends('layouts.admin')

@section('title')
    <title>Add Product</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
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
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="post" enctype="multipart/form-data">
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
                                <input type="file" class="form-control"
                                       name="feature_image_path">
                            </div>

                            <div class="form-group">
                                <label>Hinh Anh chi tiet cua san pham</label>
                                <input type="file" multiple class="form-control"
                                       name="image_path">
                            </div>

                            <div class="form-group">
                                <label for="content">Noi Dung san pham</label>
                                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                            </div>


                            <div class="form-group">
                                <label>Chon Danh Muc</label>
                                <select class="form-control select2_init" name="parent_id">
                                    <option value="0">chon danh muc</option>
                                    {!! $optionHtml !!}

                                </select>
                            </div>

                            <div class="form-group">
                                <label>nhap tags cho san pham</label>
                                <select class="form-control tags_select" multiple="multiple">

                                </select>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(function () {
            $(".tags_select").select2({
                tags: true,
                tokenSeparators: [',', ' ']
            });
            $(".select2_init").select2({
                placeholder: "Chon danh muc",
                allowClear: true
            })
        })
    </script>
@endsection
