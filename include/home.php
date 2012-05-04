<div id="home_page">
	<div id="menu">
		<?include_once($root_path . "include/menu.php");?>
	</div>
	<div id="login">
		<?
		if($loggato){
			echo "Bentornato, ".$user->data['username_clean'];
		}else{
			$kk = miologin($root_path,$_SERVER["REQUEST_URI"], $phpbb_url);
      print $kk;
		}
		?>
	</div>
	<div id="video_home">
		<?include_once($root_path . "include/video_home.php");?>
	</div>
	<div id="songs_home">
		<?include_once($root_path . "include/songs_home.php");?>
	</div>
</div>