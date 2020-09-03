@extends('layouts.admin')

@section('title')
    <title>Add Role</title>
@endsection

{{--@section('sidebar')--}}
{{--    @parent--}}

{{--    <p>This is appended to the master sidebar.</p>--}}
{{--@endsection--}}

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Role', 'key' => 'Add'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="" method="post" enctype="multipart/form-data" style="width: 100%">
                        <div class="col-md-12">

                            @csrf
                            <div class="form-group">
                                <label>Ten Role</label>
                                <input type="text" class="form-control"
                                       name="name"
                                       placeholder="Nhap ten Role"
                                       value="{{old('name')}}">
                            </div>

                            <div class="form-group">
                                <label>Mo ta Role</label>
                                <textarea type="text" class="form-control"
                                          name="display_name"
                                          rows="5"
                                          placeholder="Mo ta vai tro">{{old('display_name')}}</textarea>
                            </div>


                        </div>

                        <div class="col-md-12">

                            <div class="row">

                                @foreach($permissionsParents as $permissionsParent)
                                    <div class="card border-primary mb-3 mb-3 col-md-12">
                                        <div class="card-header" style="background-color:deepskyblue">
                                            <label>
                                                <input type="checkbox" value="{{ $permissionsParent->id }}"
                                                       class="checkbox_wrapper">
                                            </label>
                                            Module {{$permissionsParent->name}}
                                        </div>

                                        <div class="row">
                                            @foreach($permissionsParent->permissionsChildren as $permissionsChild)
                                                <div class="card-body text-primary col-md-3">
                                                    <h5 class="card-title">
                                                        <label>
                                                            <input type="checkbox" name="permission_Id[]"
                                                                   value=" {{ $permissionsChild->id }}"
                                                                   class="checkbox_children">
                                                        </label>
                                                        {{ $permissionsChild->name }}
                                                    </h5>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <script>
        $('.checkbox_wrapper').on('click', function (){
            $(this).parents('.card').find('.checkbox_children').prop('checked', $(this).prop('checked'));
        });
    </script>
@endsection


