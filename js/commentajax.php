<?php
if($_POST)
{
$name=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['comment'];

$lowercase = strtolower($email);
  $image = md5( $lowercase );
  
//mysql_query("SQL insert statement");

}

else { }

?>
<li class="box">
<img src="http://www.gravatar.com/avatar.php?gravatar_id=<?php echo $image; ?>" style="float:left; width:80px; height:80px; margin-right:20px"/><span style="font-size:16px; color:#663399; font-weight:bold"> <?php echo $name;?></span> <br /><br />

<?php echo $comment; ?>
</li>