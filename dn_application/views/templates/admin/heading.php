<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DealNinja</title>


<meta name="description" content="America's Premiere Insurance Compliance Company">
<meta name="keywords" content="insurance licensing,insurance compliance">

<link rel="shortcut icon" href="<?=base_url() ?>images/favicon.png" /> 
<link rel="bookmark icon" href="<?=base_url() ?>images/favicon.png" /> 

<link href="<?=base_url() ?>css/main.css" rel="stylesheet" type="text/css" />

<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script-->


<script type="text/javascript" src='<?=base_url() ?>js/form_validate.js'></script>
<script type="text/javascript" src='<?=base_url() ?>js/custom.js'></script>
<script type="text/javascript" src='<?=base_url() ?>js/ajax.js'></script>

<link href="<?=base_url() ?>css/layout.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url() ?>css/wysiwyg.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url() ?>themes/blue/styles.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url() ?>css/administration/main.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="/js/tablesorter/themes/blue/style.css" />


<script type="text/javascript" src="http://dwpe.googlecode.com/svn/trunk/_shared/EnhanceJS/enhance.js"></script>	
<script type='text/javascript' src='http://dwpe.googlecode.com/svn/trunk/charting/js/excanvas.js'></script>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.1/jquery.min.js'></script>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js'></script>
<script type='text/javascript' src='<?=base_url() ?>js/jquery.wysiwyg.js'></script>
<script type='text/javascript' src='<?=base_url() ?>js/visualize.jQuery.js'></script>
<script type="text/javascript" src='<?=base_url() ?>js/functions.js'></script>
    <script type="text/javascript" src="/js/tablesorter/jquery.tablesorter.min.js"></script>
    
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!-- -->
<!--[if IE 6]>
<script type='text/javascript' src='scripts/png_fix.js'></script>
<script type='text/javascript'>
  DD_belatedPNG.fix('img, .notifycount, .selected');
</script>
<![endif]--> 


<!-- TinyMCE -->
<script type="text/javascript" src="<?=base_url(); ?>js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
<!--	
	tinyMCE.init({
		// General options
		//mode : "textareas",
		mode : "specific_textareas",
        editor_selector : "custom_email_body",
		theme : "advanced",
		plugins : "",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,fontsizeselect,|,forecolor,backcolor",

		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "center",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : false,
		
		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});	
	
	tinyMCE.init({
		// General options
		//mode : "textareas",
		mode : "specific_textareas",
        editor_selector : "custom_textarea_links",
		theme : "advanced",
		plugins : "table",


		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,forecolor,backcolor,|,justifyleft,justifycenter,justifyright,justifyfull,inserttable",
		theme_advanced_buttons2 : "bullist,numlist,outdent,indent,|,styleselect,fontsizeselect,|,link,image",
   		theme_advanced_buttons3 : "tablecontrols",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "center",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : false,
		
		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});	
	
	
	tinyMCE.init({
		// General options
		//mode : "textareas",
		mode : "specific_textareas",
        editor_selector : "custom_textarea_links_cms",
		theme : "advanced",
		plugins : "table",


		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,forecolor,backcolor,|,justifyleft,justifycenter,justifyright,justifyfull,inserttable",
		theme_advanced_buttons2 : "bullist,numlist,outdent,indent,|,styleselect,fontsizeselect,|,link",
   		theme_advanced_buttons3 : "tablecontrols",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "center",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : false,
		
		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});	
	
	

	
-->	
</script>
<!-- /TinyMCE -->

<script> 
$(document).ready(function(){
	$(".menu_h").click(function(){
		$("#leftside").fadeOut();
		document.getElementById('leftside_min').style.display = 'block';
		document.getElementById('breadcrumb').style.marginLeft = '60px';
		document.getElementById('rightside').style.margin = '20px 20px 20px 60px';
	});
	$(".menu_s").click(function(){
		$("#leftside").fadeIn();
		document.getElementById('leftside_min').style.display = 'none';
		document.getElementById('breadcrumb').style.margin = '0 0 0 226px';
		document.getElementById('rightside').style.margin = '20px 20px 0 250px';
	});
	
	$("#cb_lookup_banks").click(function(){


		if ($('#cb_lookup_banks').is(':checked')) {
			$("#lookup_banks").fadeIn();
			$("#cb_lookup_tiers").attr('checked', false); // Uncheck other Box
			$("#lookup_tiers").fadeOut();
		} else {
			$("#lookup_banks").fadeOut();
		}										 
								 
		
		
	});	

		$("#cb_lookup_tiers").click(function(){


		if ($('#cb_lookup_tiers').is(':checked')) {
			$("#lookup_tiers").fadeIn();
			$("#cb_lookup_banks").attr('checked', false); // Uncheck other Box
			$("#lookup_banks").fadeOut();
		} else {
			$("#lookup_tiers").fadeOut();
			
		}										 
								 
		
		
	});	

	$(function() {
	$( "#loadergif" ).dialog({
			autoOpen: false,
			height: 550,
			width: 400,
			modal: true,
			closeOnEscape: false,
			open: function(event, ui) { $(".ui-dialog-titlebar-close", ui.dialog | ui).hide(); }
	
		});
	});

	
});

function build_tiers(which) {

mes = '';

	if (document.getElementById('bank_' + which + '_tiers').value == '') {
		mes = mes + 'Enter the number of years ranges/tiers\n';
		changeClass('bank_' + which + '_tiers', 'inputbox inputboxsmsm errorbox');
	} else {
		
		changeClass('bank_' + which + '_tiers', 'inputbox inputboxsmsm');
	}
	
	if (mes != '') {
		
		

		
	} else {
		
		tiers = document.getElementById('bank_' + which + '_tiers').value;
		temp_op = '<table><thead><tr><td></td><th><div style="text-align:center">Start Value</div></th><th><div style="text-align:center">End Value</div></th>';
		if (which == 'year') {
			temp_op = temp_op + '<th><div style="text-align:center">Max. Term</div></th>';
		}
		temp_op = temp_op + '</tr></thead>';
		
		for (i=1;i<=tiers;i++) {
			
			temp_op = temp_op + '<tr><td>Tier ' + i + '</td>';
			temp_op = temp_op + '<td><input type="text" id="bank_' + which + '_start_' + i + '" name="bank_' + which + '_start_' + i + '" class="inputbox inputboxsmsm" /></td>';
			temp_op = temp_op + '<td><input type="text" id="bank_' + which + '_end_' + i + '" name="bank_' + which + '_end_' + i + '" class="inputbox inputboxsmsm" /></td>';
			
			if (which == 'year') {
				temp_op = temp_op + '<td><input type="text" id="bank_' + which + '_term_' + i + '" name="bank_' + which + '_term_' + i + '" class="inputbox inputboxsmsm" /></td>';
			}
	
			temp_op = temp_op + '</tr>';
		}
		temp_op = temp_op + '</table>';
		
		//alert(temp_op);
		document.getElementById('bank_' + which + '_chart').innerHTML = temp_op;
		$("#bank_" + which + "_chart").fadeIn(2000);		
		
	}

}
	
</script>


</head>

