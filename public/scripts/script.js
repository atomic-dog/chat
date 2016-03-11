function majDate()
{
	$('.date_message').each(function()
	{
		var date = $(this).text();
		var str = moment(date).fromNow();
		$(this).html(str);
	});
}

function refresh()
{
  $.get('index.php?page=message&ajax', function(html)
  {
   $('.js_msglist').html(html);
   majDate();
 	});
}

$(function()
{
	$('.js_form').submit(function(info)
	{
		info.preventDefault();
		var texte = $('.js_input').val();
		$.post('home', {content_message:texte,action:"create"}, function()
		{
			$('.js_input').val('').focus();
			refresh();
		});
		return false;
	});
	setInterval(function()
	{
		refresh();
	}, 1000);
	majDate();
});
