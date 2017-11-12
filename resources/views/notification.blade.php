@extends('layout')
@section('title', 'Push Notification')
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
                        @if (session()->has('succ'))
                        <div class="alert alert-success">
                            <p>
                                {{ session()->get('succ') }}
                            </p>
                        </div>
                        @endif
                        <form method="post" action="/notifications">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="demo-radio-button">
                                    <input name="group" value="to_user" type="radio" id="radio_1" class="with-gap radio-col-red" checked="">
                                    <label for="radio_1">Send Notification to single user</label>
                                    <input name="group" value="to_group" type="radio" id="radio_2" class="with-gap radio-col-pink">
                                    <label for="radio_2">Send to Group</label>
                                </div>
                            </div>
                            <div class="form-group"  id="GroupSelect">
                                <label>Select Group</label>
                                <div class="form-line">
                                    <select class="ms form-control show-tick"  name="groupselect">
                                        <option value="all">All</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="UserSelect">
                                <label>Select User</label>
                                <div class="form-line">
                                    <select class="ms form-control"  name="userselect">
                                        @foreach($users as $user)
                                        <option value="{{$user['_id']}}"> {{$user['name']}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <labe>Send Push Notification :</label>
                                    <div class="form-line">
                                        <textarea name="msg"  class="form-control" placeholder="write messages here...."  required="" ></textarea>
                                    </div>
                            </div>
                            <div>
                                <button class="btn btn-primary" type="submit">Send</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Widgets -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Messages
                        </h2>
                    </div>
                    <div class="body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        function change() {
            var selectedRadio = $("input[name='group']:checked").val();
            $('#UserSelect').hide();
            $('#GroupSelect').hide();
            if (selectedRadio === "to_user") {
                $('#UserSelect').show();
            } else {
                $('#GroupSelect').show();
            }
        }
        change();
        $("input[name='group']").change(function () {
            change();
        })
    });
</script>
@endsection