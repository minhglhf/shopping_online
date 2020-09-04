@extends('layouts.admin')

@section('title')
    <title>Products</title>
@endsection

@section('css')
    <link href="{{ asset('admins/product/index/index.css') }}" rel="stylesheet"/>
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

                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{ $product->id }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td><img class='thumbnail_image_size' src="{{ $product->feature_image_path }}"
                                             alt="uow"></td>
                                    <td>{{ optional($product->category)->name }}</td>
                                    <td>
{{--                                        @can('product_edit')--}}

                                            <a href="{{ route('product.edit', ['id' => $product->id]) }}"
                                               class="btn btn-default">Edit</a>

{{--                                        @endcan--}}

{{--                                        @can('product_edit')--}}
                                            <a data-url="{{ route('product.delete', ['id' => $product->id]) }}"
                                               href="" class="btn btn-danger action_delete">Delete</a>
{{--                                        @endcan--}}
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

@section('js')
    <script src="{{ asset('admins/product/index/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endsection


