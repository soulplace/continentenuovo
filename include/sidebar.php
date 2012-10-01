<div class="col-1">
	<div class="box1 png">
		<div class="indent">
		<?include_once($root_path . "include/login.php");?>
		<?if($loggato){  echo "<h3>Bentornato, ".$username."</h3>";?>
		<p>
		<a href="<?echo $phpbb_url?>ucp.php" title="Pannello di controllo utente" style="color:#ffffff">Pannello di controllo utente</a>
		</p>
		<?}?>
		<?include_once($root_path . "include/logout.php");?>
		</div><!-- /indent-->
	</div><!-- /box1-->
	<div id="songs_home">
		<?include_once($root_path . "include/songs_home.php");?>
	</div><!--/songs_home -->

</div><!-- /col-1 -->