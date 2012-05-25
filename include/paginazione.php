<?
foreach($_REQUEST as $key => $value){
	if(strtoupper($key) != "PAG"){
		$ricerca .= $key."=".$value."&amp;";
	}
}
$ricerca = substr($ricerca,0,-5);
$ricerca= str_replace(" ","+",trim($ricerca));
//echo "<br />".$ricerca;

?>
<div class="paginazione">

<?
if ($_REQUEST['pag']) $_SESSION['FX']['pag'] = $_REQUEST['pag'];
if (!$_SESSION['FX']['pag']) $_SESSION['FX']['pag'] = 1;
$_SESSION['FX']['start'] = (($_SESSION['FX']['pag'] * $nrpag) - $nrpag);
// GESTIONE PAGER
if ($nrighe > 0) {
  $pager = "Vai a Pag.: "; 
  $pager .= ($_SESSION['FX']['pag'] > 1) ? "<a href=\"?pag=1".$ricerca."\" title='first page'><<</a> <a class='prev' href=\"?pag=".($_SESSION['FX']['pag']-1)."&amp;".$ricerca."\">< Precedente</a> " : "";
  if ($npag <= 7) {
    $sp = 1;
  } elseif ((($npag - $_SESSION['FX']['pag']) < 3 ) && ($npag > 7)) {
    $sp = $npag - 6;
  } else {
    $sp = $_SESSION['FX']['pag'] - 3;
  }
  if ($sp < 1) $sp = 1;
  $np =  ($npag <= 7) ? $npag : 7;
  for ($i = $sp; $i < ($np + $sp); $i++) {
    $pager .= ($_SESSION['FX']['pag'] == $i) ? "<span class=\"active\">".$i."</span> " : " <a href=\"?pag=".$i."&amp;".$ricerca."\">".$i."</a> " ;
  }  
  $pager .= ($_SESSION['FX']['pag'] < $npag) ? " <a class='next' href=\"?pag=".($_SESSION['FX']['pag']+1)."&amp;".$ricerca."\">Successiva ></a> ... <a href=\"?pag=".$npag."&amp;".$ricerca."\" title='last page'>".$npag."</a> " : "";
  echo $pager;
}?>

</div>