
var $win = $(window);
		$(window).load(function() {
			$("#loader").fadeOut();
		});
		$(window).unload(function() {
		  $("#loader").fadeIn();
		});


jQuery(function($) {
    $win.resize(resize);
    $('#widget').width($win.width()).height($win.height()-50).split({
        orientation: 'vertical',
        limit: 1
    });
    $('#foo').split({orientation: 'horizontal', limit: 1});
    $('#bar').split({orientation: 'horizontal', limit: 1});
      		codeeditorhtml.setSize('100%', '100%');
  		codeeditorcss.setSize('100%', '100%');
  		codeeditorjs.setSize('100%', '100%');
   $( "#bar .hsplitter" ).attr( "id", "hor1" );
   $( "#foo .hsplitter" ).attr( "id", "hor2" );

   updatePreview();

   $("#coderevisionreport").prop('disabled', true);
	if(tinyurl)
	{
		embedcode();
	}
});
function resize()
{

  $('#widget').width($win.width()).height($win.height()-50);
  		codeeditorhtml.setSize('100%', '100%');
  		codeeditorcss.setSize('100%', '100%');
  		codeeditorjs.setSize('100%', '100%');

}


$(window).resize(function() {
  var $win = $(window);
    $win.resize(resize);
    $('#widget').width($win.width()).height($win.height()-50).split({
        orientation: 'vertical',
        limit: 1
    });
    $('#foo').split({orientation: 'horizontal', limit: 1});
    $('#bar').split({orientation: 'horizontal', limit: 1});
});

$("#coderevisionreport").click(function(){

	 $("#coderevisionreport").prop('disabled', false);
});
      var codeeditorhtml = CodeMirror.fromTextArea(document.getElementById('codeeditorhtml'), {
        mode: 'text/html',
        tabMode: 'indent',
		lineNumbers: true,
		matchBrackets: true,
		autoCloseTags: true,
		extraKeys: {"Ctrl-Q": "toggleComment"},
		styleActiveLine: true,
		profile: 'xhtml',
		autoCloseBrackets: true

      });

    var codeeditorcss = CodeMirror.fromTextArea(document.getElementById('codeeditorcss'), {
        mode: 'text/css',
        tabMode: 'indent',
		lineNumbers: true,
		matchBrackets: true,
		continueComments: "Enter",
		extraKeys: {"Ctrl-Q": "toggleComment"},
		styleActiveLine: true,
		autoCloseBrackets: true
		//gutters: ["CodeMirror-lint-markers"],
		//lint: true
      });

    var codeeditorjs = CodeMirror.fromTextArea(document.getElementById('codeeditorjs'), {
        mode: 'application/typescript',
        tabMode: 'indent',
		lineNumbers: true,
		matchBrackets: true,
		continueComments: "Enter",
		extraKeys: {"Ctrl-Q": "toggleComment"},
		styleActiveLine: true,
		autoCloseBrackets: true,
		gutters: ["CodeMirror-lint-markers"],
		lint: true
    });

    	var runcode=0;
      	function updatePreview() {
        var previewFrame = document.getElementById('preview');
        var preview =  previewFrame.contentDocument ||  previewFrame.contentWindow.document;
        preview.open();

        if($("#layerpreview").is(':checked'))
        {
        	var layerpreview = "\n* { outline: 2px dotted red }\n* * { outline: 2px dotted green }\n* * * { outline: 2px dotted orange }\n* * * * { outline: 2px dotted blue }\n* * * * * { outline: 1px solid red }\n* * * * * * { outline: 1px solid green }\n* * * * * * * { outline: 1px solid orange }\n* * * * * * * * { outline: 1px solid blue }\n";
			var tempcodeeditorcss = '<style type="text/css">\n' + codeeditorcss.getValue() + layerpreview + '\n</style>';
        }
		else
		{
			var tempcodeeditorcss = '<style type="text/css">\n' + codeeditorcss.getValue() + '\n</style>';
		}

        if($("#autopreviewcheckbox").is(':checked')||runcode==1)
        {
	        var tempcodeeditorjs = '\n<!-- js code -->\n<script type="text/javascript">\n//<![CDATA[\n' + codeeditorjs.getValue() + '\n//]]>\n</script>';
	        preview.write(tempcodeeditorcss + codeeditorhtml.getValue() + tempcodeeditorjs);
        }
        else
        {
        	preview.write(tempcodeeditorcss + codeeditorhtml.getValue());
        }

        preview.close();
      }

      $("#layerpreview").click(function(){
        	updatePreview();
      });

      $("#autopreviewcheckbox").click(function(){

      	if($("#autopreviewcheckbox").is(':checked'))
        {
        	updatePreview();
        }

      });
      $("#runcodebutton").click(function(){
      	runcode=1;
      	updatePreview();
      	runcode=0;
      	$("#coderevisionreport").prop('disabled', false);
      });

   		$("#linewrappingcheckbox").click(function(){
	   	if($("#linewrappingcheckbox").is(':checked'))
		{
			codeeditorhtml.setOption("lineWrapping", true);
			codeeditorcss.setOption("lineWrapping", true);
			codeeditorjs.setOption("lineWrapping", true);
			codeeditorhtml.setOption("autoCloseTags", true);

		}
		else
		{
		   codeeditorhtml.setOption("lineWrapping", false);
		   codeeditorcss.setOption("lineWrapping", false);
		   codeeditorjs.setOption("lineWrapping", false);
		   codeeditorhtml.setOption("autoCloseTags", false);
		}
		});


   		$("#autoclosetagscheckbox").click(function(){
	   	if($("#autoclosetagscheckbox").is(':checked'))
		{
			codeeditorhtml.setOption("autoCloseTags", true);

		}
		else
		{
		   codeeditorhtml.setOption("autoCloseTags", false);
		}
		});


      codeeditorhtml.on("change", function() {

        	updatePreview();

		$('#codeeditorhtml').val(codeeditorhtml.getValue());

      });

      codeeditorcss.on("change", function() {
        updatePreview();
		$('#codeeditorcss').val(codeeditorcss.getValue());

      });

        codeeditorjs.on("change", function() {
        	updatePreview();
		$('#codeeditorjs').val(codeeditorjs.getValue());

      });
/*****************************************************************************************/
	var windowsizewidth = $(window).outerWidth(true)-5;
	var windowsizeheight = $(window).outerWidth(true)-55;
    var previewsizewidth = $(window).outerWidth(true)-5;
	var previewsizeheight = $(window).outerWidth(true)-55;
/*****************************************************************************************/
    $('#previewsizewidth').keyup(function(e) {

	windowsizewidth = $(window).outerWidth(true)-5;
	windowsizeheight = $(window).outerHeight(true)-55;
	var tempsizewidth = $(this).val();

	this.value = this.value.replace(/[^0-9\,]/g,'');

	if(windowsizewidth<tempsizewidth)
	{
		tempsizewidth = windowsizewidth;
		$(this).val(windowsizewidth);
		alert("Your maximum preview size " + windowsizewidth +"px!");
	}

	if(windowsizewidth>=tempsizewidth)
	{

		$( "#bar" ).animate({width: tempsizewidth },"fast");
		$(".vsplitter").animate({"left":windowsizewidth-tempsizewidth},"fast",
			function(){
			$('#widget').split().position(windowsizewidth-tempsizewidth+2);
			updatepreviewinput()
  		});
		$( "#foo" ).animate({width: windowsizewidth-tempsizewidth}, "fast");

		codeeditorhtml.setSize('100%', '100%');
		codeeditorcss.setSize('100%', '100%');
		codeeditorjs.setSize('100%', '100%');
	}

});

/*****************************************************************************************/
    $('#previewsizeheight').keyup(function(e) {

	windowsizewidth = $(window).outerWidth(true)-5;
	windowsizeheight = $(window).outerHeight(true)-55;
	var tempsizeheight = $(this).val();

	this.value = this.value.replace(/[^0-9\,]/g,'');

	if(windowsizeheight<tempsizeheight)
	{
		tempsizeheight = windowsizeheight;
		$(this).val(windowsizeheight);
		alert("Your maximum preview size " + windowsizeheight +"px!");
	}

	if(windowsizeheight>=tempsizeheight)
	{


		$("#codejs").animate({"height": windowsizeheight-tempsizeheight}, "fast");
		$("#codepreview").animate({"height": tempsizeheight}, "fast");
		$("#hor1").animate({"top": windowsizeheight-tempsizeheight},"fast",
			function(){
			$('#bar').split().position(windowsizeheight-tempsizeheight+2);
				$("#previewoutputsize").fadeIn("fast");
				previewsizewidth = $('#preview').width()-1;
				previewsizeheight = $('#preview').height()-1;
				$('#outputsizenumber').html(previewsizewidth + "x" + previewsizeheight + " px" );
  		});

		codeeditorhtml.setSize('100%', '100%');
		codeeditorcss.setSize('100%', '100%');
		codeeditorjs.setSize('100%', '100%');
	}

});

/*****************************************************************************************/
$('#previewsize').click(function() { inputwindowresize==1; });
function fullpreview()
{
		windowsizewidth = $(window).outerWidth(true)-5;
		windowsizeheight = $(window).outerHeight(true)-55;

		$( "#foo" ).animate({"width": 0}, "fast");
		$(".vsplitter").animate({"left": 0}, "fast");
		$( "#bar" ).animate({"width": windowsizewidth },"fast",
		function(){

			$("#hor1").animate({"top": 0},"fast");
			$("#codejs").animate({"height": 0}, "fast");
			$("#codepreview").animate({"height": windowsizeheight}, "fast");
			$('#widget').split().position(0);
			$('#bar').split().position(0);
			$('#previewsizewidth').val(windowsizewidth);
			$('#previewsizeheight').val(windowsizeheight);
			updatepreviewinput();
  		});
			codeeditorhtml.setSize('100%', '100%');
			codeeditorcss.setSize('100%', '100%');
			codeeditorjs.setSize('100%', '100%');
}
/*****************************************************************************************/

function previewtablet()
{
		windowsizewidth = $(window).outerWidth(true)-5;
		windowsizeheight = $(window).outerHeight(true)-55;
		var tabletwidth = 991;

		$( "#foo" ).animate({"width": windowsizewidth-tabletwidth}, "fast");
		$(".vsplitter").animate({"left": windowsizewidth-tabletwidth}, "fast");
		$( "#bar" ).animate({"width": tabletwidth },"fast",
		function(){

			$("#hor1").animate({"top": 0},"fast");
			$("#codejs").animate({"height": 0}, "fast");
			$("#codepreview").animate({"height": windowsizeheight}, "fast");
			$('#widget').split().position(windowsizewidth-tabletwidth+2);
			$('#bar').split().position(0);
			$('#previewsizewidth').val(tabletwidth);
			$('#previewsizeheight').val(windowsizeheight);
			updatepreviewinput();

  		});
			codeeditorhtml.setSize('100%', '100%');
			codeeditorcss.setSize('100%', '100%');
			codeeditorjs.setSize('100%', '100%');
}
$('#previewtablet').click(function(){
	previewtablet();
});

function previewphone_h()
{
		windowsizewidth = $(window).outerWidth(true)-5;
		windowsizeheight = $(window).outerHeight(true)-55;
		var phonetwidth = 320;
		var phonetheight = windowsizeheight;
		if(windowsizeheight>=767)
		{
			phonetheight = 767;
		}
		$( "#foo" ).animate({"width": windowsizewidth-phonetwidth}, "fast");
		$(".vsplitter").animate({"left": windowsizewidth-phonetwidth}, "fast");
		$( "#bar" ).animate({"width": phonetwidth },"fast",
		function(){

			$("#hor1").animate({"top": windowsizeheight - phonetheight},"fast");
			$("#codejs").animate({"height": windowsizeheight - phonetheight}, "fast");
			$("#codepreview").animate({"height": phonetheight}, "fast");
			$('#widget').split().position(windowsizewidth-phonetwidth+2);
			$('#bar').split().position(windowsizeheight - phonetheight);
			$('#previewsizewidth').val(phonetwidth);
			$('#previewsizeheight').val(phonetheight);
			updatepreviewinput();
			codeeditorhtml.setSize('100%', '100%');
			codeeditorcss.setSize('100%', '100%');
			codeeditorjs.setSize('100%', '100%');
  		});
			codeeditorhtml.setSize('100%', '100%');
			codeeditorcss.setSize('100%', '100%');
			codeeditorjs.setSize('100%', '100%');
}
$('#previewphone-h').click(function(){
	previewphone_h();
});

function previewphone_w()
{
		windowsizewidth = $(window).outerWidth(true)-5;
		windowsizeheight = $(window).outerHeight(true)-55;
		var phonetwidth = 767;
		var phonetheight = 320;

		$( "#foo" ).animate({"width": windowsizewidth-phonetwidth}, "fast");
		$(".vsplitter").animate({"left": windowsizewidth-phonetwidth}, "fast");
		$( "#bar" ).animate({"width": phonetwidth },"fast",
		function(){

			$("#hor1").animate({"top": windowsizeheight - phonetheight},"fast");
			$("#codejs").animate({"height": windowsizeheight - phonetheight}, "fast");
			$("#codepreview").animate({"height": phonetheight}, "fast");
			$('#widget').split().position(windowsizewidth-phonetwidth+2);
			$('#bar').split().position(windowsizeheight - phonetheight);
			$('#previewsizewidth').val(phonetwidth);
			$('#previewsizeheight').val(phonetheight);
			updatepreviewinput();
			codeeditorhtml.setSize('100%', '100%');
			codeeditorcss.setSize('100%', '100%');
			codeeditorjs.setSize('100%', '100%');
  		});
			codeeditorhtml.setSize('100%', '100%');
			codeeditorcss.setSize('100%', '100%');
			codeeditorjs.setSize('100%', '100%');
}
$('#previewphone-w').click(function(){
	previewphone_w();
});
/*****************************************************************************************/
function updatepreviewinput()
{
	$("#previewoutputsize").fadeIn("fast");
	previewsizewidth = $('#preview').width()-1;
	previewsizeheight = $('#preview').height()-3;
	$('#outputsizenumber').html(previewsizewidth + "x" + previewsizeheight + " px" );
}
$('#fullpreview').click(function(){
	fullpreview();
});
$('#previewsizewidth').bind('input propertychange', function() {
    		$('#previewsizewidth').keyup();
			this.value = this.value.replace(/[^0-9\,]/g,'');
});
$('#previewsizeheight').bind('input propertychange', function() {
    		$('#previewsizeheight').keyup();
			this.value = this.value.replace(/[^0-9\,]/g,'');
});

$('#previewpattern_white').click(function(){

	$('#preview').css("background"," url(images/bg-white.png)");
});
$('#previewpattern_grid_mini').click(function(){

	$('#preview').css("background"," url(images/bg-grid-mini.gif)");
});

$('#previewpattern_blueprint').click(function(){

	$('#preview').css("background","#2574b0 url(images/bg-blueprint.png)");
});

$('#previewpattern_grid').click(function(){
$('#preview').css("background-image","url(images/bg-grid.png)");
});

$('#previewpattern_bg-grid-square').click(function(){

	$('#preview').css("background"," url(images/bg-grid-square.png)");
});

$('#previewpattern_bg-grid-square-dot').click(function(){

	$('#preview').css("background"," url(images/previewpattern_bg-grid-square-dot.png)");

});
	var fork;
	$('#savebutton').click(function()
	{
		$("#codeinfodiv").animate({ "width":"110"},"slow");
		$("#info").css({ "height":"22","padding":"5","margin-right":"5"},"fast");
		$("#info").animate({"width":"100"},"slow");

		if($("#info").val().length>1)
		{
			save();
		}
	});
	$('#fork').click(function()
	{
		fork = 1;
		var forkcomfirmation=confirm("Klonlamak istediğinizden eminmisiniz?");
		if (forkcomfirmation==true)
		  {
		  	save();
		  }

		return false;
	});
	function save()
	{

		$.post('http://kodtest.com/save.php',
		{
			data: $('#codeform').serialize(),
			tinyurl: tinyurl,
			fork: fork
		},
		function(data)
		{
			if(data.success)
			{
				location.href= url + data.redirect;
			}
		},
		'json'
		);
		return false;

	}

$('#revision').on('change', function() {
	location.href = url + tinyurl + '/' + this.value + '/';
})



$('#logsign').click(function() {

	location.href = 'http://kodtest.com/user/signin/';
})

function menubuttoninactive(thisbutton)
{
	$(thisbutton).css("background-image","");
	$(thisbutton).css("background-position","");
	$(thisbutton).css("background-repeat","");

}
function menubuttonactive(thisbutton)
{
	$(thisbutton).css("background-image","url(images/icon/arrow_bottom.png)");
	$(thisbutton).css("background-position"," center 40px");
	$(thisbutton).css("background-repeat","no-repeat");
}

var thisbutton;


var codeinfostate;
$('#codeinfo').click(function(){
	thisbutton = $('#codeinfo');

	$('#settingsmenu, #viewmenu, #librarymenu, #sharemenu').hide();

if(codeinfostate==1)
{

	menubuttoninactive(thisbutton);
	codeinfostate=0;
}
else
{
	menubuttoninactive('.topmenubutton');
	menubuttonactive(thisbutton);
	codeinfostate=1;
	viewmenubuttonstate=0;
	settingsbuttonstate=0;
	librarybuttonstate=0;

}
	$('#codeinfomenu').toggle();
});
/****/
/** **/
var viewmenubuttonstate;
$('#viewmenubutton').click(function(){
	thisbutton = $('#viewmenubutton');

	$('#codeinfomenu, #settingsmenu, #librarymenu, #sharemenu').hide();
	if(viewmenubuttonstate==1)
	{

		menubuttoninactive(thisbutton);
		viewmenubuttonstate=0;
	}
	else
	{
		menubuttoninactive('.topmenubutton');
		menubuttonactive(thisbutton);
		viewmenubuttonstate=1;
		codeinfostate=0;
		settingsbuttonstate=0;
		librarybuttonstate=0;
	}
	$('#viewmenu').toggle();
});
/** **/
var settingsbuttonstate;
$('#settingsmenubutton').click(function(){
	thisbutton = $('#settingsmenubutton');

	$('#codeinfomenu, #viewmenu, #librarymenu, #sharemenu').hide();
	if(settingsbuttonstate==1)
	{

		menubuttoninactive(thisbutton);
		settingsbuttonstate=0;
	}
	else
	{
		menubuttoninactive('.topmenubutton');
		menubuttonactive(thisbutton);
		settingsbuttonstate=1;
		codeinfostate=0;
		viewmenubuttonstate=0;
		librarybuttonstate=0;
	}


	$('#settingsmenu').toggle();
});
/** **/
var librarybuttonstate;
$('#librarymenubutton').click(function(){
	thisbutton = $('#librarymenubutton');

	$('#codeinfomenu, #viewmenu, #settingsmenu, #sharemenu').hide();
	if(librarybuttonstate==1)
	{

		menubuttoninactive(thisbutton);
		librarybuttonstate=0;
	}
	else
	{
		menubuttoninactive('.topmenubutton');
		menubuttonactive(thisbutton);
		librarybuttonstate=1;
		codeinfostate=0;
		viewmenubuttonstate=0;
		settingsbuttonstate=0;
	}
	$('#librarymenu').toggle();
});

var savebuttonstate;
$('#savemenubutton').click(function(){
	thisbutton = $('#savemenubutton');

	$('#codeinfomenu, #viewmenu, #settingsmenu, #librarymenu, #sharemenu').hide();
	if(savebuttonstate==1)
	{

		menubuttoninactive(thisbutton);
		savebuttonstate=0;
	}
	else
	{
		menubuttoninactive('.topmenubutton');
		menubuttonactive(thisbutton);
		librarybuttonstate=0;
		codeinfostate=0;
		viewmenubuttonstate=0;
		settingsbuttonstate=0;
		savebuttonstate=1;
	}


	$('#savemenu').toggle();
});

var sharebuttonstate;
$('#sharemenubutton').click(function(){
	thisbutton = $('#savemenubutton');

	$('#codeinfomenu, #viewmenu, #settingsmenu, #librarymenu ').hide();
	if(sharebuttonstate==1)
	{

		menubuttoninactive(thisbutton);
		sharebuttonstate=0;
	}
	else
	{
		menubuttoninactive('.topmenubutton');
		menubuttonactive(thisbutton);
		librarybuttonstate=0;
		codeinfostate=0;
		viewmenubuttonstate=0;
		settingsbuttonstate=0;
		sharebuttonstate=1;

	}


	$('#sharemenu').toggle();
});


////////////////////////////////////////////////////////////////////////////////////////////////////
/*!
 * jQuery insertAtCaret 1.0
 * http://www.karalamalar.net/
 *
 * Copyright (c) 2013 İzzet Emre Erkan
 * Licensed under Creative Commons Attribution-Share Alike 3.0 Unported License
 * http://creativecommons.org/licenses/by-sa/3.0/
 *
 */


////////////////////////////////////////////////
function addjslibrary(jsid)
{
	var librarycode;
	var returnedcode;
	if(jsid!=100)
	{
		$.getJSON('http://kodtest.com/jslibrary.php', function(data) {
			$.each(data, function(i, item) {
				//alert(item.id+item.url);
				if(item.jslibraryid == jsid)
		   		{
		   			librarycode = '<script src="'+ item.jslibraryurl+'"></script>';
		   		}
			});
		codeeditorhtml.replaceSelection(librarycode, focus);
		codeeditorhtml.focus();
		});
	}
}

$('#addjslibrarybutton').click(function(){
	addjslibrary($('#jslibraryselect').val());
});
function addcsslibrary(cssid)
{
	var librarycode;
	var returnedcode;
	if(cssid!=200)
	{
		$.getJSON('http://kodtest.com/csslibrary.php', function(data) {
			$.each(data, function(i, item) {
				//alert(item.id+item.url);
				if(item.csslibraryid == cssid)
		   		{
		   			librarycode = '<link href="'+ item.csslibraryurl+'" rel="stylesheet" type="text/css" />';
		   		}
			});

			codeeditorhtml.replaceSelection(librarycode, focus);
			codeeditorhtml.focus();

		});
	}
}

$('#addcsslibrarybutton').click(function(){
	addcsslibrary($('#csslibraryselect').val());
});



$( "#codehtml" ).click(function() {
  $( "#codetypelabelhtml" ).fadeOut();

});
$( "#codehtml" ).mouseout(function(){

   	$( "#codetypelabelhtml" ).fadeIn();
});
$( "#codecss" ).click(function() {
  $( "#codetypelabelcss" ).fadeOut();

});
$( "#codecss" ).mouseout(function(){

   	$( "#codetypelabelcss" ).fadeIn();
});
$( "#codejs" ).click(function() {
  $( "#codetypelabeljs" ).fadeOut();

});
$( "#codejs" ).mouseout(function(){

   	$( "#codetypelabeljs" ).fadeIn();
});

var embedcode_tinyurl=tinyurl;
var embedcode_revision=revision;
var embedcode_theme="";
var embedcode_focus="";
var embedcode_code_html="";
var embedcode_code_css="";
var embedcode_code_js="";
var embedcode_code_preview="";
var embedcode_width="";
var embedcode_height="";

$("#embedcode_code_html_checkbox, #embedcode_code_css_checkbox, #embedcode_code_js_checkbox, #embedcode_code_preview_checkbox").click(function() {
  embedcode();
});

function embedcode()
{
	if($("#embedcode_code_html_checkbox").is(':checked'))
	{
		embedcode_code_html = "html,";

	}
	else
	{
		embedcode_code_html = "";
	}
	if($("#embedcode_code_css_checkbox").is(':checked'))
	{
		embedcode_code_css = "css,";

	}
	else
	{
		embedcode_code_css = "";
	}
	if($("#embedcode_code_js_checkbox").is(':checked'))
	{
		embedcode_code_js = "js,";

	}
	else
	{
		embedcode_code_js = "";
	}
	if($("#embedcode_code_preview_checkbox").is(':checked'))
	{
		embedcode_code_preview = "preview";

	}
	else
	{
		embedcode_code_preview = "";
	}
	var embedcode = '<a href="http://kodtest.com/'+ embedcode_tinyurl + '/' + embedcode_revision + '/" id="kodtest-embed">kodtest</a><script src="http://kodtest.com/js/embed.js?embed&code={' + embedcode_code_html + embedcode_code_css + embedcode_code_js + embedcode_code_preview + '}' + embedcode_focus + embedcode_theme + embedcode_width + embedcode_height + '"></script>';
	embedcode = embedcode.replace(",}","}");

	$("#sharecodebox").val(embedcode);
}
	$('#downloadbutton').click(function()
	{
		if(tinyurl)
		{
			$('#codeform').get(0).setAttribute('action', 'http://kodtest.com/functions/downloadcode.php'); //this works
			$("#codeform").submit();
		}
		else
		{
			$("#codeinfodiv").animate({ "width":"110"},"slow");
			$("#info").css({ "height":"22","padding":"5","margin-right":"5"},"fast");
			$("#info").animate({"width":"100"},"slow");

			if($("#info").val()!="")
			{
				$('#codeform').get(0).setAttribute('action', 'http://kodtest.com/functions/downloadcode.php'); //this works
				$("#codeform").submit();
			}
	  	}
	});
	/////////////////

	///
	/*
	var htmltabbutton_state = 1;
	var csstabbutton_state = 1;
	var jstabbutton_state = 1;
	var previewtabbutton_state = 1;

	$('#htmltabbutton').click(function(){

		if()

		windowsizewidth = $(window).outerWidth(true)-5;
		windowsizeheight = $(window).outerHeight(true)-55;
		var tabletwidth = 991;

		$( "#foo" ).animate({"width": windowsizewidth-tabletwidth}, "fast");
		$(".vsplitter").animate({"left": windowsizewidth-tabletwidth}, "fast");
		$( "#bar" ).animate({"width": tabletwidth },"fast",
		function(){

			$("#hor1").animate({"top": 0},"fast");
			$("#codejs").animate({"height": 0}, "fast");
			$("#codepreview").animate({"height": windowsizeheight}, "fast");
			$('#widget').split().position(windowsizewidth-tabletwidth+2);
			$('#bar').split().position(0);
			$('#previewsizewidth').val(tabletwidth);
			$('#previewsizeheight').val(windowsizeheight);
			updatepreviewinput();

  		});
			codeeditorhtml.setSize('100%', '100%');
			codeeditorcss.setSize('100%', '100%');
			codeeditorjs.setSize('100%', '100%');

	});
	*/
