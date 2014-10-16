$(document).ready(function(){
    $("#index").attr("class","dropdown");
	$("#course").attr("class","active dropdown");
    var GET = $.urlGet();
	var ID = GET['coID'];
    changeCourseName(ID);
    SearchLecture(ID)
});

$(function(){
var GET = $.urlGet();
	var ID = GET['coID'];
    $("#new").click(function(){
        window.location.href = "NewLecture.php?coID="+ID+"";
    });
});

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
            }
        }
    });
}

function SearchLecture(ID){
    $.ajax({
        url: "CourseConfig.php",
        type: "POST",
        dataType: "json",
        data: { Type: "SearchLecture", coID: ID },
        error: function( XMLHttpRequest, textStatus, errorThrown ){
            alert(errorThrown);
            alert(textStatus);
            alert(XMLHttpRequest.responseText);
        },
        success: function( data, textStatus ){
            if ( data.Result == "Fail" ){
                alert(data.Info);
            }
            else if ( data.Result == "None" ){
                //alert(data.Info);
                $("#tablebody").html("无课件列表");
            }
            else if ( data.Result == "Success" ){
                alert(data.Info);
                
            }
        }
    });
    
}




















