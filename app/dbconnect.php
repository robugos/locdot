<?php
class Database
{
    private static $dbName = 'robug851_locdot' ;
    private static $dbHost = '192.185.177.67:3306' ; //localhost
    //private static $dbHost = 'localhost' ; //web
    private static $dbUsername = 'robug851_locdot';
    private static $dbUserPassword = 'adminlocdot123';
     
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       // One connection through whole application
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 

          self::$cont -> exec("set names utf8");
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>