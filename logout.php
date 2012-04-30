<?
include('lib/basic.php');

if ($_REQUEST && $_REQUEST["redir"]){
     header('location: ' . $_REQUEST["redir"]);
} else {
     header('location: ' . $web_url );
}

$user->session_begin();
$auth->acl($user->data);
$user->setup();
$user->session_kill();
$user->session_begin();

?>
