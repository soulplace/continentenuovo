<?
include_once($root_path . "include/login.php");
/*echo "<pre>";
print_r($user->data);
echo "</pre>";*/
if($loggato){
	$id_user = $user->data["user_id"];
	$sqlselect_mod = "select * from songs left join bio on bio.id_user = songs.id_user where bio.id_user = ".$id_user." limit 1";
	$select_mod = $gestdb -> value($sqlselect_mod,$db_sito);
	require_once "HTML/Template/IT.php";
	$tpl = new HTML_Template_IT("./templates/default/");
	$tpl->loadTemplatefile("band_registration.tpl.htm", true, true);
	//conrtolliamo se si tratti di un caso di modifica di bio, permessa solo in caso in cui non sia iniziata la sessione di voto.
	//immagine?!?!
	if($select_mod[0]["id"]>"" && VOTE_SESSION == false){
		echo "<pre>";
		print_r($select_mod);
		echo "</pre>";
		
		$tpl->setVariable("NOME_GRUPO", $select_mod[0]["nome_band"]) ;
		$tpl->setVariable("BIOGRAFIA", $select_mod[0]["bio"]) ;
		$tpl->setVariable("MESSAGGIO", $select_mod[0]["message"]) ;
		$tpl->setVariable("VIDEO", $select_mod[0]["video"]) ;
		$tpl->setVariable("TITOLO_CANZONE", $select_mod[0]["title"]) ;
		
	}
	if(VOTE_SESSION == false){
		$tpl->setVariable("DISABLE", "false") ;
	}else{
		$tpl->setVariable("DISABLE", "true") ;
		$tpl->setVariable("DISABLED", "disabled") ;
		
	}
	$tpl->setVariable("ID_USER", $id_user) ;
	$tpl->parse("registration");
	$tpl->show();
}
?>
