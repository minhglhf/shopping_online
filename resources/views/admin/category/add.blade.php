@extends('layouts.admin')

@section('title')
    <title>home page</title>
@endsection

{{--@section('sidebar')--}}
{{--    @parent--}}

{{--    <p>This is appended to the master sidebar.</p>--}}
{{--@endsection--}}

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'category', 'key' => 'Add'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('categories.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Ten Danh Muc</label>
                                <input type="text" class="form-control"
                                       name="name"
                                       placeholder="Nhap ten danh muc">
                            </div>

                            <div class="form-group">
                                <label>Chon danh muc cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">chon danh muc cha</option>
                                    {!! $optionHtml !!}

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


