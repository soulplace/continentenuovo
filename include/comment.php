<?php
//include_once($root_path . "include/login.php");
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
if($_REQUEST['erase']=="erase"){
	$sqlselectcommentoerase = "select id_user from comments where id= '".strip_tags($_REQUEST['id_comm'])."' limit 1";
	$selectcommentoerase = $gestdb -> value($sqlselectcommentoerase,$db_sito);
	if($selectcommentoerase[0]['id_user']==$user->data['user_id']){
		$sqldeletecommento = "update comments set approved = 'n' where id = '".strip_tags($_REQUEST['id_comm'])."' limit 1";
		$deletecommento = $gestdb -> query($sqldeletecommento,$db_sito);
		?>
			<script type="text/javascript">
			alert("Commento eliminato!");
			//location.href=location.href;
			</script>
		<?
	}else{
		?>
			<script type="text/javascript">
			alert("Attenzione, non hai i permessi per cancellare questo commento");
			</script>
		<?
	}
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
	
	$sqlselectusername = "select * from phpbb_users where user_id = '".$value['id_user']."' limit 1";
	$selectusername = $gestdbphpbb -> value($sqlselectusername,$db_phpbb);
	/*echo "<pre>";
	print_r($selectusername);
	echo "</pre>";*/
	echo "useravatar".urlencode($selectusername[0]['user_avatar']);
	if($selectusername[0]['user_avatar']>""){
		$user_image = "/forum/download/file.php?avatar=".$selectusername[0]['user_avatar'];
	}else{
		$user_image = "/forum/styles/DirtyBoard2.0/theme/images/no_avatar.gif";
	}
	?>
	<li class="box-comment"> 
		<p class="header_comment" >
		<img src="<?php echo $user_image ?>" /><span> <?php echo $selectusername[0]['username'];?></span> <small><? echo $value['time'];?></small><? if($value['id_user'] == $user->data['user_id']){?> <span class="erase" ><a href="?id=<?echo $id_utente?>&amp;erase=erase&amp;id_comm=<?echo $value['id']?>">Elimina</a></span><?}?></p>
		<p class="comment_body">
		
	<?php echo $value['message']; ?>
	</p>
	</li>
	
<?}
$gestdb->close_db($db_phpbb);
?>
</ol>

