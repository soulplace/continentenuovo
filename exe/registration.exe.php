<?
ob_start();
error_reporting(E_ALL);
ini_set('display_errors','On');
include($_SERVER['DOCUMENT_ROOT'].'/continentenuovo/include/basic.php');

//header con ritorno a backoffice con alert su esito operazione
$alert = "";
$image_filename = $_REQUEST['id_user'].".jpg";
$song_filename = $_REQUEST['id_user'].".mp3";
if($_FILES["immagine"]["size"]>0){
	if ($_FILES["immagine"]["type"] == "image/jpeg" && $_FILES["immagine"]["size"] < 8000000){
		if ($_FILES["immagine"]["error"] > 0){
			$alert .= "Errore: " . $_FILES["immagine"]["error"] . "\n";
		}else{
			move_uploaded_file($_FILES["immagine"]["tmp_name"],$root_path."files/image/"  . $image_filename);
		}
	}else{
		$alert .= "File immagine non valido\n";
	}
}
$sqlselectbio = "select id from bio where id_user = ".$_REQUEST['id_user']." limit 1";
$selectbio = $gestdb -> value($sqlselectbio,$db_sito);
if($selectbio[0]["id"]>""){
	$sqlupdatebio = "update bio set 
		nome_band = '".strip_tags($_REQUEST['nome_band'])."',
		bio = '".strip_tags(htmlentities($_REQUEST['biografia']))."',
		message = '".strip_tags(htmlentities($_REQUEST['messaggio']))."',
		video =' ".strip_tags($_REQUEST['video_url'])."'
		where id = '".$selectbio[0]["id"]."'
		limit 1
		";
	$updatebio = $gestdb -> query($sqlupdatebio,$db_sito);

}else{
	$sqlinsertbio = "insert into bio (id_user,nome_band,bio,message,video,image) values (
		'".strip_tags($_REQUEST['id_user'])."',
		'".strip_tags($_REQUEST['nome_band'])."',
		'".strip_tags(htmlentities($_REQUEST['biografia']))."',
		'".strip_tags(htmlentities($_REQUEST['messaggio']))."',
		'".strip_tags($_REQUEST['video_url'])."',
		'".$image_filename."'
		)";
	$insertbio = $gestdb -> query($sqlinsertbio,$db_sito);
}
if($_FILES["canzone"]["size"]>0 && VOTE_SESSION == false){

	if ($_FILES["canzone"]["type"] == "audio/mpeg" && $_FILES["canzone"]["size"] < 8000000){
		if ($_FILES["canzone"]["error"] > 0){
			$alert .= "Errore: " . $_FILES["canzone"]["error"] . "\n";
		}else{
			move_uploaded_file($_FILES["canzone"]["tmp_name"],$root_path."files/songs/"  . $song_filename);
		}
	}else{
		$alert .= "File audio non valido\n";
	}
	$sqlinsertcanzone = "insert into songs (id_user,song,title,editable) values (
		'".strip_tags(addslashes(stripslashes($_REQUEST['id_user'])))."',
		'".$song_filename."',
		'".strip_tags(addslashes(stripslashes($_REQUEST['titolo_canzone'])))."',
		'Y'
		)";
	$insertcanzone = $gestdb -> query($sqlinsertcanzone,$db_sito);
}
if($alert == ""){
	if($selectbio[0]["id"]>""){
		$alert = "Modifiche registrate con successo";
	}else{
		$alert = "Dati caricati con successo";
	}
}
header("Location: http://".$_SERVER['HTTP_HOST'].$web_url."registration.php?alert=".urlencode($alert));
ob_end_flush();
/*echo "<pre>";
print_r($_FILES);
print_r($_REQUEST);
echo "</pre>";*/
?>
	<?
//controllare se modifica o inserimento nuovo 
//e controllare anche se c'è già una canzone di quell'utente
/*
strip_tags
Array
(
[immagine] => Array
(
[name] => 21 I'm Proud of You.mp3
[type] => audio/mpeg
[tmp_name] => /tmp/phpvZ3l9x
[error] => 0
[size] => 3145576
)

[canzone] => Array
(
[name] => profile.png
[type] => image/png
[tmp_name] => /tmp/phpAOgkKM
[error] => 0
[size] => 319384
)

)
Array
(
[id_user] => 2
[nome_band] => band test 2
[biografia] => 

bio test 2


[messaggio] => 

message test2


[titolo_canzone] => canzone test 2
[video_url] => 
[invia] => Invia i dati!
)

*/
?>