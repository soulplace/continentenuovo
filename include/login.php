<?
if($loggato){
	$username = $user->data['username_clean'];
}else{
	$kk = miologin($root_path,$_SERVER["REQUEST_URI"], $phpbb_url);
  print $kk;
}
?>