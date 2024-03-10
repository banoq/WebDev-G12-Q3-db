<?php
class Database
{
    static $dbName = 'clubmanagementsys';
    static $dbHost = 'localhost';
    static $dbUsername = 'root';
    static $dbPassword = '';


    private static $cont = null;

    public static function letsconnect()
    {
        if (null == self::$cont) {
            try {

                self::$cont = new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }

            return self::$cont;

            function disconnect()
            {
                // self::$cont = null;
                //  echo "Disconnected";
            }
        }
    }

    public static  function GetOneData($pdo, $sql)
    {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare($sql);
        $q->execute();
        $result = $q->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    

    public static function GetAllData($pdo, $sql)
    {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare($sql);
        $q->execute();
        $result = $q->fetchAll();
        return ($result);
    }

    public static function ManageRecord($pdo, $sql)
    {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare($sql);
        $q->execute();
    }

    
    public static function WriteLog($log)
    {
        $path  = "log2.txt";
        $file = fopen($path, "a");
        fwrite($file, date("g:i a   "));
        fwrite($file, $log . "\n");
    }

}


?>
