<table class="table table-striped">
	<thead>
		<tr>
			<th>Key</th>
			<th>Value</th>
		</tr>
	</thead>
	<tbody>
		@foreach($rows as $row)
			<tr>
				<td><strong>{{ $row['key'] }}</strong></td>
				<td>{{ $row['value'] }}</td>				
			</tr>
		@endforeach	
	</tbody>
</table>