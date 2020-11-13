<?php

class ConnexionManager
{
    public function dbConnection()
    {
        try 
        {
            $dbb = new PDO('mysql:host=localhost;dbname=alagauda', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $dbb->exec("SET CHARACTER SET utf8");
            return $dbb;
        } 
        catch (Exception $e) 
        {
            die('Erreur: ' . $e->getMessage());
        }
    }
}