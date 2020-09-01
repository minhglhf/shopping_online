@extends('layouts.admin')

@section('title')
    <title>Edit Slider</title>
@endsection

{{--@section('sidebar')--}}
{{--    @parent--}}

{{--    <p>This is appended to the master sidebar.</p>--}}
{{--@endsection--}}

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Slider', 'key' => 'Edit'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('slider.update', ['id' => $slider->id])}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Ten Menus</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name"
                                       placeholder="Nhap ten Slider"
                                       value="{{$slider->name}}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>mo ta slider</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          name="description">{{$slider->description}}</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Hinh anh</label>
                                <input type="file" class="form-control-file @error('image_path') is-invalid @enderror"
                                       name="image_path">
                                <div class="col-md-4">
                                    <div class="row feature_image">
                                        <img src="{{ $slider->image_path }}" alt="picture">
                                    </div>
                                </div>

                                @error('image_path')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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


