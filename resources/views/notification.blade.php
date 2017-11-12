@extends('layout')
@section('title', 'User Profile')
@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Push Notification
                        </h2>
                    </div>
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <li role="presentation" class="active"><a href="#home" data-toggle="tab" aria-expanded="false">HOME</a></li>
                            <li role="presentation" class=""><a href="#profile" data-toggle="tab" aria-expanded="true">All User</a></li>
                            <li role="presentation" class=""><a href="#messages" data-toggle="tab" aria-expanded="false">Active User</a></li>
                            <li role="presentation" class=""><a href="#settings" data-toggle="tab" aria-expanded="false">In-Active User</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="home">
                                <form method="post" action="/notifications">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label>Select User</label>
                                        <select class="ms form-control" name="user" required="">
                                            <option value="">Select User</option>
                                            @foreach($users as $user)
                                            <option value="{{$user['_id']}}"> {{$user['name']}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <labe>Send Push Notification :</labe>
                                        <textarea name="msg"  class="form-control" placeholder="write messages here...."  required="" ></textarea>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary">Send</button>
                                    </div>
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="profile">
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
                                                <td><a href="/users/{{$user['_id']}}">{{$user["_id"]}}</a></td>
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
                            <div role="tabpanel" class="tab-pane fade" id="messages">
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
                                            @foreach ($active_users as $user)
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
                            <div role="tabpanel" class="tab-pane fade" id="settings">
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
                                            @foreach ($inactive_users as $user)
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
            </div>
        </div>
        <!-- #END# Widgets -->

    </div>
</section>

@endsection