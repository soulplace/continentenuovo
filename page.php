<?//query per dati utente. qui possiamo anche settare le variabili per title e description?>
<?
$artist = "nome artista";
$artist_description = "descrizione artista"; 
?>
<? include($_SERVER["DOCUMENT_ROOT"]."/continentenuovo/include/header.php");?>
pagina utente <?($_REQUEST['id']>"")? print("id=".$_REQUEST['id']) : null;?>
<? include($_SERVER["DOCUMENT_ROOT"]."/continentenuovo/include/comment.php");?>
<? include($_SERVER["DOCUMENT_ROOT"]."/continentenuovo/include/footer.php");?>
