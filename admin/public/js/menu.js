var data;
var url = 'http://fitflextraining.nl/admin/index.php/';

function getPage(id)
{
	jQuery.ajax({
		method: "POST",
		url: url + "Menu/getMenuItem",
		data: {
			id: id
		},
		datatype: "json",
		success: function(res)
		{
			var res = JSON.parse(res);

			console.log(res);

			$('.container').fadeOut(399);
			var timeoutContent = setTimeout(function()
			{
				$('.container').html(res['selected']).fadeIn();
				$('#homeBtn').addClass('active');
				$('.date-time-picker').datetimepicker({
					format: 'YYYY/MM/DD HH:mm'
				});
				refresh();
			},400);

			data = res;
		} 
	});
}

function returnHome()
{
    $('#homeBtn').removeClass('active');
    jQuery.ajax({
        method: "POST",
        url: url + "Menu/returnHome",
        success: function(res)
        {
            $('.container').fadeOut(399);
            var timeoutContent = setTimeout(function()
            {
                $('.container').html(res).fadeIn();

                refresh();
            },400);
        }
    });
}
function refresh()
{
	$('.addnew').click(function()
	{
		$(this).off();
		var id = $(this).attr('pageid');
		getPage(id);
	});

	$('form.jsform').on('submit', function(form)
	{
		form.preventDefault();

		switch ($(this).attr('name'))
		{
			case "training":
				createTraining();
				break;
			case "meeting":
				createMeeting();
				break;
			case "article":
				createArticle();
				break;
			default:
				console.log('Er is geen naam bekend voor deze actie');
				break;
		}

	});
}

function clearFormValues()
{
	var form = $('form.jsform').find('input');

	form.each(function(){
		$(this).val('');
	});
}

function createTraining()
{
	$.post(url + "Menu/createTraining", $('form.jsform').serialize(), function(data)
	{
		console.log(data);
		if(data != true)
		{
			$('#error-field').html(data).removeClass('hide');
			$('#submit-button').addClass('warning').html('Oops! Er ging iets mis bij het aanmaken van de Training!');
			var colorTimer = setTimeout(function()
			{
				$('#submit-button').removeClass('warning').html('Aanmaken');
			}, 5000);
		}
		else
		{
			clearFormValues();
			$('#submit-button').addClass('success').html('Training succesvol aangemaakt!');
			var colorTimer = setTimeout(function()
			{
				$('#submit-button').removeClass('success').html('Aanmaken');
			}, 5000);
		}
	});
}

function createMeeting()
{
	$.post(url + "Menu/createMeeting", $('form.jsform').serialize(), function(data)
	{
		console.log(data);
		if(data != true)
		{
			$('#error-field').html(data).removeClass('hide');
			$('#submit-button').addClass('warning').html('Oops! Er ging iets mis bij het aanmaken van de Themabijeenkomst!');
			var colorTimer = setTimeout(function()
			{
				$('#submit-button').removeClass('warning').html('Aanmaken');
			}, 5000);
		}
		else
		{
			clearFormValues();
			$('#submit-button').addClass('success').html('Themabijeenkomst succesvol aangemaakt!');
			var colorTimer = setTimeout(function()
			{
				$('#submit-button').removeClass('success').html('Aanmaken');
			}, 5000);
		}
	});
}

function createArticle()
{
	$.post(url + "Menu/createArticle", $('form.jsform').serialize(), function(data)
	{
		console.log(data);
		if(data != true)
		{
			$('#error-field').html(data).removeClass('hide');
			$('#submit-button').addClass('warning').html('Oops! Er ging iets mis bij het aanmaken van het artikel!');
			var colorTimer = setTimeout(function()
			{
				$('#submit-button').removeClass('warning').html('Aanmaken');
			}, 5000);
		}
		else
		{
			clearFormValues();
			$('#submit-button').addClass('success').html('Artikel succesvol aangemaakt!');
			var colorTimer = setTimeout(function()
			{
				$('#submit-button').removeClass('success').html('Aanmaken');
			}, 5000);
		}
	});
}

function editTraining(id)
{
	jQuery.ajax({
		method: "POST",
		url: url + "Pages/editTraining",
		data: {
			id: id
		},
		datatype: "json",
		success: function(res)
		{
			$('.container').fadeOut(399);
			var timeoutContent = setTimeout(function()
			{
				$('.container').html(res).fadeIn();
				$('#homeBtn').addClass('active');
				refresh();
			},400);
		}
	});
}

function deleteTraining(id)
{
	jQuery.ajax({
		method: "POST",
		url: url + "Pages/deleteTraining",
		data: {
			id: id
		},
		datatype: "json",
		success: function(res)
		{
			$('.container').fadeOut(399);
			var timeoutContent = setTimeout(function()
			{
				$('.container').html(res).fadeIn();
				$('#homeBtn').addClass('active');



				refresh();
			},400);
		}
	});
}

refresh();



$('#homeBtn').click(function()
{
	returnHome();
});