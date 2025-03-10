<?php

class ConnectionFactory
{
    private static $connection;

    public static function getConnection()
    {
        if (!self::$connection) {
            self::$connection = mysqli_connect("localhost", "root", "", "hder");
            if (!self::$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }
        }

        return self::$connection;
    }

    public static function closeConnection()
    {
        if (self::$connection) {
            mysqli_close(self::$connection);
            self::$connection = null;
        }
    }
}

?>
