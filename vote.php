<?php

include('include/basic.php');


$user->session_begin();
$auth->acl($user->data);
$user->setup();

if ($user->data['user_id'] == ANONYMOUS) {
        $loggato = false;
} else {
        $loggato = true;
}

$idband=0;
$idband=$_POST['idband'];
$result=mysql_query("select count(*) as love from votes where id_voted='$idband'");
$row=mysql_fetch_array($result);
$votes=$row['love'];
$sid=$_POST['sid'];

if ( ($sid) && (VOTE_SESSION)){
	$username = $user->data['username_clean'];
	$today = date("Y/m/d");
	$ip=$_SERVER['REMOTE_ADDR'];

	$sql = "insert into votes (id_voter, time, ip, id_voted) values (" . $user->data["user_id"] . ",'" . $today . "','" . $ip . "'," . $idband . ");";
	$res = mysql_query($sql);
	if ($res) {
		$votes++;
		echo 'Grazie per il voto';
	} else {
		echo 'Band gi&agrave; votata per oggi';
	}
} else {
	echo 'Registrati per votare';
}
echo ' ' . $votes . ' voti';
?>
