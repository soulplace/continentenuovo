<?php
require_once "HTML/Template/IT.php";
$tpl = new HTML_Template_IT("./templates/default/");
$tpl->loadTemplatefile("comment.tpl.htm", true, true);
$tpl->setVariable("USER", "Username") ;
$tpl->setVariable("EMAIL", "Email") ;
$tpl->setVariable("SUBMIT", "Invia") ;
$tpl->parse("comment");
$tpl->show();  
?>
