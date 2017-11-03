@extends('layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Users</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">Total Users</div>
                        <div class="number count-to" data-from="0" data-to="{{$user_cnt}}" data-speed="15" data-fresh-interval="20">
                            {{$user_cnt}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">face</i>
                    </div>
                    <div class="content">
                        <div class="text">New Users</div>
                        <div class="number count-to" data-from="0" data-to="257" data-speed="{{$nuser_cnt}}" data-fresh-interval="20">
                            {{$nuser_cnt}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">gps_fixed</i>
                    </div>
                    <div class="content">
                        <div class="text">Total Activity</div>
                        <div class="number count-to" data-from="0" data-to="{{$activity_cnt}}" data-speed="1000" data-fresh-interval="20">
                            {{$activity_cnt}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                    </div>
                    <div class="content">
                        <div class="text">New Activity</div>
                        <div class="number count-to" data-from="0" data-to="{{$nactivity_cnt}}" data-speed="1000" data-fresh-interval="20">
                            {{$nactivity_cnt}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Widgets -->
        
    </div>
</section>

@endsection