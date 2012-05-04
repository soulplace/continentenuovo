<?
if($loggato){
	$ww = miologout($root_path,$_SERVER["REQUEST_URI"], $web_url . "/logout.php");
	print $ww;
}
?>