<?
include_once($root_path . "include/login.php");
/*echo "<pre>";
print_r($user->data);
echo "</pre>";*/
$id_user = $user->data["user_id"];
require_once "HTML/Template/IT.php";
$tpl = new HTML_Template_IT("./templates/default/");
$tpl->loadTemplatefile("band_registration.tpl.htm", true, true);
$tpl->setVariable("ID_USER", $id_user) ;
$tpl->parse("registration");
$tpl->show();
?>
