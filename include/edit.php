<?php 
$edit_script = '
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
// General options
	mode : "textareas",
	theme : "advanced",
	language : "ru",
	width : "480",
	height : "300",
	plugins : "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager,filemanager",
// Theme options
	theme_advanced_buttons1 : "undo,redo,|,forecolor,backcolor,bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "link,unlink,anchor,image,emotions,charmap,|,search,replace,sub,sup,|,bullist,numlist,outdent,indent,|,blockquote,cite,|,visualchars,nonbreaking,preview",
	theme_advanced_buttons3 : "tablecontrols,hr,removeformat,visualaid,insertlayer,moveforward,movebackward,absolute,code",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : false,
// Example content CSS (should be your site CSS)
	content_css : "css/example.css",
// Drop lists for link/image/media/template dialogs
	template_external_list_url : "js/template_list.js",
	external_link_list_url : "js/link_list.js",
	external_image_list_url : "js/image_list.js",
	media_external_list_url : "js/media_list.js",
});
</script>
'; ?>