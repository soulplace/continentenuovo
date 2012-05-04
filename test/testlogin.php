<?


## $path = '/var/www/sw/cnuovo';
## set_include_path(get_include_path() . PATH_SEPARATOR . $path);
## include('include/basic.php');
echo "saaaaaaaaaaaaaaaaaaaaaaaaa";

echo "<br>saaaaaaaaaaaaaaaaaaaaaaaaa";
include('continentenuovo/include/basic.php');

$user->session_begin();
$auth->acl($user->data);
$user->setup();

if ($user->data['user_id'] == ANONYMOUS) {
	echo "anonimo";
        $kk = miologin($root_path,$_SERVER["REQUEST_URI"], $phpbb_url);
        print $kk;
	
} else {
	echo "loggato";
        $ww = miologout($root_path,$_SERVER["REQUEST_URI"], $web_url . "/logout.php");
        print $ww;
}

?>

