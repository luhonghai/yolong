<?php
/**
 *
 * @ edPress | ByTomiGroup
 *
 * @ Version  : 1.0.0
 * @ Author   : Petrescu Eduard Ionut
 * @ Release on : 2014-02-08 Y-M-D
 *
 **/

class Database {
	public $functions = array("connect" => "mysql_connect", "pconnect" => "mysql_pconnect", "num_rows" => "mysql_num_rows", "select_db" => "mysql_select_db", "query" => "mysql_query", "result" => "mysql_result", "query_unbuffered" => "mysql_unbuffered_query", "fetch_row" => "mysql_fetch_row", "fetch_array" => "mysql_fetch_array", "fetch_field" => "mysql_fetch_field", "free_result" => "mysql_free_result", "data_seek" => "mysql_data_seek", "error" => "mysql_error", "errno" => "mysql_errno", "affected_rows" => "mysql_affected_rows", "num_rows" => "mysql_num_rows", "num_fields" => "mysql_num_fields", "field_name" => "mysql_field_name", "insert_id" => "mysql_insert_id", "escape_string" => "mysql_escape_string", "real_escape_string" => "mysql_real_escape_string", "close" => "mysql_close", "client_encoding" => "mysql_client_encoding");
	public $registry = null;
	public $fetchtypes = array("DBARRAY_NUM" => null, "DBARRAY_ASSOC" => null, "DBARRAY_BOTH" => null);
	public $database = null;

	public function connect($db_name, $db_server, $db_user, $db_passwd) {
		$this->tbl_prefix = "";
		$this->database = $db_name;
		$this->connection_master = $this->db_connect($db_name, $db_server, $db_user, $db_passwd);
		$this->select_db($this->database);
	}

	public function db_connect($db_name, $db_server, $db_user, $db_passwd) {
		$link = @$this->functions['connect']($db_server, $db_user, $db_passwd);

		if (!$link) {
			exit("<br /><br /><strong>Error MySQL DB Conection</strong><br>Please contact to site administrator.");
		}

		return $link;
	}

	public function select_db($database) {
		$this->database = $database;

		if (!@$this->functions['select_db']($this->database, $this->connection_master)) {
			exit("<br /><br /><strong>Error MySQL DB Conection</strong><br>Please contact to site administrator.");
		}

	}

	public function close() {
		return @$this->functions['close']($this->connection_master);
	}

	public function query($sql, $buffered = true) {
		$this->sql = $sql;
		return $this->execute_query($buffered, $this->connection_master);
	}
	
	public function &execute_query($buffered = true, &$link) {
		$this->connection_recent = $link;

		$this->querycount++;

		if ($queryresult = $this->functions[($buffered ? "query" : "query_unbuffered")]($this->sql, $link)) {
			$this->sql = "";
			return $queryresult;
		}

		$this->sql = "";
	}

	public function &fetchRow($sql, $type = DBARRAY_ASSOC) {
		$this->sql = $sql;
		$queryresult = $this->execute_query(true, $this->connection_master);
		$returnarray = $this->fetch_array($queryresult, $type);
		$this->free_result($queryresult);
		return $returnarray;
	}

	public function fetch_array($queryresult, $type = DBARRAY_ASSOC) {
		$result = @$this->functions['fetch_array']($queryresult);
		return $result;
	}

	public function fetchOne($sql) {
		$this->sql = $sql;

		$queryresult = $this->execute_query(true, $this->connection_master);
		$returnresult = $this->result($queryresult);
		$this->free_result($queryresult);
		return $returnresult;
	}

	public function insert($tbl, $dataArray) {
		foreach ($dataArray as $k => $v) {
			$keys .=  $k . ", ";
			$values .= "'" . $this->real_escape_string($v) . "', ";
		}

		$keys = substr($keys, 0, strlen($keys) - 2);
		$values = substr($values, 0, strlen($values) - 2);
		$sql = (("INSERT INTO " . $tbl . "(") . $keys . ") VALUES(" . $values . ")");
		$exeq = $this->query($sql);
		return $exeq;
	}

	public function lastInsertId() {
		return @$this->functions['insert_id']($this->connection_master);
	}

	public function delete($tbl, $data = null) {
		if ($data != "") {
			$conditional = "WHERE " . $data;
		}

		$sql = ("DELETE FROM " . $tbl . " ") . $conditional;
		$this->query($sql);
	}

	public function update($tbl, $dataArray, $conditional = null) {
		foreach ($dataArray as $k => $v) {
			$updsql .= $k . "='" . $this->real_escape_string($v) . "', ";
		}

		$updsql = substr($updsql, 0, strlen($updsql) - 2);

		if ($conditional != "") {
			$updsql .=  "WHERE " . $conditional;
		}

		$sql = "UPDATE " . $tbl . " SET " . $updsql;
		$this->query($sql);
	}

	public function result($queryresult) {
		$result = @$this->functions['result']($queryresult, $this->fetchtypes[$type]);
		return $result;
	}

	public function free_result($queryresult) {
		$this->sql = "";
		return @$this->functions['free_result']($queryresult);
	}

	public function escape_string($string) {
		if ($this->functions['escape_string'] == $this->functions['real_escape_string']) {
			return $this->functions['escape_string']($string, $this->connection_master);
		}

		return $this->functions['escape_string']($string);
	}

	public function real_escape_string($string) {
		$this->sql = "";
		return @$this->functions['real_escape_string']($string);
	}
}

class VData {
	public function details($license) {
	}

	public function getinfo($data2 = null) {
	}

	public function validate($license) {
		$this->checkstatus = true;
		$this->info['clientname'] = "website.mlmpro";
		$this->info['clientemail'] = "info@website.mlmpro";
		$this->info['product'] = "MLM PRO";
		$this->info['domain'] = $_SERVER["SERVER_NAME"];
		$this->info['checkdate'] = time();
		$this->info['support'] = 1999999999 + time();
	}

	public function response() {
		exit("Invalid License Key");
	}
}

class Registry {
	public function Registry() {

		define("CWD", ($getcwd = getcwd() ? $getcwd : "."));
		$config = array();
		include GLOBALPATH . "config.php";

		if (sizeof($config) == 0) {
			if (file_exists(GLOBALPATH . "config.php")) {
				exit( "<div style=\"border: 1px dashed #cc0000;font-family:Tahoma;background-color:#FBEEEB;width:100%;padding:10px;color:#cc0000;\"><strong>Welcome to MLM Pro Version 4.6 Decoded & Nulled by JJ!</strong><a></a><br>Before you can begin using MLM Pro you need to perform the installation procedure. <a href=\"" . (file_exists( "install/install.php" ) ? "" : "../") . "install/install.php\" style=\"color:#000;\">Click here to begin ...</a></div>" );
			}
			else {
				exit("<br /><br /><strong>Configuration</strong>: includes/config.php does not exist. Please fill out the data in config.php.new and rename it to config.php");
			}
		} elseif (file_exists("install/install.php")) {
			exit("<div style=\"border: 1px dashed #cc0000;font-family:Tahoma;background-color:#FBEEEB;width:100%;padding:10px;color:#cc0000;\"><strong>Security Warning</strong><br>The install folder needs to be deleted for security reasons before using MLM Pro</div>");
		}

		$this->config = $config;

		define("TABLE_PREFIX", trim($this->config['Database']['tableprefix']));
		define("COOKIE_PREFIX", (empty($this->config['Misc']['cookieprefix']) ? "ptc" : $this->config['Misc']['cookieprefix']) . "_");
	}
}

class Input_Cleaner {
	public $cleaned_vars = array();

	public function __construct() {
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			foreach (array_keys($_POST) as $key) {

				if (isset($_GET[$key])) {
					$_GET[$key] = $_REQUEST[$key] = $_POST[$key];
					continue;
				}
			}
		}


		if (function_exists("get_magic_quotes_gpc") && get_magic_quotes_gpc()) {
			$this->stripslashes_deep($_REQUEST);
			$this->stripslashes_deep($_GET);
			$this->stripslashes_deep($_POST);
			$this->stripslashes_deep($_COOKIE);
		}


		if (function_exists("set_magic_quotes_runtime")) {
			@set_magic_quotes_runtime(0);
			@ini_set("magic_quotes_sybase", 0);
		}

		$this->frm = $_POST;
		$this->frmg = $_GET;
		$this->cookie = $_COOKIE;
		$this->req = $_REQUEST;

		if ($this->frm) {

			while (list($kk, $vv) = each($this->frm)) {
				if (is_array($vv)) {
					$vv_cleaned = $vv;
				}
				else {
					$vv = trim($vv);
					$vv_cleaned = htmlspecialchars(trim($vv));
				}

				$this->p[$kk] = $vv;
				$this->pc[$kk] = $vv_cleaned;
			}
		}


		if ($this->frmg) {

			while (list($kk, $vv) = each($this->frmg)) {
				if (is_array($vv)) {
					$vv_cleaned = $vv;
				}
				else {
					$vv = trim($vv);
					$vv_cleaned = htmlspecialchars(trim($vv));
				}

				$this->g[$kk] = $vv;
				$this->gc[$kk] = $vv_cleaned;
			}
		}


		if ($this->cookie) {

			while (list($kk, $vv) = each($this->cookie)) {
				if (is_array($vv)) {
				}
				else {
					$vv = trim($vv);
					$vv_cleaned = htmlspecialchars(trim($vv));
				}

				$this->c[$kk] = $vv;
				$this->cc[$kk] = $vv_cleaned;
			}
		}


		while (list($kk, $vv) = each($this->req)) {
			if (is_array($vv)) {
				$vv_cleaned = $vv;
			}
			else {
				$vv = trim($vv);
				$vv_cleaned = htmlspecialchars(trim($vv));
			}

			$this->r[$kk] = $vv;
			$this->rc[$kk] = $vv_cleaned;
		}

	}

	public function stripslashes_deep($value, $depth = 0) {
		if (is_array($value)) {
			foreach ($value as $val) {

				if (is_string($val)) {
					$value[$key] = stripslashes($val);
					continue;
				}


				if (is_array($val) && $depth < 10) {
					$this->stripslashes_deep($value[$key], $depth + 1);
					continue;
				}
			}
		}

	}
}

class Mail {
	public function mail() {
		$this->headers = "MIME-Version: 1.0
Content-type: text/plain; charset=iso-8859-1
From: \"" . $title . " Admin\" <info@website.mlmpro>
Reply-To: \"NoReply\" <info@website.mlmpro>
X-Priority: 3
X-Mailer: PHP 4
";
	}

	public function setFrom($from_email, $name = null) {
		$this->from = $from_email;

		if ($name == "") {
			$this->from_name = $this->from;
			return null;
		}

		$this->from_name = $name;
	}

	public function addTo($to_email, $to_name = null) {
		$this->to = $to_email;

		if ($to_name == "") {
			$this->to_name = $this->to;
			return null;
		}

		$this->to_name = $to_name;
	}

	public function setSubject($subject) {
		$this->subject = $subject;
	}

	public function setBodyText($message) {
		$this->headers = "MIME-Version: 1.0
Content-type: text/plain; charset=UTF-8
";
		$this->headers .= "From: \"" . $this->from_name . "\"<" . $this->from . ">
Reply-To: \"" . $this->from_name . "\"<" . $this->from . ">
X-Mailer: PHP" . phpversion();
		$this->message = stripslashes($message);
	}

	public function setBodyHtml($message) {
		$this->headers = "MIME-Version: 1.0
Content-type: text/html; charset=iso-8859-1
To: " . $this->to_name . " <" . $this->to . ">
From: " . $this->from_name . " <" . $this->from . ">
";
		$this->message = stripslashes($message);
	}

	public function send() {
		mail($this->to, $this->subject, $this->message, $this->headers);
	}
}

?>
