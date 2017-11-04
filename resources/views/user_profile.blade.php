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
                                        @if($user['isDeleted'] == "true")
                                            <i class="glyphicon glyphicon-ok"></i>
                                            Active
                                        @else
                                            <i class="glyphicon glyphicon-remove"></i>
                                            InActive
                                        @endif
                                        
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection
