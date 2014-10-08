<?php

class DataAccess {

    private $db;

    private $query; 

    public function DataAccess ($host,$user,$pass,$db) {
        $this->db=mysql_pconnect($host,$user,$pass);
		mysql_query("SET NAMES 'utf8'");
        mysql_select_db($db,$this->db);
    }

    public function fetch($sql) {
        $this->query=mysql_unbuffered_query($sql,$this->db); 
    }

    public function getRow () {
        if ( $row=mysql_fetch_array($this->query,MYSQL_ASSOC) )
            return $row;
        else
            return false;
    }
}

?>