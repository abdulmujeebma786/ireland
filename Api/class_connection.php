<?php
class DB_Connection {
	    public $dbh;
		function __construct()
		{
            // $hostname = 'localhost';
            $hostname = '43.255.154.24';
            // $username = 'root';
            $username = 'webhost@techzdubai.com';
           // $username = 'ubicfitness';
            // $password = '';
           $password = 'techzdubai';
            $dbname   = 'db_tech';

            // try {
            //     $this->dbh = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
            //     $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //     $this->dbh -> exec('SET NAMES utf8'); // FIX
            // }
            // catch(PDOException $e)
            // {
            //     echo $e->getMessage();
            // }


  		}
}
?>