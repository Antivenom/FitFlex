<div id="articlelayout">
	<h3>Artikelen in de media</h3>

	<div id="articles" class="tile-row">


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
			$('#articles').append( newLine( pageData[i], i % 3 ));
		}
		$('#articles').append(clearfix);
	}

	function newLine(pageData, setRowNumber)
	{
		var colors = [
			"bgm-blue",
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

		var inner = '<div class="article"><div class="card '+ colors[finalNumber()] +'" pageid="'+ pageData['id'] +'"><div class="card-header"><h2>'+ pageData['name'] +'</h2><p>'+ pageData['content'] + '</p></div><label>' + pageData['date'] + '</label></div></div>';

		return inner;

	}

	$('.article').click(function()
	{
		var find = $(this).find('.card-header');
		$(find).toggleClass('toggle');
		console.log('test');
	});

	function randomInt(min, max)
	{
		return Math.floor(Math.random() * (max-min+1)+min);
	}
</script>