<?
//$video_url = "select video from bio where 1 order by timestamp limit 3";

/* VIDEO TEST*/
//$video_url = "http://www.youtube.com/watch?v=80T8CBUHoL0&feature=g-all-u&context=G239baf2FAAAAAAAACAA";
$video_url = "http://vimeo.com/38514156";
/*------*/

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
?>