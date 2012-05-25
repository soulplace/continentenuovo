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
//session_start();
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
	$query = "q=".$q;
}
$sqlselect = "select DISTINCT songs.id_user,songs.id,title,upload_time,bio.nome_band,bio,image from songs left join bio on bio.id_user = songs.id_user where ".$where;
//echo $sqlselect;
$result = $gestdb -> value($sqlselect,$db_sito);
//conto il risultato della query
$nrighe = count($result);
//decido il numero di artisti per pagina
$nrpag= 2;
//calcolo il numero delle pagine
$npag = ceil($nrighe/$nrpag);
include($_SERVER["DOCUMENT_ROOT"]."/continentenuovo/include/paginazione.php");
if($_SESSION['FX']['pag'] <= 1){
	$start = 0;
}else{
	$start=($_SESSION['FX']['pag']-1)*$nrpag;
}

/*********/
/*echo "<pre>";
print_r($result);
echo "</pre>";
*/
?>
<div id="login">
	<?include_once($root_path . "include/login.php");?>
	<?echo "Bentornato, ".$username;?>
	<?include_once($root_path . "include/logout.php");?>
</div>
<div id="archive">
	<div id="content_archive">
	<?
	if(count($result)>0){
		$tpl->loadTemplatefile("archive.tpl.htm", true, true);
		$i=0;
		for($count = $start; $count<$start+$nrpag; $count++){

			//conto i voti ricevuti dalla canzone dell'artista
			if($result[$count]['id']>""){
				$select = "select COUNT(*) from votes where id_voted = ".$result[$count]['id'];
				$sql = $gestdb -> value($select,$db_sito);
			}
			$tpl->setVariable("NOME_BAND".$i, $result[$count]['nome_band']) ;
			$tpl->setVariable("IMAGE".$i, $result[$count]['image']) ;
			$tpl->setVariable("BIO".$i, $result[$count]['bio']) ;
			$tpl->setVariable("TITOLO_CANZONE".$i, $result[$count]['title']) ;
			if($result[$count]['id']>""){
				$tpl->setVariable("VOTI".$i, $sql[0][0]) ;
			}
			$i++;
		}
	}else{
		echo "nessun risultato";
	}
	$tpl->parse("archive");
	$tpl->show();
	?>
</div>
</div>
<? include($_SERVER["DOCUMENT_ROOT"]."/continentenuovo/include/footer.php");?>
