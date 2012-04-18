<?
$sql = "select * from bio join users on bio.id_user = users.id_phpbb where 1 order by bio.upload_timestamp limit 3";
$result = $gestdb -> value($sql,$db);
if(count($result)>0){
	foreach($result as $key=>$value){
	$video_url = $value['video'];
	//DIMENSIONE EMBED
	$width = "300";
	$height = "220";
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
}
?>