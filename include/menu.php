<div id="header">
	<div class="menu">
		<div class="container1">
			<div class="menu-left">
				<ul>
					<li><a href="index.php" title="Home Page">Home page</a></li>
					<li><a href="archive.php" title="Artisti">Artisti</a></li>
					<li><a href="page.php?id=1">Pagina</a></li>				
					<?if(BAND_REGISTRATION){?>
					<li><a href="registration.php" style="width:160px">Registrazione Band</a></li>
						<?}?>
											
				</ul>
			</div><!-- /menu-left -->
			<div class="menu-right">
				<ul>
				<li><a href="index.php"><img src="/continentenuovo/templates/default/css/images/logo-continentenuovo.png" alt="Continente nuovo" width="145px" /></a></li>
				
				
					
					</ul>
				</div><!-- /menu-right -->
			</div><!-- /container-->
		</div> <!-- /menu -->
		<div class="container1">
			<div class="slogan">
				<a href="#"><img src="/continentenuovo/templates/default/css/images/claim.png" alt="" /></a>
			</div><!-- /slogan-->
			<?include_once($root_path . "include/search.php");?>
			<div class="clear"></div>
			
		</div><!-- /container1 -->
	</div><!-- /header -->
<div class="clear"></div>
