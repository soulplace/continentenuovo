<?
error_reporting(0);

/******* VARIABILI DI CONTROLLO *************/
define('BAND_REGISTRATION',true);
define('VOTE_SESSION',false);

/*******************************************/
/*Variabilie per l'header*/
$title = "Download Dei Miei Sogni";
$description ="progetto musicale Continente Nuovo";

require_once "IT.php";
#su debian e UBUNTU restano cosi'
define('IN_PHPBB', true);
define('PHPBB_ROOT_PATH', '/home/samu2012/downloaddeimieisogni.it/forum/');
$phpEx = substr(strrchr(__FILE__, '.'), 1);

$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : '/usr/share/phpbb3/www/';
include($phpbb_root_path . 'common.php');
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
// Start session management
$user->session_begin();
$auth->acl($user->data);
// Grab user preferences
$user->setup();


## URL di visibilita' sul web del forum phpBB3
## forse si puo' togliere
## ho cambiato l'url (fabio)
$phpbb_url = "/forum/";

## directory di base dell'applicazione
## forse si puo' togliere
$root_path = '/home/samu2012/downloaddeimieisogni.it/';


$web_url = "/continentenuovo/";
#link al form di registrazioni phpbb
###
### FUNZIONI
###


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

#parametri di input:
# root_path = path per arrivare alla directory base dei template
# firstpage = ridirezione della pagina dopo il logout
# user = variabile che contiene informazioni dell'utente da "uccidere"
# output
# ritorna il codice html del logout

function miologout($root_path, $redir, $firstpage){
        $tpl = new HTML_Template_IT($root_path . "/templates/default/");
        $tpl->loadTemplatefile("logout.tpl.htm", true, true);
        $tpl->setVariable("PAGE", "$firstpage") ;
        $tpl->setVariable("REDIRECT", $redir);
        $tpl->parse("logout");
        $xxx = $tpl->get();
        return $xxx;
}


function eddairegistrati(){

}


//classe per la gestione del DB
# $dbhost = host  database
# $dbname = nome db
# $dbuser = utente db
# $dbpass = pwd db
$dbhost = "localhost";
$dbname = "continentenuovo";
$dbnamephpbb = "phpbb3";
$dbuser = "continentenuovo";
$dbpass = "bnqtj8uEMdbX3Snv";

#$dbhost = "sql.downloaddeimieisogni.it";
#$dbname = "downloaddeimieisogniit";
#$dbnamephpbb = "downloaddeimieisogniit";
#$dbuser = "downuser";
#$dbpass = "Z9mAC#b";

include($root_path . "include/class.gestdb.php");
$gestdb = new gestdb();

## Meglio fare qualche test perche' non funziona se il db non e' impostato
## e configurato
$db_sito = $gestdb -> conn_db( $dbhost , $dbuser , $dbpass );
$gestdb -> use_db( $dbname , $db_sito );
?>
