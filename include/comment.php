<?php
include_once($root_path . "include/login.php");
if($loggato){
	$image= $user->data["user_avatar"];
	
	require_once "HTML/Template/IT.php";
	$tpl = new HTML_Template_IT("./templates/default/");
	$tpl->loadTemplatefile("comment.tpl.htm", true, true);
	$tpl->setVariable("USER", $username) ;
	$tpl->setVariable("USER_ID", $user->data["user_id"]) ;
	$tpl->setVariable("ID_COMMENTED", $id_utente) ;
	$tpl->setVariable("SUBMIT", "Invia") ;
	$tpl->setVariable("IMAGE", $image) ;
	$tpl->parse("comment");
	$tpl->show(); 
}
$sqlselectcommenti = "select * from comments where id_commented = '".$id_utente."' and approved = 'y' order by time ASC";
$selectcommenti = $gestdb -> value($sqlselectcommenti,$db_sito);
//OUTPUT COMMENTI ESISTENTI
//aggiustare orario nei commenti
?>
	<ol id="update">
<?
foreach($selectcommenti as $key=> $value){
	//mi collego al db di phpbb
	$gestdbphpbb = new gestdb();
	$db_phpbb = $gestdb -> conn_db( $dbhost , $dbuser , $dbpass );
	$gestdbphpbb -> use_db( $dbnamephpbb , $db_phpbb );
	
	$sqlselectusername = "select username,user_avatar from phpbb_users where user_id = '".$value['id_user']."' limit 1";
	$selectusername = $gestdbphpbb -> value($sqlselectusername,$db_phpbb);
	?>
	<li class="box"> 
		<img src="/phpbb/download/file.php?avatar=<?php echo $selectusername[0]['user_avatar'] ?>" /><span> <?php echo $selectusername[0]['username'];?></span> <small><? echo $value['time'];?></small><br /><br />

	<?php echo $value['message']; ?>
	</li>
	
<?}
?>
</ol>