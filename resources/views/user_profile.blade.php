@extends('layout')
@section('title', 'User Profile')
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
                                User Profile
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-sm-6 col-md-4 image-container"> 
                                    <div class="image-wrapper">
                                        @if(isset($user["image"]))
                                        <img src="{{config('constants.SERVER_URL').$user["image"]}}" alt="" class="img-rounded img-responsive" />
                                        @else
                                        <img src="{{url('/')}}/images/default_user.png" alt="" class="img-rounded img-responsive" />
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-8 content">
                                    <h4>
                                        {{isset($user['name']) ? $user['name'] : 'N/A'}}
                                    </h4>
                                    <p>
                                        <i class="glyphicon glyphicon-map-marker"></i>
                                        {{isset($user['city']) ? $user['city'] : ''}}
                                        {{isset($user['state']) ? $user['state'] : ''}}
                                        {{isset($user['country']) ? $user['country'] : ''}}
                                    </p>
                                    <p>
                                        <i class="glyphicon glyphicon-envelope"></i>
                                        {{(isset($user['email']) && !empty($user['email'])) ? $user['email'] : 'N/A'}}
                                    </p>
                                    <p>
                                        <i class="glyphicon glyphicon-gift"></i>
                                        {{ date('d M, Y', strtotime($user['createdAt'])) }}
                                    </p>
                                    <p>
                                        @if(!$user['isDeleted'])
                                        <i class="glyphicon glyphicon-ok"></i>
                                        Active
                                        @else
                                        <i class="glyphicon glyphicon-remove"></i>
                                        InActive
                                        @endif

                                    </p>
                                </div>
                                <div class="col-sm-12 text-right">
                                    <!--<button type="button" class="btn btn-danger waves-effect">Block</button>-->
                                    @if(!$user['isDeleted'])
                                        <button type="button" class="btn btn-primary waves-effect" id="delete">Delete</button>
                                    @endif
                                </div>
                            </div>
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
                                User Activity
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>StartTime</th>
                                            <th>EndTime</th>
                                            <th>Location</th>
                                            <th>Price($)</th>
                                            <th>Members</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($activities as $activity)
                                        <tr>
                                            <td>{{$activity['_id']}}</td>
                                            <td>{{$activity['name']}}</td>
                                            <td>{{date('d M, Y', strtotime($activity['startDate']))}}</td>
                                            <td>{{date('d M, Y', strtotime($activity['endDate']))}}</td>
                                            <td>{{date('H.s A', strtotime($activity['startTime']))}}</td>
                                            <td>{{date('H.s A', strtotime($activity['endTime']))}}</td>
                                            <td>{{$activity['location']}}</td>
                                            <td>{{$activity['costPerPerson']}}</td>
                                            <td>{{$activity['noOfParticipants']}}</td>
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
</section>
<script>
    $(function () {
        $("#delete").click(function(){
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                console.log("{{url('/').'/users/delete/'.$user['id'].'/true'}}");
                location.href = "{{url('/').'/users/delete/'.$user['id'].'/true'}}"
            });           
        });
    });
</script>

@endsection