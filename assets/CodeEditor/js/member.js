$(window).load(function() {
	$("#loader").fadeOut();
});
$('#member').click(function(){
	$('#memberquickmenu').toggle();
});
function loginmember()
	{
		$.post('http://kodtest.com/functions/loginmember.php',
		{
			data: $('#loginmemberform').serialize()
		},
		function(data)
		{
			if(data.success)
			{
				$("#loginmsg").html(data.successmessage);
				location.href=data.redirect;
			}
			else
			{ 
				$("#loginmsg").html(data.errormessage);	
			}
		},
		'json'
		);
		return false;
	
	}
	$('#loginmembersubmit').click(function()
	{
		loginmember();
	});

$('#loginmemberform input').bind('keypress', function(e) {
	if(e.keyCode==13){
		loginmember();
	}
});
	function addmember()
	{
		$.post('http://kodtest.com/functions/addmember.php',
		{
			data: $('#addmemberform').serialize()
		},
		function(data)
		{
			if(data.success)
			{
				$("#loginmsg").html(data.message);
				location.href=data.redirect;
			}
			else
			{ 
				$("#loginmsg").html(data.message);
			}
		},
		'json'
		);
		return false;
	}
	$('#addmembersubmit').click(function()
	{
		addmember();
	});
$('#addmemberform input').bind('keypress', function(e) {
	if(e.keyCode==13){
		addmember();
	}
});
	function resetpasswordmember()
	{
		$.post('http://kodtest.com/functions/resetpasswordmember.php',
		{
			data: $('#resetpasswordmemberform').serialize()
		},
		function(data)
		{
			if(data.success)
			{
				$("#loginmsg").html(data.message);
			}
			else
			{ 
				$("#loginmsg").html(data.message);	
			}
		},
		'json'
		);
		return false;
	}
	$('#resetpasswordmembersubmit').click(function()
	{
		resetpasswordmember();
	});
$('#resetpasswordmemberform input').bind('keypress', function(e) {
	if(e.keyCode==13){
		loginmember();
	}
});
	$('#newpasswordmembersubmit').click(function()
	{
		resetpasswordmember();
	});

	 $("#member").click(function(){
		location.href= "http://kodtest.com/user/dashboard/";
	 });
	function deletecode(codeid)
	{
		$.post('http://kodtest.com/functions/deletecode.php',
		{
			codeid:codeid
		},
		function(data)
		{
			if(data.success)
			{
				//location.href=data.redirect;
			}
		},
		'json'
		);
		return false;
	}

	$("input[name='delete']").click(function(){

		var deletecomfirmation=confirm("Silmek istediğinizden eminmisiniz?");
		if (deletecomfirmation==true)
		  {
		  $(this).parents('.row').fadeOut();
			var codeid = $(this).attr("id");
		  	deletecode(codeid);
		  }
		return false;
	});
	$(".row").click(function(){
	     window.location=$(this).find("a").attr("href");
	     return false;
	});
	$("#logsign").click(function(){
	     window.location='http://kodtest.com/user/signin/'; 
	});
	$("#accountsettings").click(function(){
	     window.location='http://kodtest.com/user/accountsettings/'; 
	});
	$("#themebutton").click(function(){
	     window.location='http://kodtest.com/user/theme/';
	});
	$("#logoutbutton").click(function(){
	     window.location='http://kodtest.com/user/signin/?logout=1';
	});
	$("#newcodebuton").click(function(){
	     window.location='http://kodtest.com';
	});
	function savetheme()
	{

			
		$.post('http://kodtest.com/functions/savetheme.php',
		{
			theme: $('#themeselectbox').val()
		},
		function(data)
		{
			if(data.success)
			{
				location.href="http://kodtest.com";
			}
		},
		'json'
		);
		return false;
	}
	$('#changethemebutton').click(function()
	{
		savetheme();
	});

function updatemember()
	{
		$.post('http://kodtest.com/functions/memberinfoupdate.php',
		{
			data: $('#updatememberform').serialize()
		},
		function(data)
		{
			if(data.success)
			{
				$("#loginmsg").html(data.message);
				location.href=data.redirect;
			}
			else
			{ 
				$("#loginmsg").html(data.message);
			}
		},
		'json'
		);
		return false;
	}
	$('#updatemembersubmit').click(function()
	{
		updatemember();
	});	