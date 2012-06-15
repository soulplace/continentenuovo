<?
include('include/basic.php');
print_r($_FILES);
print_r($_REQUEST);
?>
<?
//controllare se modifica o inserimento nuovo 
//e controllare anche se c'è già una canzone di quell'utente
/*
Array
(
    [Filedata] => Array
        (
            [name] => 21 I'm Proud of You.mp3
            [type] => application/octet-stream
            [tmp_name] => /tmp/phpu2aREk
            [error] => 0
            [size] => 3145576
        )

)
Array
(
    [Filename] => 21 I'm Proud of You.mp3
    [messaggio] => <p>
	Messaggio registrazione</p>

    [nome_band] => Fabio
    [titolo_canzone] => i'm%20proud%20of%20you
    [biografia] => <p>
	biografia registrazione</p>

    [Upload] => Submit Query
)
*/
?>