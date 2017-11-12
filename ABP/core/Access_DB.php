<?php
//----------------------------------------------------
// DB connection function
// Use CONSTANTS defined in config.inc
//----------------------------------------------------
include 'config.inc';

class PDOConnection {
	private static $db_singleton = null;
	public static function getInstance() {
		if (self::$db_singleton == null) {
			self::$db_singleton = new PDO(
			"mysql:host=".HOST.";dbname=".DB.";charset=utf8", // connection string
			USER,
			PASS,
			array( // options
				PDO::ATTR_EMULATE_PREPARES => false,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
			);
		}
		return self::$db_singleton;
	}
}
?>