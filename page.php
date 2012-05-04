<?//error reporting, da commentare in produzione
error_reporting(E_ALL);
ini_set('display_errors','On');
//////////////?>
<?
$artist = "nome artista";
$artist_description = "descrizione artista"; 
include('include/basic.php');
?>
<? include($_SERVER["DOCUMENT_ROOT"]."/continentenuovo/include/header.php");?>
pagina utente <?($_REQUEST['id']>"")? print("id=".$_REQUEST['id']) : null;?>
<? include($_SERVER["DOCUMENT_ROOT"]."/continentenuovo/include/comment.php");?>
<? include($_SERVER["DOCUMENT_ROOT"]."/continentenuovo/include/footer.php");?>
