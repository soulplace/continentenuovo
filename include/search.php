<?php
require_once "HTML/Template/IT.php";
$tpl = new HTML_Template_IT("./templates/default/");
$tpl->loadTemplatefile("search.tpl.htm", true, true);
$tpl->setVariable("SEARCH", "Cerca...") ;
$tpl->parse("search");
$tpl->show();
?>