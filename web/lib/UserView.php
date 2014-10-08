<?php

class UserView {

    private $model;

    private $output;

    public function UserView ($model) {
        $this->model= $model;
    }

    public function header () {
        $this->output=<<<EOD
<!doctype html public "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title> Our Users </title>
<style>
body { font-size: 13.75px; font-family: verdana }
td { font-size: 13.75px; font-family: verdana }
.title { font-size: 15.75px; font-weight: bold; font-family: verdana }
.heading {
    font-size: 13.75px; font-weight: bold;
    font-family: verdana; background-color: #f7f8f9 }
.nav { background-color: #f7f8f9 }
</style>
</head>
<body>
<div align="center" class="title">Our Users</div>
EOD;
        $this->output.="\n<div align=\"right\"><a href=\"".
            $_SERVER['PHP_SELF']."\">Start Over</a></div>\n";

    }

    public function footer () {
        $this->output.="</body>\n</html>";
    }

    public function userItem($id=1) {
        $this->model->listUser($id);
        while ( $user=$this->model->getUser() ) {
            $this->output.="<p><b>UserID</b>:".$user['UserID']."</p>".
                "<p><b>Name</b>:".$user['UserName']."</p>".
                "<p><b># Online</b>:".$user['flag']."</p>";
            if ( $this->$user['flag']==1 ) {
                $this->output.="<p>This user has been discontinued.</p>";
            }
        }
    }

    public function userTable($rownum=0) {
        $rowsperpage='20';
        $this->model->listUsers($rownum,$rowsperpage);
        $this->output.="<table width=\"600\" align=\"center\">\n<tr>\n".
                "<td class=\"heading\">UserID</td>\n".
                "<td class=\"heading\">UserName</td>\n</tr>\n";
        while ( $user=$this->model->getUser() ) {
			//echo "kkkkkkk<br>";
            $this->output.="<tr>\n<td><a href=\"".$_SERVER['PHP_SELF'].
                "?view=user&id=".$user['UID']."\">".
                $user['UserID']."</a></td>".
                "<td>".$user['UserName']."</td>\n</tr>\n";
        }
        $this->output.="<tr class=\"nav\">\n";
        if ( $rownum!=0 && $rownum > $rowsperpage ) {
            $this->output.="<td><a href=\"".$_SERVER['PHP_SELF'].
                "?view=table&rownum=".($rownum-$rowsperpage).
                "\"><< Prev</a></td>";
        } else {
            $this->output.="<td> </td>";            
        }
        if ( $user['UID'] < ($rownum + $rowsperpage) ) {
            $this->output.="<td><a href=\"".$_SERVER['PHP_SELF'].
                "?view=table&rownum=".($rownum+$rowsperpage).
                "\">Next >></a></td>";
        } else {
            $this->output.="<td> </td>\n";            
        }
        $this->output.="</tr>\n</table>\n";
    }

    public function display () {
        return $this->output;
    }
}
?>