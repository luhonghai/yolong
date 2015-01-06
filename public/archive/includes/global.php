<?php

if (!defined("GLOBALPATH")) {
	define("GLOBALPATH", dirname(__FILE__) . "/");
}

require GLOBALPATH . "class_core.php";
require GLOBALPATH . "class_pagination.php";

$conf_cfg = new Registry();
$input = new Input_Cleaner();
$db = new Database();
$db->connect($conf_cfg->config['Database']['dbname'], $conf_cfg->config['Database']['servername'], $conf_cfg->config['Database']['username'], $conf_cfg->config['Database']['password']);

?>