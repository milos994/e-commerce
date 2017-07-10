<?php
/**
 * Model koji odgovara tabeli user.
 */
class UserModel implements ModelInterface {
    
    /**
     * Metod koji vraca spisak svih korisnika iz tabele user.
     * @return array
     */
    public static function getAll() {
        $SQL = 'SELECT * FROM user;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute();
        if ($res) {
            return $prep->fetchAll(PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }
    
    /**
     * Metod koji vraca objekat sa podacima proizvoda ciji je user_id dat kao
     * argument metoda. 
     * @param int $user_id
     * @return stdClass|null
     */
    public static function getById($user_id) {
        $SQL = 'SELECT * FROM user WHERE user_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$user_id]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
    
    /**
     * Metod koji vraca objekat sa podacima korisnika ciji su username i 
     * passwordHash dati kao argumenti metoda.
     * @param varchar $username
     * @param char $passwordHash
     * @return stdClass|null
     */
    public static function getByUsernameAndPasswordHash($username, $passwordHash) {
        $SQL = 'SELECT * FROM user WHERE `username` = ? AND `password` = ? AND active = 1;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$username, $passwordHash]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
    
    /**
     * Metod koji vraca objekat sa podacima korisnika ciji su username i email
     * dati kao argumenti metoda.
     * @param varchar $username
     * @param varchar $email
     * @return stdClass|null
     */
    public static function getByUsernameAndEmail($username, $email) {
        $SQL = 'SELECT * FROM user WHERE `username` = ? AND `email` = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$username, $email]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
    
    /**
     * Metod koji vrsi dodavanje zapisa korisnika u bazu podataka.
     * @param varchar $name
     * @param varchar $surname
     * @param varchar $email
     * @param varchar $username
     * @param char $passwordhash
     * @param varchar $ip
     * @return boolean
     */
    public static function add($name, $surname, $email, $username, $passwordhash, $ip) {
        $SQL = 'INSERT INTO user (name, surname, email, username, password, ip) VALUES (?, ?, ?, ?, ?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$name, $surname, $email, $username, $passwordhash, $ip]);
    }
    
    /**
     * Metod koji vrsi brisanje korisnika iz baze podataka.
     * @param int $user_id
     * @return boolean
     */
    public static function delete($user_id) {
        $user_id = intval($user_id);
        $SQL = 'DELETE from user WHERE user_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$user_id]);
    }

}
