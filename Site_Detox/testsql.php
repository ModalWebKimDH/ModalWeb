<?php
require('utilities/sql.php');
class Database {
    public static function connect() {
        $dsn = 'mysql:dbname=site_detox;host=127.0.0.1';
        $user = 'root';
        $password = '';
        $dbh = null;
        try {
            $dbh = new PDO($dsn, $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            exit(0);
        }
        return $dbh;
    }
}


$dbh = Database::connect();

//getUtilisateur($dbh, 'cc');


echo (1!=0);
//insererUtilisateur($dbh,'ccaz','ccc','co','co','2016','1997-01-01','kjaa@ljnf.com','jjj.css');
//echo testerMdp($dbh,'drossin','lapin');

$dbh = null;
?>
