<?php
include 'db.php';

class User extends DB{
    private $nombre;
    private $username;


    public function userExists($user, $pass){
        $md5pass = $pass;
        $query = $this->connect()->prepare('SELECT * FROM tcliente WHERE tcliusu = :user AND tclipwd = :pass');
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM tcliente WHERE tcliusu = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->usuario = $currentUser['tclinom'];
            $this->username = $currentUser['tcliusu'];
        }
    }

    public function getNombre(){

        return $this->username;
    }
}

?>