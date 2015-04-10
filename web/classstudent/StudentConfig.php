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
            $return = addStudent($return, $classID, $stuNumber, $stuName, $stuEnName, $telphone, $stuQQNum, $stuFace, $deptName, $stuDesc, $stuStatus, $stuPasswd, $create_at, $online);
            break;
        }
        
        case "SelectStudent":{
            $return = array( "Type" => "", "Result"=>"", "StudentArray"=>"", "Info"=>"" );
            $return["Type"] = "SelectStudent";
            $stuID = $_POST["stuID"];
            $query = "select * from t_student where stuID = ".$stuID."";
            if(!($res = mysql_query($query))){
                $return["Info"] = "Select error: ".mysql_error();
                $return["Result"] = "Fail";
            }
            
            else if (!($row = mysql_fetch_array($res))){
                $return["Result"] = "None";
                $return["Info"] = "None of result";
            }
            else {
                $return["StudentArray"] = $row;
                $return['Result'] = "Success";
                $return['Info'] = "Select student successfully";
            }
            break;
        }
        
        case "AddStudentList":{
            $return = array("Type" => "", "Result" => "", "Info" => "", "StudentArray" => "");
            $return["Type"] = "AddStudentList";
            $FileElementName = $_POST["FileID"];
            $filename = $_FILES[$FileElementName]["name"];
            if ( !empty($_FILES[$FileElementName]["error"]) ){
                $return["Result"] = "Fail";
                switch ( $_FILES[$FileElementName]["error"] ){
                    case '1':{
                        $return['Info'] = "Upload error: The uploaded file exceeds the upload_max_filesize directive in php.ini";
                        break;
                    } 
                    case '2':{
                        $return['Info'] = "Upload error: The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                        break;
                    }
                    case '3':{
                        $return['Info'] = "Upload error: The uploaded file was only partially uploaded";
                        break;
                    }
                    case '4':{
                        $return['Info'] = "Upload error: No file was uploaded";
                        break;
                    }
                    case '6':{
                        $return['Info'] = "Upload error: Missing a temporary folder";
                        break;
                    }
                    case '7':{
                        $return['Info'] = "Upload error: Failed to write file to disk";
                        break;
                    }
                    case '8':{
                        $return['Info'] = "Upload error: File upload stopped by extension";
                        break;
                    }
                    default : {
                        $return['Info'] = "Upload error: No error code avaiable";
                        break;
                    }
                }
            }
            else if(false) {
            //文件限制
            }
            else {
                //打开文件
                $tmpfile = $_FILES[$FileElementName]["tmp_name"];
                if (!file_exists($tmpfile) || !is_readable ($tmpfile)){
                    $return["Result"] = "Fail";
                    $return["Info"] = "No file uploaded";                
                }
                else {
                    $studentlist = file($tmpfile);
                    //$studentlist = "test";
                    if($studentlist == false){
                        $return["Result"] = "Fail";
                        $return["Info"] = "Failed to open the tmp file.";
                    }
                    else {
                        $return["Result"] = "Success"; 
                        $return["StudentArray"] = $studentlist;
                    }
                }
            }
            break;
        }

        case "AddStudentMore": {
            $return = array("Type" => "", "Result" => "", "Info" => "");            
            $return["Type"] = "AddSudentMore";            
            $classID = $_POST["classID"];
            $stulist = $_POST["stulist"];            
            for($i = 0; $i < count($stulist); $i++){
                //每一个学生
                $stu = split(" ", $stulist[$i]);
                if($stu[0]&&$stu[1]){
                    $stuNumber = $stu[0];
                    $stuName = $stu[1];
                    //$return["Info"] = $stuNumber . "/" . $stuName;
                    $stuPasswd = $stuNumber;
                    $create_at = date("Y-m-d H:m:s", time());
                    $online = 0;
                    $stuStatus = 1;
                    $stuEnName = "";
                    $telphone = "";
                    $stuQQNum = "";
                    $stuFace = "";
                    $deptName = "";
                    $stuDesc = "";
                    $return = addStudent($return, $classID, $stuNumber, $stuName, $stuEnName, $telphone, $stuQQNum, $stuFace, $deptName, $stuDesc, $stuStatus, $stuPasswd, $create_at, $online);
                    if($return["Result"] == "Fail"){
                        if($return['Info'] != "This student has existed"){
                            $return["Info"] .= "学生：" . $stuNumber . "/" . $stuName;
                            break;
                        }
                    }
                }
                else{
                    $return["Result"] = "Fail";
                    $return["Info"] = "failed to split the stu list";
                }               
            }
            if($i = count($stulist)){
                $return["Result"] = "Success";
                $return["Info"] = "Add Student Successfully";
            }
            break;
        }
        
        case "DeleteStudent":{
            $return = array("Type" => "", "Result" => "", "Info" => "");            
            $return["Type"] = "DeleteStudent";
            $stuID = $_POST["stuID"];
            $classID = $_POST["classID"];
            //删除rel中的classID对应的stuID，如果rel中没有其他stuID的记录，则删除Student中的stuID
            $query = "delete from t_relclassstudent where classID = " . $classID . " and stuID = " . $stuID . "";
            if( !($res = mysql_query($query)) ){
                $return["Result"] = "Fail";
                $return["Info"] = "Delete relstudent error: ".mysql_error();
            } 
            else{
                $query = "select * from t_relclassstudent where stuID = ".$stuID." and classID != ".$classID."";
                if(!($res = mysql_query($query))){
                    $return["Result"] = "Fail";
                    $return["Info"] = "Select relstudent error:".mysql_error();
                }    
                else if( ($row = mysql_fetch_array($res)) ){
                    //exists, do nothing
                    $return["Result"] = "Success";
                    $return["Info"] = "Delete student successfully";
                }
                else {
                    //not exists, delete the student from t_student
                    $query = "delete from t_student where stuID = ".$stuID;
                    if(!mysql_query($query)){
                        $return["Result"] = "Fail";
                        $return["Info"] = "Delete student error: ".mysql_error();
                    
                    }
                    else {
                        $return["Result"] = "Success";
                        $return["Info"] = "Delete student successfully";
                    }
                }
            }
            break;
        }
        
        case "ResetPassword":{
            $return = array("Type" => "", "Result" => "", "Info" => "");            
            $return["Type"] = "ResetPassword";
            $stuID = $_POST["stuID"];
            $query = "select stuNumber from t_student where stuID = ".$stuID;
            if(!($res = mysql_query($query))){
                $return["Result"] = "Fail";
                $return["Info"] = "Select Student error: ".mysql_error();
            }
            else if(!($row = mysql_fetch_array($res))){
                $return["Result"] = "Fail";
                $return["Info"] = "No such student";
            }
            else {
                $stuNumber = $row["stuNumber"];
                $query = "update t_student set stuPasswd = ".$stuNumber." where stuID = ".$stuID."";
                if(!mysql_query($query)){
                    $return["Result"] = "Fail";
                    $return["Info"] = "Update Student error: ".mysql_error();
                }
                else {
                    $return["Result"] = "Success";
                    $return["Info"] = "重置密码成功，默认密码为学号";
                }
            }
            break;
        }
        
        default : break;
    }
    
    echo json_encode($return);   
?>


<?php

function addStudent($return, $classID, $stuNumber, $stuName, $stuEnName, $telphone, $stuQQNum, $stuFace, $deptName, $stuDesc, $stuStatus, $stuPasswd, $create_at, $online){
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
            return $return;
}

?>













