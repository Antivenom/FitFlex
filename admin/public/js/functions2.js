
var data;

function getPage(id)
{
	jQuery.ajax({
		method: "POST",
		url: "http://fitflextraining.nl/admin/index.php/Pages/getMenuItem",
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
		url: "http://fitflextraining.nl/admin/index.php/Pages/returnHome",
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
	$('.menu').click(function()
	{
		$(this).off();
		var id = $(this).attr('pageid');
		getPage(id);
	});
}

function createTraining()
{
	jQuery.ajax({
		method: "POST",
		url: "http://fitflextraining.nl/admin/index.php/Pages/createTraining",
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

function editTraining(id)
{
	jQuery.ajax({
		method: "POST",
		url: "http://fitflextraining.nl/admin/index.php/Pages/editTraining",
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

function editMeeting(id)
{
	jQuery.ajax({
		method: "POST",
		url: "http://fitflextraining.nl/admin/index.php/Pages/editMeeting",
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
		url: "http://www.fitflextraining.nl/admin/index.php/Menu/deleteTraining",
		data: {
			id: id
		},
		datatype: "json",
		success: function(res)
		{
			$('.container').fadeOut(399);
			var timeoutContent = setTimeout(function()
			{
				$('.container').html('<div class="alert alert-success text-center">De training is succesvol verwijderd.</div>').fadeIn();
				$('#homeBtn').addClass('active');
				refresh();
			},400);
		}
	});
}

function deleteMeeting(id)
{
	jQuery.ajax({
		method: "POST",
		url: "http://www.fitflextraining.nl/admin/index.php/Menu/deleteMeeting",
		data: {
			id: id
		},
		datatype: "json",
		success: function(res)
		{
			$('.container').fadeOut(399);
			var timeoutContent = setTimeout(function()
			{
				$('.container').html('<div class="alert alert-success text-center">De meeting is succesvol verwijderd.</div>').fadeIn();
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

$('.changepass').click(function()
{
	changePassword();
});

function changePassword()
{
	jQuery.ajax({
		method: "POST",
		url: "http://fitflextraining.nl/admin/index.php/User/changepassword",
		datatype: "json",
		success: function(res)
		{
			$('.container').fadeOut(399);
			var timeoutContent = setTimeout(function()
			{
				$('.container').html(res).fadeIn();
			},400);
		}
	});
}