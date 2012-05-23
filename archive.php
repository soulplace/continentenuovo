<?//error reporting, da commentare in produzione
//error_reporting(E_ALL);
//ini_set('display_errors','On');
//////////////
/////////////
/*
QUESTO FILE VERRA' USATO PER GENERARE SIA LA LISTA DI TUTTI GLI ARTISTI ISCRITTI (IL LINK ARTISTI)
SIA I RISULTATI DEL MOTORE DI RICERCA
*/
/////////////
?>
<?
include('include/basic.php');
$title = "Tutti gli artisti";
$description = "tutti gli artisti e le band che partecipano al concorso Il download dei miei sogni."; 
?>
<? include($_SERVER["DOCUMENT_ROOT"]."/continentenuovo/include/header.php");?>
<?
$where = "1";
if($_REQUEST['q']>""){
	$q = strip_tags($_REQUEST['q']);
	$where = " title like '%".$q."%' or nome_band like '%".$q."%' or title like '%".$q."%'";
}
$sqlselect = "select DISTINCT songs.id_user,songs.id,title,upload_time,bio.nome_band,bio,image from songs left join bio on bio.id_user = songs.id_user where ".$where;
$result = $gestdb -> value($sqlselect,$db_sito);
foreach($result as $key => $value){
	$select = "select COUNT(*) from votes where id_voted = ".$value['id'];
	$sql = $gestdb -> value($select,$db_sito);
	echo "Nome band: ".$value['nome_band']."<br />";
	echo "Bio: ".$value['bio']."<br />";
	echo "Titolo canzone: ".$value['title']."<br />";
	echo "Voti ricevuti: ".$sql[0][0]."<br />";
	echo "<br />";
	
}
/*
$tpl->loadTemplatefile("archive.tpl.htm", true, true);
for($i=0; $i<5; $i++){
	$tpl->setVariable("TITLE".$i, $result[$i]['title']) ;
	$tpl->setVariable("MEDIA".$i, $song_root_path.$result[$i]['song']) ;
}
//inserire paginazione

$tpl->parse("archive");
$tpl->show();
*/
?>
<? include($_SERVER["DOCUMENT_ROOT"]."/continentenuovo/include/footer.php");?>
