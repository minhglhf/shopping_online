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
    @include('partials.content-header', ['name' => 'Menus', 'key' => 'Edit'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('menus.update', ['id' => $menus->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Ten Menu</label>
                                <input type="text" class="form-control"
                                       name="name"
                                       value="{{ $menus->name }}"
                                       placeholder="Nhap ten Menu">
                            </div>

                            <div class="form-group">
                                <label>Chon Menus cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">chon Menus cha</option>
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


