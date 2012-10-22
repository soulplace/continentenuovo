

<?php
include("config.php");

$ip=$_SERVER['REMOTE_ADDR'];//client ip address
if ($_POST['id']) and ($loggato){
	$username = $user->data['username_clean'];
	$today = date("%d/%m/%Y");

	$id=$_POST['id'];
	$sql = "insert into votes (id, vote, day, idband) values (" . $user->data["user_id"] . "," . $vote . ",'" . $today . "'," . $id_utente . ");";
	##$ip_sql=mysql_query("select ip_add from image_IP where img_id_fk='$id' and ip_add='$ip'");

	$count=mysql_num_rows($ip_sql);
	if($count==0) {
		// Updateing Love Value
		$sql = "update images set love=love+1 where img_id='$id'";
		mysql_query( $sql);
		// Inserting Client IP-address 
		$sql_in = "insert into image_IP (ip_add,img_id_fk) values ('$ip','$id')";
		mysql_query( $sql_in);

		$result=mysql_query("select love from images where img_id='$id'");
		$row=mysql_fetch_array($result);
		$love=$row['love'];

?>
<span class="on_img" align="left"><?php echo $love; ?></span>
<?php
	} else {
		echo 'Band già votata per oggi';
	}
}
?>


