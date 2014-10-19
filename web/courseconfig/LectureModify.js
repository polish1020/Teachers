$(document).ready(function(){
    $("#index").attr("class","dropdown");
	$("#course").attr("class","active dropdown");
	var GET = $.urlGet();
	var ID = GET['lectID'];
	$.ajax({
	    url: "CourseConfig.php",
	    type: "POST",
	    dataType: "json",
	    data: { Type: "SelectLecture", lectID: ID },
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
	            $("#lectNum").val(data.LectureArray.lectNum);
	            $("#lectTitle").val(data.LectureArray.lectTitle);
	            $("#lectNote").val(data.LectureArray.lectNote);
	            $("#lectDesc").val(data.LectureArray.lectDesc);
	            
	            if ( data.LectureArray.lectStatus == 1 ){
	                $("#lectStatus").val("开启");
	            }
	            else {
	                $("#lectStatus").val("关闭");
	            }
	            
	            var url = data.LectureArray.lectUrl;
	            var array = url.split('/');
	            var filename = array[8];
	            $("#lectFile").val(filename);
	            $("#coName").attr("name", url);
	        }
	    }
	});
});

$(function(){
    var GET = $.urlGet();
	var ID = GET['coID'];
	var lectureID = GET['lectID'];
    $("#back").click(function(){
        window.location.href = "Lecture.php?coID="+ID+"";
    });
    $("#save").click(function(){
        var Num = $("#lectNum").val();
        var Title = $("#lectTitle").val();
        var Note = $("#lectNote").val();
        var Desc = $("#lectDesc").val();
        var Url = $("#coName").attr("name");
        if ( $("#lectStatus").val() == "开启" ){
            var Status = 1;
        }
        else {
            var Status = 0;
        }
        var File = $("#lectFile").val();
        Desc = File + Desc;
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
                //
            }
        }
        
        $.ajax({
            url: "CourseConfig.php",
            type: "POST",
            dataType: "json",
            data: { Type: "UpdateLecture", lectID: lectureID, lectUrl: Url, coID: ID, lectNum: Num, lectTitle: Title, lectNote: Note, lectDesc: Desc, lectStatus: Status },
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
                    alert(data.Info);
                    window.location.href = "Lecture.php?coID="+ID+"";
                }
            }
        });
    });
});





















