@extends('layouts.admin')

@section('title')
    <title>Add Settings</title>
@endsection

{{--@section('sidebar')--}}
{{--    @parent--}}

{{--    <p>This is appended to the master sidebar.</p>--}}
{{--@endsection--}}

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Settings', 'key' => 'Add'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Config Key</label>
                                <input type="text" class="form-control"
                                       name="config_key"
                                       placeholder="Nhap config key">
                            </div>

                            @if(request()->type === 'text')
                                <div class="form-group">
                                    <label>Config Value</label>
                                    <input type="text" class="form-control"
                                           name="config_value"
                                           placeholder="Nhap config value">
                                </div>
                            @endif

                            @if(request()->type === 'textarea')
                                <div class="form-group">
                                    <label>Config Value</label>
                                    <textarea class="form-control"
                                              name="config_value"
                                              placeholder="Nhap config value"
                                              rows="5"></textarea>
                                </div>
                            @endif


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


