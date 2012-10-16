<?
if($loggato){
	$username = $user->data['username_clean'];
	$sqlselectrole = "select role from users where id_phpbb = ".$user->data["user_id"]." limit 1";
	$selectrole= $gestdb -> value($sqlselectrole,$db_sito);
	//ruolo
	$role =	$selectrole[0]['role'];
}else{
	$kk = miologin($root_path,$_SERVER["REQUEST_URI"], $phpbb_url);
	print $kk;
}
?>
