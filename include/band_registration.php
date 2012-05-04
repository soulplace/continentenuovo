<link rel="stylesheet" type="text/css" href="/continentenuovo/js/uploadify/uploadify.css" />
<link href="/continentenuovo/js/ckeditor/ckeditor.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/continentenuovo/js/uploadify/jquery.uploadify-3.1.min.js"></script>
<script type="text/javascript" src="/continentenuovo/js/ckeditor/ckeditor.js"></script>
<?
include_once($root_path . "include/login.php");
/*echo "<pre>";
print_r($user->data);
echo "</pre>";*/
if($loggato){
	$id_user = $user->data["user_id"];
	require_once "HTML/Template/IT.php";
	$tpl = new HTML_Template_IT("./templates/default/");
	$tpl->loadTemplatefile("band_registration.tpl.htm", true, true);
	$tpl->setVariable("ID_USER", $id_user) ;
	$tpl->parse("registration");
	$tpl->show();
}
?>
