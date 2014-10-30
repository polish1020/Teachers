<?php
    session_start();
    if(!isset($_SESSION['uNum'])){
	    header("location: ../index.php");
	    exit;
    }
    
    include_once("../common/FileCopy.php");
    include_once("../common/FileDelete.php");
    include_once("../common/conn_database.php");
    //error_reporting(0);
    date_default_timezone_set('PRC');
    $techID = $_SESSION["uid"];
    $uNum = $_SESSION["uNum"];
    //$uNum = "cjh";
    mysql_select_db("db_".$uNum);
    $Type = $_POST["Type"];
    switch ( $Type ){
        case "SearchStudent":{
            $return = array( "Type"=>"", "Result"=>"", "Info"=>"", "StudentArray"=>"", "Count"=>"" );
            $return['Type'] = "SearchStudent";
            $classID = $_POST["classID"];
            $query = "select * from t_relclassstudent where classID = ".$classID."";
            if ( !($res = mysql_query($query)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Select rel error: ".mysql_error();
            }
            else {
                $return['Result'] = "Success";
                $return['Info'] = "Search successfully";   
                $return['Count'] = 0;
                while ( $row = mysql_fetch_array($res) ){
                    $query = "select * from t_student where stuID = ".$row['stuID']."";
                    if ( !($result = mysql_query($query)) ){
                        $return['Result'] = "Fail";
                        $return['Info'] = "Select student error: ".mysql_error();
                        break;
                    }
                    else if ( !($stu = mysql_fetch_array($result)) ) {
                        $return['Result'] = "Fail";
                        $return['Info'] = "No such student";
                        break;
                    }
                    else {
                        $return['StudentArray'][$return['Count']] = $stu;
                        $return['Count'] ++ ;
                    }
                }
                if ( $return['Count'] == 0 ){
                    $return['Result'] = "None";
                    $return['Info'] = "No Result";
                }                           
            }
            break;
        }
        default : break;
    }
    echo json_encode($return);
?>

















