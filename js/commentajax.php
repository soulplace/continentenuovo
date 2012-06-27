<?php
include($_SERVER['DOCUMENT_ROOT'].'/continentenuovo/include/basic.php');

if($_POST)
{
	$user_id=$_POST['user_id'];
	$comment=$_POST['comment'];
	$image = $_POST['image'];
	$id_commented = $_POST['id_commented'];
	$sqlinsertcommento = "insert into comments (id_user,id_commented,message,ip,approved) values (
		'".$user_id."',
		'".$id_commented."',
		'".$comment."',
		'".$_SERVER['REMOTE_ADDR']."',
		'y'
		)";
	$insertcommento = $gestdb -> query($sqlinsertcommento,$db_sito);

}

else { }

?>
<li class="box">
	<img src="/phpbb/download/file.php?avatar=<?php echo $image ?>" /><span> <?php echo $name;?></span> <br /><br />

<?php echo $comment; ?>
</li>