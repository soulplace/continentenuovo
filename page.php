<?//error reporting, da commentare in produzione
//error_reporting(E_ALL);
//ini_set('display_errors','On');
//////////////?>
<?
include('include/basic.php');
$title = "nome artista | ".$title;
$description = "descrizione artista"; 
?>
<? include($_SERVER["DOCUMENT_ROOT"]."/continentenuovo/include/header.php");?>
pagina utente <?($_REQUEST['id']>"")? print("id=".$_REQUEST['id']) : null;?>
<? include($_SERVER["DOCUMENT_ROOT"]."/continentenuovo/include/comment.php");?>
<? include($_SERVER["DOCUMENT_ROOT"]."/continentenuovo/include/footer.php");?>
