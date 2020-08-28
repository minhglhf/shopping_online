@extends('layouts.admin')

@section('title')
    <title>Product</title>
@endsection

{{--@section('sidebar')--}}
{{--    @parent--}}

{{--    <p>This is appended to the master sidebar.</p>--}}
{{--@endsection--}}

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Product', 'key' => 'List'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('product.create') }}" class="btn btn-success">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ten Sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Hình Ảnh</th>
                                <th scope="col">Danh Mục</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            {{--                            @foreach($menus as $menu)--}}
                            <tr>
                                <th scope="row">1</th>
                                <td>InphoneX</td>
                                <td>11.400.000</td>
                                <td><img src="" alt="uow"></td>
                                <td>Điện thoại</td>
                                <td>
                                    <a href="" class="btn btn-default">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            {{--                            @endforeach--}}


                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        {{--                        {{ $menus->links() }}--}}
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


