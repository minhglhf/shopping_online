@extends('layouts.admin')

@section('title')
    <title>Add Slider</title>
@endsection

{{--@section('sidebar')--}}
{{--    @parent--}}

{{--    <p>This is appended to the master sidebar.</p>--}}
{{--@endsection--}}

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Slider', 'key' => 'Add'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Ten Menus</label>
                                <input type="text" class="form-control"
                                       name="name"
                                       placeholder="Nhap ten Slider">
                            </div>

                            <div class="form-group">
                                <label>mo ta slider</label>
                                <input type="text" class="form-control"
                                       name="description"
                                       placeholder="description slider">
                            </div>

                            <div class="form-group">
                                <label>Hinh anh</label>
                                <input type="file" class="form-control-file"
                                       name="image_path">
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


