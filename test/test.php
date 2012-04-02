<?php
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : '/usr/share/phpbb3/www/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

if ($user->data['user_id'] == ANONYMOUS)
{
   echo 'Please login!';
}

else
{
   echo 'Thanks for logging in, ' . $user->data['username_clean'];
}
?>
<a href="/phpbb/ucp.php?mode=logout&sid=<? echo $user->data['session_id'];?>">logout</a>