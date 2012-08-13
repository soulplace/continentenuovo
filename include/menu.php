<div id="header">
	<div class="menu">
		<div class="container">
			<a href="index.php"><img src="/continentenuovo/templates/default/css/images/logo.jpg" alt=""  class="logo"/></a>
			<div class="menu-left">
				<ul>
					<li><a href="index.php" title="Home Page">Home page</a></li>
					<li><a href="archive.php" title="Artisti">Artisti</a></li>
					<li><a href="page.php?id=1">Pagina</a></li>										
				</ul>
			</div><!-- /menu-left -->
			<div class="menu-right">
				<?if(BAND_REGISTRATION){?>
					<ul>
						<li><a href="registration.php" style="width:160px">Registrazione Band</a></li>
					</ul>
					<?}?>
				</div><!-- /menu-right -->
			</div><!-- /container-->
		</div> <!-- /menu -->
		<div class="container1">
			<div class="slogan">
				<img src="/continentenuovo/templates/default/css/images/slogan-img.jpg" alt="" />
				<a href="#"><img src="/continentenuovo/templates/default/css/images/slogan-link-img.jpg" alt="" /></a>
			</div><!-- /slogan-->
			<?include_once($root_path . "include/search.php");?>
			<div class="clear"></div>
			
		</div><!-- /container1 -->
	</div><!-- /header -->
	<div class="clear"></div>
