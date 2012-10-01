<?
if($loggato){
	$ww = miologout($root_path,$_SERVER["REQUEST_URI"], $phpbb_url . "ucp.php?mode=logout&sid=".$user->data['session_id']);
	print $ww;
}
?>