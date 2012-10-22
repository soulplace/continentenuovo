<?php

include('forum/common.php');

$user->session_begin();
$auth->acl($user->data);
$user->setup();

if ($user->data['user_id'] == ANONYMOUS) {
        $loggato = false;
} else {
        $loggato = true;
}

if (($_POST['id']) && ($loggato)){
	$username = $user->data['username_clean'];
	$today = date("%d/%m/%Y");

	$id=$_POST['id'];
	$sql = "insert into votes (id, vote, day, idband) values (" . $user->data["user_id"] . ",1,'" . $today . "'," . $id_utente . ");";
	$count=mysql_num_rows($ip_sql);
	if($count==0) {
		// Updateing Love Value
		$result=mysql_query("select count(*) as love from votes where idband='$id_utente'");
		$row=mysql_fetch_array($result);
		$votes=$row['love'];

?>
<span class="on_img" align="left"><?php echo $votes; ?></span>
<?php
	} else {
		echo 'Band già votata per oggi';
	}
} else {
		echo 'Registrati per votare' . $user->data['user_id'] ;
}
?>


