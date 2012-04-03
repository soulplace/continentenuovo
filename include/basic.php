<?

require_once "HTML/Template/IT.php";
#su debian e UBUNTU restano cosi'
define('IN_PHPBB', true);
define('PHPBB_ROOT_PATH', '/usr/share/phpbb3/www/');
$phpEx = substr(strrchr(__FILE__, '.'), 1);


$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : '/usr/share/phpbb3/www/';
include($phpbb_root_path . 'common.php');


## URL di visibilita' sul web del forum phpBB3
## forse si puo' togliere
$phpbb_url = "/phpbb/";

## directory di base dell'applicazione
## forse si puo' togliere
$root_path = '/var/www/sw/cnuovo/';

#parametri di input:
# root_path = path per arrivare alla directory base dei template
# redir = ridirezione della pagina dopo il login
# phpbb_url = url web a phpbb
# output
# ritorna il codice html del login 

function miologin($root_path, $redir , $phpbb_url){
        $tpl = new HTML_Template_IT($root_path . "/templates/default/");
        $tpl->loadTemplatefile("login.tpl.htm", true, true);
        $tpl->setVariable("PHPBB_URL", "$phpbb_url") ;
        $tpl->setVariable("REDIRECT", $redir);
        $tpl->parse("login");
        $xxx = $tpl->get();
        return $xxx;
}

function eddairegistrati(){

}

function miologout($root_path, $user, $firstpage){
        $user->session_kill();
        $user->session_begin();
        $tpl = new HTML_Template_IT($root_path . "/templates/default/");
        $tpl->loadTemplatefile("logout.tpl.htm", true, true);
        $tpl->setVariable("PAGE", "$firstpage") ;
        $tpl->parse("logout");
        $xxx = $tpl->get();
        return $xxx;
}


?>

