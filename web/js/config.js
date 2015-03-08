function changeClassAndUrl(){

    var GET = $.urlGet();
	var ID = GET['coID'];
	
    $("#index").attr("class","dropdown");
	$("#course").attr("class","active dropdown");
	
	
	
	var url = $("#lect > a").attr("href") + "?coID=" + ID;
	$("#lect > a").attr("href", url);
	
	var url = $("#lab > a").attr("href") + "?coID=" + ID;
	$("#lab > a").attr("href", url);
	
	var url = $("#homework > a").attr("href") + "?coID=" + ID;
	$("#homework > a").attr("href", url);
	
	var url = $("#resource > a").attr("href") + "?coID=" + ID;
	$("#resource > a").attr("href", url);
	
	var url = $("#exam > a").attr("href") + "?coID=" + ID;
	$("#exam > a").attr("href", url);
	
	var url = $("#courseclass > a").attr("href") + "?coID=" + ID;
	$("#courseclass > a").attr("href", url);
	
	
}

function changeCourseName(ID){
    
    $.ajax({
        url: "../course/CourseMangement.php",
        type: "POST",
        dataType: "json",
        data: {Type: "SelectCourse", coID: ID},
        error: function( XMLHttpRequest, textStatus, errorThrown ){
            alert(errorThrown);
            alert(textStatus);
            alert(XMLHttpRequest.responseText);
        },
        success: function( data, textStatus ){
            if ( data.Result == "Fail" ){
                alert(data.Info);
            }
            else if ( data.Result == "Success" ){
                //alert(data.Info);
                $("#coName").html(data.CourseArray.coName+"("+data.CourseArray.coYear+data.CourseArray.coTerm+")");   
                $("#coName").attr("name",data.CourseArray.coYear);                     
            }
        }
    });
}

function changeClassName(ID){
    
    $.ajax({
        url: "../courseclass/ClassConfig.php",
        type: "POST",
        dataType: "json",
        data: {Type: "SelectClass", classID: ID},
        error: function( XMLHttpRequest, textStatus, errorThrown ){
            alert(errorThrown);
            alert(textStatus);
            alert(XMLHttpRequest.responseText);
        },
        success: function( data, textStatus ){
            if ( data.Result == "Fail" ){
                alert(data.Info);
            }
            else if ( data.Result == "Success" ){
                //alert(data.Info);
                $("#class").html("<span>"+data.ClassArray.className+"</span>");   
            }
        }
    });
}

