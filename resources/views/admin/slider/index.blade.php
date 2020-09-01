@extends('layouts.admin')

@section('title')
    <title>Slider</title>
@endsection

{{--@section('sidebar')--}}
{{--    @parent--}}

{{--    <p>This is appended to the master sidebar.</p>--}}
{{--@endsection--}}

@section('css')
    <link href="{{ asset('admins/slider/index/index.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Slider', 'key' => 'List'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('slider.create') }}" class="btn btn-success">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ten Slider</th>
                                <th scope="col">Description</th>
                                <th scope="col">Hinh anh</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($sliders as $slider)
                                <tr>
                                    <th scope="row">{{ $slider->id }}</th>
                                    <td>{{ $slider->name }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td><img class="thumbnail_image_size" src="{{ $slider->image_path }}" alt="picture"></td>
                                    <td>
                                        <a href="{{route('slider.edit', ['id' => $slider->id])}}" class="btn btn-default">Edit</a>
                                        <a data-url="{{route('slider.delete', ['id' => $slider->id])}}" class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        {{ $sliders->links() }}
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
    <script src="{{ asset('admins/slider/index/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endsection


