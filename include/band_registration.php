<?
include_once($root_path . "include/login.php");
/*echo "<pre>";
print_r($user->data);
echo "</pre>";*/
if($loggato){
	$id_user = $user->data["user_id"];
	if($role=="0" || $role=="1" || $role=="2"){
		$sqlselect_mod = "select * from songs left join bio on bio.id_user = songs.id_user where bio.id_user = ".$id_user." limit 1";
		$select_mod = $gestdb -> value($sqlselect_mod,$db_sito);
		if(VOTE_SESSION == false){
			//require_once "HTML/Template/IT.php";
			$tpl = new HTML_Template_IT("./templates/default/");
			$tpl->loadTemplatefile("band_registration.tpl.htm", true, true);
			//conrtolliamo se si tratti di un caso di modifica di bio, permessa solo in caso in cui non sia iniziata la sessione di voto.
			//immagine?!?!
			$tpl->setVariable("ALERT", urldecode($_REQUEST['alert'])) ;
			$tpl->setVariable("ID_USER", $id_user) ;
			if($select_mod[0]["id"]>""){				
				($select_mod[0]["nome_band"]>"") ? $tpl->setVariable("NOME_GRUPO", $select_mod[0]["nome_band"]) : null;
				($select_mod[0]["bio"]>"") ? $tpl->setVariable("BIOGRAFIA", $select_mod[0]["bio"])  : null;
				($select_mod[0]["message"]>"") ? $tpl->setVariable("MESSAGGIO", $select_mod[0]["message"])  : null;
				($select_mod[0]["video"]>"") ? $tpl->setVariable("VIDEO", $select_mod[0]["video"])  : null;
				($select_mod[0]["title"]>"") ? $tpl->setVariable("TITOLO_CANZONE", $select_mod[0]["title"])  : null;
				($select_mod[0]["id"]>"") ? $tpl->setVariable("AVVISO", "ATTENZIONE! se inserisci una nuova canzone quella vecchia sar&agrave; cancellata!")  : null;
			}
			$tpl->setVariable("DISABLE", "false") ;
			$tpl->parse("registration");
			$tpl->show();
		}else{
			$tpl = new HTML_Template_IT("./templates/default/");
			$tpl->loadTemplatefile("statistics_band.tpl.htm", true, true);
			$tpl->setVariable("ID_USER", $id_user) ;
			//voti ricevuti e nuovi commenti
			$tpl->parse("statistics_band");
			$tpl->show();
			/*$tpl->setVariable("DISABLE", "true") ;
			$tpl->setVariable("DISABLED", "disabled") ;*/

		}
	}else{
		$messaggio = "Attenzione ".$username."! Il tuo account non &egrave; ancora attivo sul sito!";
		$tpl = new HTML_Template_IT("./templates/default/");
		$tpl->loadTemplatefile("errore_id.tpl.htm", true, true);
		$tpl->setVariable("MESSAGGIO", $messaggio) ;
		$tpl->parse("messaggio");
		$tpl->show();
	}

}
?>
