<div class="col-1">
	<div class="box1 png">
		<?include_once($root_path . "include/login.php");?>
		<?if($loggato)  echo "Bentornato, ".$username;?>
		<?include_once($root_path . "include/logout.php");?>
	</div><!-- /box1-->
	<div id="songs_home">
		<?include_once($root_path . "include/songs_home.php");?>
	</div><!--/songs_home -->

</div><!-- /col-1 -->