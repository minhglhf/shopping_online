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
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Starter Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label>Ten Danh Muc</label>
                                <input type="email" class="form-control" placeholder="Nhap ten danh muc">
                            </div>

                            <div class="form-group">
                                <label>Chon danh muc cha</label>
                                <select class="form-control">
                                    <option value="0">chon danh muc cha</option>
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


