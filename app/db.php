<?php
require_once __DIR__ . '/../config.php';

class Db {
    private static $connection = null;

    public static function get_connection () {
        global $DB_CONNECTION_STRING, $DB_USER, $DB_PASS;
        
        if (self::$connection == null) {
            $connection = new PDO ($DB_CONNECTION_STRING, $DB_USER, $DB_PASS);
            
            $connection->setAttribute
                (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            self::$connection = $connection;
        }

        return self::$connection;
    }
}
?>
