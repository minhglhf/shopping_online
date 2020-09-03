@extends('layouts.admin')

@section('title')
    <title>Edit User</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet"/>
    <style>
        .select2-selection__choice{
            background-color: aquamarine !important;
        }
    </style>
@endsection

{{--@section('sidebar')--}}
{{--    @parent--}}

{{--    <p>This is appended to the master sidebar.</p>--}}
{{--@endsection--}}

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @include('partials.content-header', ['name' => 'User', 'key' => 'Edit'])

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
                                       placeholder="Nhap ten User"
                                       value="{{$user->name}}">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control"
                                       name="email"
                                       placeholder="Nhap email"
                                       value="{{$user->email}}">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control"
                                       name="password"
                                       placeholder="Nhap password">
                            </div>

                            <div class="form-group">
                                <label>Chon vai tro</label>
                                <select name="role_id[]" class="form-control select2_init" multiple>
                                    <option value=""></option>
                                    @foreach($roles as $role)
                                        <option {{ $rolesOfUser->contains('id', $role->id) ? 'selected' : '' }}
                                         value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach

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
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script>
        $('.select2_init').select2({
            'placeholder' : 'chon vai tro'
        })
    </script>
@endsection
