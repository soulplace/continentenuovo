<?php

include_once('forum/common.php');
echo "ciao\n\n";

$user->session_begin();
$auth->acl($user->data);
$user->setup();

if ($user->data['user_id'] == ANONYMOUS) {
        $loggato = false;
} else {
        $loggato = true;
}

$idband=0;
$idband=$_REQUEST['id'];
$result=mysql_query("select count(*) as love from votes where id_voted='$idband'");
$row=mysql_fetch_array($result);
$votes=$row['love'];

if ($loggato){
	$username = $user->data['username_clean'];
	$today = date("%d/%m/%Y");
	$ip=$_SERVER['REMOTE_ADDR'];

	$sql = "insert into votes (id_voter, time, ip, id_voted) values (" . $user->data["user_id"] . ",'" . $today . "','" . $ip . "'," . $idband . ");";
	$res = mysql_query($sql);
	if ($res) {
		$votes++;
		echo 'Grazie per il voto';

?>
<span class="on_img" align="left"><?php echo $votes; ?></span>
<?php
	} else {
		echo 'Band gi� votata per oggi';
	}
} else {
		echo 'Registrati per votare';
}
?>


