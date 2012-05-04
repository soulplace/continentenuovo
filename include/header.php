<?php
//possiamo separare questo file per rendere diversi title e description a seconda del tipo di pagina e dell'artista
if($artist>"" && $artist_description>""){
	$title = $artist." | il download dei miei sogni";
	$description = $artist_description;
}else{
	$title = "Continente Nuovo";
	$description ="progetto musicale";
}
require_once "HTML/Template/IT.php";
$tpl = new HTML_Template_IT("./templates/default/");
$tpl->loadTemplatefile("header.tpl.htm", true, true);
$tpl->setVariable("TITLE", $title) ;
$tpl->setVariable("DESCRIPTION", $description) ;
include("include/basic.php");


$tpl->parse("header");
$tpl->show();
?>
