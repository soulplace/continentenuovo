<?php
class gestdb {
	function error() {
		die(mysql_error());
	}
	function conn_db($db_host, $db_login, $db_pass) {
		if (!$link = @mysql_connect($db_host, $db_login, $db_pass)) $this->error();
		return $link;
	}
	function close_db($link) {

		@mysql_close($link);

	}
	function use_db($database, $link) {
		if (!@mysql_select_db($database, $link)) $this->error();
	}
	function query($Sql, $link) {
		if (!$query = @mysql_query($Sql, $link)) $this->error();
		return $query;
	}
	function num_row($Sql, $link) {
		return @mysql_num_rows($this->query($Sql, $link));
	}
	function value($Sql, $link) {
		$query = $this->query($Sql, $link);
		$ritorno = array();
		while($valori = @mysql_fetch_array($query)) {                   
			array_push($ritorno, $valori);
		}
		return $ritorno;
	}
}
?>