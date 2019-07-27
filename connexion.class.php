<?php
class connexion
{
    private static $ressource;
    public static function Getconnexion()
    {
        // la methide sera accessible dans d autres classe filles
        if(self::$ressource == null){
            self::$ressource = new PDO('mysql:host=localhost;dbname=stagiaire', DB_USER, DB_PASSWORD, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            return self::$ressource;
            echo'salut';
        }else{
            return self::$ressource; 
            echo'ok';
        }
    }
}
?>