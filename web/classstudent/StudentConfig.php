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
            $ticket = $_POST["ticket"];
            $key = $_POST["key"];
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
                    if ( $key == "" ) $query = "select * from t_student where stuID = ".$row['stuID']."";
                    else $query = "select * from t_student where stuID = ".$row['stuID']." and ".$ticket." = ".$key."";
                    if ( !($result = mysql_query($query)) ){
                        $return['Result'] = "Fail";
                        $return['Info'] = "Select student error: ".mysql_error();
                        break;
                    }
                    else if ( !($stu = mysql_fetch_array($result)) ) {
                        continue;
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
        
        case "AddStudentEach":{
            $return = array( "Type"=>"", "Result"=>"", "Info"=>"" );
            $classID = $_POST["classID"];
            $stuNumber = $_POST["stuNumber"];
            $stuName = $_POST["stuName"];
            $stuEnName = $_POST["stuEnName"];
            $telphone = $_POST["telphone"];
            $stuQQNum = $_POST["stuQQNum"];
            $stuFace = $_POST["stuFace"];
            $deptName = $_POST["deptName"];
            $stuDesc = $_POST["stuDesc"];
            $stuStatus = $_POST["stuStatus"];
            $stuPasswd = "123456";
            $create_at = date("Y-m-d H:m:s", time());
            $online = 0;
            $query = "select * from t_student where stuNumber = ".$stuNumber."";
            if ( !($res = mysql_query($query)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Select student error: ".mysql_error();
                break;
            }
            else if ( !($stu = mysql_fetch_array($res)) ){
                //没有次学生，新增学生，并更新ｒｅｌ
                $query = "insert into t_student ( stuNumber, stuName, stuEnName, telphone, stuPasswd, create_at, stuStatus, deptName, stuFace, stuQQNum, stuDesc ) values ( ".$stuNumber.", '".$stuName."', '".$stuEnName."', '".$telphone."', '".$stuPasswd."', '".$create_at."', ".$stuStatus.", '".$deptName."', '".$stuFace."', '".$stuQQNum."', '".$stuDesc."' )";
                if ( !mysql_query($query) ){
                    $return['Result'] = "Fail";
                    $return['Info'] = "Insert student error: ".mysql_error();
                    break;
                }
                else {
                    $stuID = mysql_insert_id();
                }
            }
            else {
                //存在次学生，跟新ｒｅｌ
                $stuID = $stu["stuID"];
            }
            $query = "select * from t_relclassstudent where classID = ".$classID." and stuID = ".$stuID."";
            if ( !($res = mysql_query($query)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Select rel error: ".mysql_error();
            }
            else if ( mysql_fetch_array($res) ){
                $return['Result'] = "Fail";
                $return['Info'] = "This student has existed";
            }
            else {
                $query = "insert into t_relclassstudent ( stuID, classID ) values ( ".$stuID.", ".$classID." )";
                if ( !mysql_query($query) ){
                    $return['Result'] = "Fail";
                    $return['Info'] = "Insert rel error: ".mysql_error();
                }
                else {
                    $return['Result'] = "Success";
                    $return['Info'] = "Success to add a student: ".$stuName;
                }
            }
            break;
        }
        
        default : break;
    }
    echo json_encode($return);   
?>

















