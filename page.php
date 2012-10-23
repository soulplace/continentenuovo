<?//error reporting, da commentare in produzione
//error_reporting(E_ALL);
//ini_set('display_errors','On');
//////////////?>
<?
///html_entity_decode() per bio e message
include('include/basic.php');
$id_utente = strip_tags($_REQUEST['id']);
$sqlselect = "select message,bio.id_user,songs.id_user,songs.id,title,upload_time,bio.nome_band,bio,image,video from songs left join bio on bio.id_user = songs.id_user where bio.id_user = ".$id_utente." limit 1";
$result = $gestdb -> value($sqlselect,$db_sito);
$title = $result[0]['nome_band']." | ".$title;
$description = substr($result[0]['bio'],0,40); 
?>
<? 
	include($root_path."/include/header.php");
?>
	<link rel="stylesheet" type="text/css" href="/templates/default/css/vote.css" />
<?
//bio artista
$id_utente = strip_tags($_REQUEST['id']);
$sqlselect = "select message,bio.id_user,songs.id_user,songs.id,title,upload_time,bio.nome_band,bio,image,video from songs left join bio on bio.id_user = songs.id_user where bio.id_user = ".$id_utente." limit 1";
$result = $gestdb -> value($sqlselect,$db_sito);
$select = "select COUNT(*) from votes where id_voted = ".$id_utente;
$sql = $gestdb -> value($select,$db_sito);
$tpl = new HTML_Template_IT($root_path . "/templates/default/");
$tpl->loadTemplatefile("page.tpl.htm", true, true);

if ($loggato){

	if ($_REQUEST['sid']){
		$tpl->setVariable("SID", $_REQUEST['sid']);
	} else {
		$tpl->setVariable("SID", $user->session_id);
	}
}
if ( (VOTE_SESSION)){
	$tpl->setVariable("IDBAND", $id_utente);
}
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
$song_root_path = "/files/songs/";
$swf_path = "/js/jplayer/";
$tpl_audio = new HTML_Template_IT($root_path . "/templates/default/");

$tpl_audio->loadTemplatefile("player_single.tpl.htm", true, true);
$tpl_audio->setVariable("SWF_PATH",$swf_path) ;
$tpl_audio->setVariable("TITLE", $song[0]['title']) ;
$tpl_audio->setVariable("MEDIA", $song_root_path.$song[0]['song']) ;
$tpl_audio->parse("player");
$tpl_audio->show();
//recupero il video
$width = "600";
$height = "400";
if($result[0]['video']>""){
	$tpl_video = new HTML_Template_IT($root_path . "/templates/default/");
	
	$video_url = $result[0]['video'];
	if(eregi("youtube",$video_url)){
		$video_url=str_replace("watch","",$video_url);
		$video_url=str_replace("?v=","v/",$video_url);
		$tpl_video->loadTemplatefile("youtube.tpl.htm", true, true);

		}else if(eregi("vimeo",$video_url)){ 	
			$video_url=str_replace("http://vimeo.com/","",$video_url);
			$tpl_video->loadTemplatefile("vimeo.tpl.htm", true, true);

		}
		$tpl_video->setVariable("WIDTH", $width) ;
		$tpl_video->setVariable("HEIGHT", $height) ;
		$tpl_video->setVariable("VIDEOURL", $video_url) ;
		$tpl_video->parse("video");
		$tpl_video->show();	
	}	
	
?>

<? include($root_path."/include/comment.php");?>
				</div><!--/container -->
			</div><!--/indent -->
		</div><!--/bottom-bg -->
	</div><!--/box -->

</div><!--/col-2 -->
<? include($root_path."/include/footer.php");?>
<?// phpinfo();?>
