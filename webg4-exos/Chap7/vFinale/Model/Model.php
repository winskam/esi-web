<?php
abstract class Model {
    protected function executeRequest($sql, $params = null) {
        $db = new PDO("mysql:host=localhost;
        dbname=valvesdb;charset=utf8",
        "messi",
        "!remontada",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        if ($params == null) {              // exécution directe
            $result = $db->query($sql);
        } else {                                    // requête préparée
            $result = $db->prepare($sql); 
            $result->execute($params);
        }
        return $result;
    }
}
