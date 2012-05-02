<?
//query per recuperare le ultime 5 canzoni da inserire in home page con una playlist
$sql = "select DISTINCT id_user, song, title from songs join users on songs.id_user = users.id_phpbb where 1 order by songs.upload_time limit 5";
$result = $gestdb -> value($sql,$db);

$root_path = "/continentenuovo/files/";
$swf_path = "/continentenuovo/js/jplayer/";

$tpl->loadTemplatefile("player.tpl.htm", true, true);
$tpl->setVariable("SWF_PATH",$swf_path) ;
if(count($result)>0){
	for($i=0; $i<5; $i++){
		$tpl->setVariable("TITLE".$i, $result[$i]['title']) ;
		$tpl->setVariable("MEDIA".$i, $root_path.$result[$i]['song']) ;
	}
	//per prendere il nome dell'artista, bisogna recuperare il nome dal db di phpbb.
}

$tpl->parse("player");
$tpl->show();
?>
