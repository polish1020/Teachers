$(document).ready(function(){
    $("#index").attr("class","dropdown");
	$("#course").attr("class","active dropdown");
	$('.popover-dismiss').popover({
		trigger: 'manual'
	});
    $('.popover-dismiss').blur(function(){
		$(this).popover('hide');
	});
	var GET = $.urlGet();
    var ID = GET["coID"];
	changeCourseName(ID);
});

$(function(){ 
    $("#save").click(function(){
        var GET = $.urlGet();
        var ID = GET["coID"];
        var Num = $("#lectNum").val();
        var Title = $("#lectTitle").val();
        var Note = $("#lectNote").val();
        var Desc = $("#lectDesc").val();
        var Year = $("#coName").attr("name");
        if ( $("#lectStatus").val() == "开启" ){
            var Status = 1;
        }
        else {
            var Status = 0;
        }
        var File = $("#lectFile").val();
        //alert(lectFile);
        if ( Num =="" ){
            $('#lectNum').popover('show').focus();
			return;
        }
        else if ( Title == "" ){
            $('#lectTitle').popover('show').focus();
			return;
        }
        else if ( Note == "" ){
            $('#lectNote').popover('show').focus();
			return;
        }
        else if ( Desc == "" ){
            $('#lectDesc').popover('show').focus();
			return;
        }
        else if ( Status == "" ){
            $('#lectStatus').popover('show').focus();
			return;
        }
        else if ( File == "" ){
            $('#lectFile').popover('show').focus();
			return;
        }
        else {
            var Notice = Num+"\n"+Title+"\n"+File+"\n";
            if ( Status == 1 ){
                Notice += "\n*立即生效\n";
            }
            else {
                Notice += "\n暂不生效，稍后请在课件列表中配置\n";
            }
            if ( !confirm(Notice) ){
                return;
            }
            else {
                alert("1");
            }
        }
        
        $.ajaxFileUpload({
            url: "CourseConfig.php",
            secureuri: false,
            fileElementId: "lectFile",
            dataType: "json",
            data: { Type: "AddLecture", lectNum: 'Num', lectTitle: 'Title', lectNote: 'Note', lectDesc: 'Desc', lectStatus: 'Status', FileID: "lectFile", coYear: 'Year', coID: 'ID' },
            error: function( XMLHttpRequest, textStatus, errorThrown ){
                alert(errorThrown);
                alert(textStatus);
                alert(XMLHttpRequest.responseText);
            },
            success: function( data, textStatus ){
                //Upload files successfully
                //Come back to the lecture list
                alert("22");
                alert(data);
            }
        });
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
                $("#coName").attr("name",data.CourseArray.coYear);                     
            }
        }
    });
}

















