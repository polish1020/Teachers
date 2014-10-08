<?php

class UserModel {

    private $dao;

    public function UserModel ($dao) {
        $this->dao = $dao;
    }

    public function listUsers($start=0, $rows=50) {
        $this->dao->fetch("SELECT * FROM T_User LIMIT ".$start.", ".$rows);
    }

    public function listUser($id) {
        $this->dao->fetch("SELECT * FROM T_User WHERE UID='".$id."'");
    }

    public function getUser() {
        if ( $user=$this->dao->getRow() )
            return $user;
        else
            return false;
    }
}

?>