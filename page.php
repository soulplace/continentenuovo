<?//error reporting, da commentare in produzione
//error_reporting(E_ALL);
//ini_set('display_errors','On');
//////////////?>
<?
include('include/basic.php');
$title = "nome artista | ".$title;
$description = "descrizione artista"; 
?>
<? include($root_path."/include/header.php");?>
<?
//bio artista
$id_utente = strip_tags($_REQUEST['id']);
$sqlselect = "select message,bio.id_user,songs.id_user,songs.id,title,upload_time,bio.nome_band,bio,image,video from songs left join bio on bio.id_user = songs.id_user where bio.id_user = ".$id_utente." limit 1";
$result = $gestdb -> value($sqlselect,$db_sito);
$select = "select COUNT(*) from votes where id_voted = ".$id_utente;
$sql = $gestdb -> value($select,$db_sito);
$tpl->loadTemplatefile("page.tpl.htm", true, true);
$tpl->setVariable("NOME_BAND", $result[0]['nome_band']) ;
$tpl->setVariable("BIO", $result[0]['bio']) ;
$tpl->setVariable("IMAGE", $result[0]['image']) ;
$tpl->setVariable("MESSAGE", $result[0]['message']) ;
$tpl->setVariable("VOTES", $sql[0][0]) ;
$tpl->parse("page");
$tpl->show();
//Recpero la canzone dell'artista
$sql_song = "select id_user, song, title from songs join users on songs.id_user = users.id_phpbb where songs.id_user =".$id_utente." order by songs.upload_time limit 1";
$song = $gestdb -> value($sql_song,$db_sito);
$song_root_path = "/continentenuovo/files/";
$swf_path = "/continentenuovo/js/jplayer/";
$tpl->loadTemplatefile("player_single.tpl.htm", true, true);
$tpl->setVariable("SWF_PATH",$swf_path) ;
$tpl->setVariable("TITLE", $song[0]['title']) ;
$tpl->setVariable("MEDIA", $song_root_path.$song[0]['song']) ;
$tpl->parse("player");
$tpl->show();
//recupero il video
$width = "600";
$height = "400";
if($result[0]['video']>""){
	$video_url = $result[0]['video'];
	if(eregi("youtube",$video_url)){
		$video_url=str_replace("watch","",$video_url);
		$video_url=str_replace("?v=","v/",$video_url);
		$tpl->loadTemplatefile("youtube.tpl.htm", true, true);

		}else if(eregi("vimeo",$video_url)){ 	
			$video_url=str_replace("http://vimeo.com/","",$video_url);
			$tpl->loadTemplatefile("vimeo.tpl.htm", true, true);

		}
		$tpl->setVariable("WIDTH", $width) ;
		$tpl->setVariable("HEIGHT", $height) ;
		$tpl->setVariable("VIDEOURL", $video_url) ;
		$tpl->parse("video");
		$tpl->show();	
	}	
?>
<? include($root_path."/include/comment.php");?>
<? include($root_path."/include/footer.php");?>
