<?php
namespace alagauda\models;

class ConnexionManager {

	public function dbConnection() {
        try 
        {
			$dbb = new \PDO('mysql:host=db5001026780.hosting-data.io;dbname=dbs887138;charset=utf8', 'dbu902963', 'Luc@s170288', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
			$dbb->exec("SET CHARACTER SET utf8");
			return $dbb;
		}

        catch (\Exception $e) 
        {
			die ('Erreur: ' .$e->getMessage());
		}
    }
}
