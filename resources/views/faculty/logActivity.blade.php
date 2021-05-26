

	<h1>Log Activity Lists</h1>

	<table class="table table-bordered">

		<tr>

			<th>No</th>

			<th>log_name</th>

			<th>description </th>

			<th>subject_typ</th>

			<th> 	causer_type</th>

			<th width="300px"> 	properties</th>

			<th>created_at </th>

			<th>Action</th>

		</tr>

        @foreach ($log as $logs)









        @endforeach

			@foreach($log as $logs)

			<tr>

				<td></td>

				<td>{{$logs->id}}</td>

				<td class="text-success">
                    {{$logs->log_name}}
                </td>

				<td><label class="label label-info">{{$logs->description}}</label></td>

				<td class="text-warning">{{$logs->subject_type}}</td>

				<td class="text-danger">{{$logs->properties}}</td>

				<td>{{$logs->created_at}}</td>


				<td><button class="btn btn-danger btn-sm">Delete</button></td>

			</tr>

			@endforeach



	</table>




