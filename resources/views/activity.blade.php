@extends('layout')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
	                    <h2>
	                        Activities
	                    </h2>
	                </div>
					<div class="body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
				                <thead>
				                    <tr>
				                        <th>ID</th>
				                        <th>Name</th>
				                        <th>Status</th>
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
				                        <td>Going</td>
				                        <td>{{date('d M, y', json_decode($activity['startDate'], true))}}</td>
				                        <td>{{date('d M, y', json_decode($activity['endDate'], true))}}</td>
				                        <td>{{date('H.s A', json_decode($activity['startTime'], true))}}</td>
				                        <td>{{date('H.s A', json_decode($activity['endTime'], true))}}</td>
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
@endsection