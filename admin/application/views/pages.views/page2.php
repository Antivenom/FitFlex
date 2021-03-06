<div class="tablelayout">
	<h3>Themabijeenkomsten</h3>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
			<tr>
				<th>Naam</th>
				<th>Datum</th>
				<th>Beschrijving</th>
			</tr>
			</thead>
			<tbody id="tablebody">
			</tbody>
		</table>
	</div>
</div>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

<script type="text/javascript">
	if(data)
	{
		var pageData = data['menuData'];

		for (var i = 0; i < pageData.length; i++)
		{
			newLine(pageData[i]);
		}
	}

	function newLine(pageData)
	{
		var auth = data['userStats']['0']['auth'];

		if( auth == 'admin' || auth == 'mod') {
			var line = '<tr><td>' + pageData['name'] + '</td><td>' + pageData['date'] + '</td><td>' + pageData['description'] + '</td><td><a href="menu/editmeeting/'+ pageData['id'] +'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> &nbsp; <a onclick="deleteMeeting('+ pageData['id'] +')" href="#"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></tr>';
		} else {
			var line = '<tr><td>' + pageData['name'] + '</td><td>' + pageData['date'] + '</td><td>' + pageData['description'] + '</td><td>' + pageData['description'] + '</td></tr>';
		}

		$('#tablebody').append(line);

	}
</script>