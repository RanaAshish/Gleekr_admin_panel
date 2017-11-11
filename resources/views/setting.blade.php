@extends('layout')
@section('title', 'Setting')
@section('content')
<section class="content profile">
    <div class="container-fluid">
        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-xs-12 col-sm-6 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Setting
                            </h2>
                        </div>
                        <div class="body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>
                                    {{ $error }}
                                </p>
                                @endforeach
                            </div>
                            @endif
                            @if (session()->has('error'))
                            <div class="alert alert-danger">
                                <p>
                                    {{ session()->get('error') }}
                                </p>
                            </div>
                            @endif
                            <form class="form-horizontal" method="post" action="{{url('/').'/changePassword'}}">
                                {{ csrf_field() }}
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Old password</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input  type="password" name="old_password" class="form-control" placeholder="Old password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>New Password</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input  type="password" name="new_password" class="form-control" placeholder="New password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Retype Password</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input  type="password" name="retype_new_password" class="form-control" placeholder="Retype new password">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Change password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-xs-12 col-sm-6 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Delete All
                            </h2>
                        </div>
                        <div class="body">
                            
                            @if (session()->has('succ'))
                            <div class="alert alert-success">
                                <p>
                                    {{ session()->get('succ') }}
                                </p>
                            </div>
                            @endif
                            <a href="javascript:;" id="delete" class="btn btn-primary">Delete The Database</a>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<script>
    $(function () {
        $("#delete").click(function (e) {
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "You want to delete whole Database.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                location.href = "{{url('/').'/deleteDb'}}"
            });
        });
    });
</script>

@endsection