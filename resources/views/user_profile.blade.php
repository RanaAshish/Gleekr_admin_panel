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
                        User Profile
                    </h2>
                </div>
                <div class="body">
                    <div class="col-sm-6">
                        <img src="http://52.76.246.237:3000{{$user["image"]}}"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- #END# Widgets -->
        
    </div>
</section>

@endsection
