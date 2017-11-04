@extends('layout')
@section('title', 'Users')
@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Users
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Username</th>
                                        <th>Mobile No.</th>
                                        <th>Member Since</th>
                                        <th>Activity Count</th>
                                        <th>Country</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td><a href="/users/{{$user["_id"]}}">{{$user["_id"]}}</a></td>
                                        <td>{{ isset($user['name']) ? $user['name'] : 'N/A' }}</td>
                                        <td>{{ isset($user['mobileNo']) ? $user['mobileNo'] : 'N/A' }}</td>
                                        <td>{{ date('d M, Y', strtotime($user['createdAt'])) }}</td>
                                        <td>{{ isset($user['activities']) ? count($user['activities']) : 'N/A' }}</td>
                                        <td>{{ isset($user['country']) ? $user['country'] : 'N/A' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Widgets -->

    </div>
</section>

@endsection
