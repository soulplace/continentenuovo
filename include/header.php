<?php
//possiamo separare questo file per rendere diversi title e description a seconda del tipo di pagina e dell'artista
require_once "HTML/Template/IT.php";
$tpl = new HTML_Template_IT("./templates/default/");
$tpl->loadTemplatefile("header.tpl.htm", true, true);
$tpl->setVariable("TITLE", $title) ;
$tpl->setVariable("DESCRIPTION", $description) ;
//include("include/basic.php");
if(preg_match("/page/i",$_SERVER["PHP_SELF"])){
	$tpl->setVariable("PLAYER_CSS","/continentenuovo/js/jplayer/skin/blue.monday_single/jplayer.blue.monday.css");
}else{
	$tpl->setVariable("PLAYER_CSS","/continentenuovo/js/jplayer/skin/blue.monday/jplayer.blue.monday.css");
}

$tpl->parse("header");
$tpl->show();
/************* CONTROLLO LOGIN ************/
$user->session_begin();
$auth->acl($user->data);
$user->setup();
if ($user->data['user_id'] == ANONYMOUS) {
	$loggato = false;
} else {
	$loggato = true;	
}

/******************************************/
?>
<?include_once($root_path . "include/menu.php");?>

<div id="content">
	<div class="container">
	<?include_once($root_path . "include/sidebar.php");?>
