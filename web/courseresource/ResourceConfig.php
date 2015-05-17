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
    	case 'SearchResourceItems': $return = searchResourceItems();break;
    	case 'AddResource': $return  = addResource($uNum, $techID);break;
        case 'SelectResource': $return = selectResource();break;
        case 'UpdateResource': $return = updateResource($uNum, $techID);break;
        case 'DeleteResource': $return = deleteResource();break;
    	default: break;
    }
    echo json_encode($return);

    function searchResourceItems() {
        $return = array("Type" => "", "Result" => "", "Info" => "", "Items" => "");
        $coID = $_POST['coID'];
        $query = 'select * from t_resource where coID = '. $coID .'';
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

    function addResource($uNum, $techID) {
        $return = array( "Type"=>"", "Result"=>"", "Info"=>"" );
        $return['Type'] = "AddResource";
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
                
        } else if ( file_exists("../../teacherdata/".$uNum."/lesson/".$coYear."/".$coID."/resource/".$name."") ){
                $return['Result'] = "Exist";
                $return['Info'] = $name." is already exist";
        } else if (false){
                //文件名长度限制和文件大小限制
        } else {
            $resTitle = $_POST['resTitle'];
            $resNote = $_POST['resNote'];
            $resUrl = "../../teacherdata/".$uNum."/lesson/".$coYear."/".$coID."/resource/".$name."";
            $resCreateDate = date('Y-m-d H:m:s',time());
            $coID = $coID;
            $resStatus = $_POST['resStatus'];
            $Public = $_POST['Public'];
            $resFile = $name;

            $query = 'insert into t_resource'
                    . '(resTitle, resNote, resUrl, resCreateDate, coID, resStatus, resFile, Public)'
                    . 'values ("'. $resTitle .'", "'.$resNote.'", "'.$resUrl.'", "'.$resCreateDate.'", '.$coID.', '.$resStatus.', "'.$resFile.'", '.$Public.')';

                if ( !($res = mysql_query($query)) ){
                    $return['Result'] = "FailInsert";
                    $return['Info'] = "Insert error: ".mysql_error();
                }
                else {
                    //store successfully
                    $inserID = mysql_insert_id();
                    if(move_uploaded_file($_FILES[$fileElementName]["tmp_name"], "../../teacherdata/".$uNum."/lesson/".$coYear."/".$coID."/resource/".$name."")){
                        $return['Result'] = "Success";
                        $return['Info'] = "Add resource successfully";   
                    } else {
                        if(mysql_query('delete from t_resource where resID='.$inserID)){
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

    function selectResource() {
            $return = array( "Type"=>"", "Result"=>"", "Info"=>"", "ResourceArray"=>"" );
            $return['Type'] = "SelectResource";
            $resID = $_POST["resID"];
            $query = "select * from t_resource where resID = '".$resID."'";
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
                $return['ResourceArray'] = $row;
            }
            return $return;
    }

    function updateResource($uNum, $techID) {
        $resTitle = $_POST['resTitle'];
        $resNote = $_POST['resNote'];
        $resUrl = $_POST['Url'];
        $resCreateDate = date('Y-m-d H:m:s',time());
        $coID = $_POST['coID'];
        $resStatus = $_POST['resStatus'];
        $Public = $_POST['Public'];
        $resFile = $_POST['resFile'];
        $resID = $_POST['resID'];

        $query = 'update t_resource set '
                    . 'resTitle="'. $resTitle .'", resNote="'.$resNote.'", resUrl="'.$resUrl.'", resCreateDate="'.$resCreateDate.'", coID='.$coID.', resStatus='.$resStatus.', resFile="'.$resFile.'", Public='.$Public.' where resID='.$resID.'';
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

    function deleteResource() {
            $return = array( "Type"=>"", "Info"=>"" );
            $return['Type'] = "DeleteResource";
            $resID = $_POST["resID"];
            $query = "select * from t_resource where resID = ".$resID."";
            if ( !($res = mysql_query($query)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Select error: ".mysql_error();
            }
            else if ( !($row = mysql_fetch_array($res)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Not exist";
            }
            else {
                $url = $row["resUrl"];
                if ( !file_exists($url) ){
                    $return['Result'] = "Fail";
                    $return['Info'] = "resFile is not found";
                }
                else if ( !unlink($url) ){
                    $return['Result'] = "Fail";
                    $return['Info'] = "Cannot delete the resource";
                }
                else {
                    $query = "delete from t_resource where resID = ".$resID."";
                    if ( !($res = mysql_query($query)) ){
                        $return['Result'] = "Fail";
                        $return['Info'] = "Delete error: ".mysql_error();
                    }
                    else {
                        $return['Result'] = "Success";
                        $return['Info']  = "Delete resource successfully";
                    }
                }
            }
            return $return;
    }

?>

