<div id="toollayout">
	<h3>Handige Tools</h3>

	<div id="tools" class="tile-row">

	</div>
</div>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

<script type="text/javascript">
	var prevNumber = 0;
	var prevRowNumber = [0,1,2];
	var number = 0;
	var clearfix = '<div class="clearfix"></div>';
	if(data)
	{
		var pageData = data['menuData'];

		console.log(pageData);

		for (var i = 0; i < pageData.length; i++)
		{
			$('#tools').append( newLine( pageData[i], i % 3 ));
		}
		$('#tools').append(clearfix);
	}

	function newLine(pageData, setRowNumber)
	{
		var colors = [
			//"bgm-indigo",
			"bgm-blue",
			//"bgm-red",
			//"bgm-pink",
			//"bgm-deeppurple",
			//"bgm-amber",
			//"bgm-orange",
			//"bgm-deeporange",
			"bgm-gray",
			"bgm-bluegray"
		];

		var finalNumber = function colorCheck()
		{
			number = randomInt(0, 2);

			if (prevNumber !== number && prevRowNumber[setRowNumber] !== number)
			{
				prevNumber = number;
				prevRowNumber[setRowNumber] = number;
				return number;
			}
			else
			{
				console.log('previous color same color.');
				return colorCheck();
			}
		};

		var inner = '<div class="col-md-4"><div class="card row waves-effect effect menu '+ colors[finalNumber()] +'"><div class="card-header"><h2>'+ pageData['name'] +'</h2></div></div></div>';

		return inner;

	}

	function randomInt(min, max)
	{
		return Math.floor(Math.random() * (max-min+1)+min);
	}
</script>