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
    switch ($Type) {
    	case 'SearchLabItems': $return = searchLabItems();break;
    	case 'AddLab': $return  = addLab($uNum, $techID);break;
        case 'SelectLab': $return = selectLab();break;
        case 'UpdateLab': $return = updateLab($uNum, $techID);break;
        case 'DeleteLab': $return = deleteLab();break;
    	default: break;
    }
    echo json_encode($return);

    function searchLabItems() {
        $return = array("Type" => "", "Result" => "", "Info" => "", "Items" => "");
        $coID = $_POST['coID'];
        $query = 'select * from t_examdef where coID = '. $coID .'';
        if(!($res = mysql_query($query))) {
            $return['Result'] = 'Fail';
            $return['Info'] = 'select error: '. mysql_error();
        } else {
            $count = 0;
            while($row = mysql_fetch_array($res)){
                $return['Items'][$count++] = $row;
            }
            if($count == 0){
                $return['Result'] = 'None';
            } else {
                $return['Result'] = 'Success';
            }
        }
        return $return;
    }

    function addLab($uNum, $techID) {
        $return = array( "Type"=>"", "Result"=>"", "Info"=>"" );
        $return['Type'] = "AddLab";
        $fileElementName = $_POST["FileID"];
        $coYear = $_POST["Year"];
        $coID = $_POST["coID"];
        $name = $_FILES[$fileElementName]["name"];
        if ( !empty($_FILES[$fileElementName]["error"]) ){
                $return['Result'] = "FailStore";
                switch ( $_FILES[$fileElementName]["error"] ){
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
                
        } else if ( file_exists("../../teacherdata/".$uNum."/lesson/".$coYear."/".$coID."/exam/".$name."") ){
                $return['Result'] = "Exist";
                $return['Info'] = $name." is already exist";
        } else if (false){
                //文件名长度限制和文件大小限制
        } else {
            $examDefName = $_POST['examName'];
            $examDefNote = $_POST['examNote'];
            $examDeflink = "../../teacherdata/".$uNum."/lesson/".$coYear."/".$coID."/exam/".$name."";
            $endDate = $_POST['endDate'];
            $examDefDate = date('Y-m-d H:m:s',time());
            $StartDate = date('Y-m-d H:m:s',time());
            $maxDayNum = 0;
            $examOrder = 0;
            $techID = $techID;
            $coID = $coID;
            $classID = 0;
            $scoreRuleID = 0;
            $scoreStandard = 0;
            $examType = 0;
            $examStatus = $_POST['examStatus'];
            $examFileName = $name;

            $query = 'insert into t_examdef'
                    . '(examDefName, examDefNote, examDeflink, endDate, examDefDate, StartDate, maxDayNum, examOrder, techID, coID, classID, scoreRuleID, scoreStandard, examType, examStatus, examFileName)'
                    . 'values ("'. $examDefName .'", "'.$examDefNote.'", "'.$examDeflink.'", "'.$endDate.'", "'.$examDefDate.'", "'.$StartDate.'", '.$maxDayNum.', '.$examOrder.', '.$techID.', '.$coID.', '.$classID.', '.$scoreRuleID.', '.$scoreStandard.', '.$examType.', '.$examStatus.', "'.$examFileName.'")';

                if ( !($res = mysql_query($query)) ){
                    $return['Result'] = "FailInsert";
                    $return['Info'] = "Insert error: ".mysql_error();
                }
                else {
                    //store successfully
                    $inserID = mysql_insert_id();
                    if(move_uploaded_file($_FILES[$fileElementName]["tmp_name"], "../../teacherdata/".$uNum."/lesson/".$coYear."/".$coID."/exam/".$name."")){
                        $return['Result'] = "Success";
                        $return['Info'] = "Add exam successfully";   
                    } else {
                        if(mysql_query('delete from t_examdef where examDefID='.$inserID)){
                            $return['Result'] = "FailMoveUpload";
                            $return['Info'] = "Move upload error: ";
                        }  else {
                            $return['Result'] = "FailMoveUploadAndDelete";
                            $return['Info'] = "Move upload and delete error ";
                        } 
                    }                
                }

        }
        return $return;
    }

    function selectLab() {
            $return = array( "Type"=>"", "Result"=>"", "Info"=>"", "LabArray"=>"" );
            $return['Type'] = "SelectLab";
            $examDefID = $_POST["examDefID"];
            $query = "select * from t_examdef where examDefID = '".$examDefID."'";
            if ( !($res = mysql_query($query)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Select error: ".mysql_error();
            }
            else if ( !($row = mysql_fetch_array($res)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "No result";
            }
            else {
                $return['Result'] = "Success";
                $return['Info'] = "Select successfully";
                $return['LabArray'] = $row;
            }
            return $return;
    }

    function updateLab($uNum, $techID) {
        $examDefName = $_POST['examName'];
        $examDefNote = $_POST['examNote'];
        $examDeflink = $_POST['Url'];
        $endDate = $_POST['endDate'];
        $examDefDate = date('Y-m-d H:m:s',time());
        $StartDate = date('Y-m-d H:m:s',time());
        $maxDayNum = 0;
        $examOrder = 0;
        $techID = $techID;
        $coID = $_POST["coID"];
        $classID = 0;
        $scoreRuleID = 0;
        $scoreStandard = 0;
        $examType = 0;
        $examStatus = $_POST['examStatus'];
        $examFileName = $_POST['examFileName'];
        $examDefID = $_POST['examDefID'];

        $query = 'update t_examdef set '
                    . 'examDefName="'. $examDefName .'", examDefNote="'.$examDefNote.'", examDeflink="'.$examDeflink.'", endDate="'.$endDate.'", examDefDate="'.$examDefDate.'", StartDate="'.$StartDate.'", maxDayNum='.$maxDayNum.', examOrder='.$examOrder.', techID='.$techID.', coID='.$coID.', classID='.$classID.', scoreRuleID='.$scoreRuleID.', scoreStandard='.$scoreStandard.', examType='.$examType.', examStatus='.$examStatus.', examFileName="'.$examFileName.'" where examDefID='.$examDefID.'';
            if ( !($res = mysql_query($query)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Update error: ".mysql_error();
            }
            else {
                $return['Result'] = "Success";
                $return['Info'] = "Update successfully";
            }
            return $return;
    }

    function deleteLab() {
            $return = array( "Type"=>"", "Info"=>"" );
            $return['Type'] = "DeleteLab";
            $examDefID = $_POST["examDefID"];
            $query = "select * from t_examdef where examDefID = ".$examDefID."";
            if ( !($res = mysql_query($query)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Select error: ".mysql_error();
            }
            else if ( !($row = mysql_fetch_array($res)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Not exist";
            }
            else {
                $url = $row["examDeflink"];
                if ( !file_exists($url) ){
                    $return['Result'] = "Fail";
                    $return['Info'] = "examFile is not found";
                }
                else if ( !unlink($url) ){
                    $return['Result'] = "Fail";
                    $return['Info'] = "Cannot delete the exam";
                }
                else {
                    $query = "delete from t_examdef where examDefID = ".$examDefID."";
                    if ( !($res = mysql_query($query)) ){
                        $return['Result'] = "Fail";
                        $return['Info'] = "Delete error: ".mysql_error();
                    }
                    else {
                        $return['Result'] = "Success";
                        $return['Info']  = "Delete exam successfully";
                    }
                }
            }
            return $return;
    }

?>

