$(document).ready(function(){
	var GET = $.urlGet();
	var ID = GET['coID'];
	changeClassAndUrl();
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
                $("#tablebody").html("无课件列表");
            }
            else if ( data.Result == "Success" ){
                //alert(data.LectureArray[0].lectStatus);
                $("#tablebody").html("");
                for( var i = 0; i < data.Count; i++ ){
                    if ( data.LectureArray[i].lectStatus == 1 ){
                        var Status = "开启";
                    }
                    else {
                        var Status = "关闭";
                    }
                    var option = '<a id="modify'+i+'" name="'+data.LectureArray[i].lectID+'">修改  </a>';
                    option += '<a id="delete'+i+'" name="'+data.LectureArray[i].lectID+'">  删除</a>';
                    var row = '<tr id="row" name="'+data.LectureArray[i].lectID+'">';
                    row += '<td name="'+data.LectureArray[i].lectID+'">'+data.LectureArray[i].lectID+'</td>';
                    row += '<td name="'+data.LectureArray[i].lectID+'">'+data.LectureArray[i].lectNum+'</td>';
                    row += '<td name="'+data.LectureArray[i].lectID+'">'+data.LectureArray[i].lectTitle+'</td>';
                    row += '<td name="'+data.LectureArray[i].lectID+'">'+data.LectureArray[i].lectNote+'</td>';
                    row += '<td name="'+data.LectureArray[i].lectID+'">'+data.LectureArray[i].lectDesc+'</td>';
                    row += '<td name="'+data.LectureArray[i].lectID+'">'+Status+'</td>';
                    row += '<td id="op">'+option+'</td>';
                    row += '</tr>';
                    $("#tablebody").append(row);
                    $("#tablebody").delegate("#row", "mouseover", function(){
                        $(this).css({
                            cursor: "pointer"
                        });
                    });
                    $("#tablebody").delegate("#row", "mouseout", function(){
                        $(this).css({
                            cursor: "default"
                        });
                    });
                    $("#tablebody").delegate("#delete"+i+"", "click", function(){
                        var lectID = $(this).attr("name");                                                
                        DeleteLecture(lectID,ID);
                    });
                    $("#tablebody").delegate("#modify"+i+"", "click", function(){
                        var lectID = $(this).attr("name");                                                
                        window.location.href = "LectureModify.php?coID="+ID+"&lectID="+lectID+"";
                    });
                    $("#tablebody").delegate("td[name='"+data.LectureArray[i].lectID+"']", "click", function(){
                        var lectID = $(this).attr("name");                                                
                        FileDownload(lectID);
                    });
                }
            }
        }
    });//End of ajax 
}

function DeleteLecture(ID,coID){
    $.ajax({
        url: "CourseConfig.php",
        type: "POST",
        dataType: "json",
        data: { Type: "DeleteLecture", lectID: ID },
        error: function( XMLHttpRequest, textStatus, errorThrown ){
            alert(errorThrown);
            alert(textStatus);
            alert(XMLHttpRequest.responseText);
        },
        success: function(data, textStatus){
            if ( data.Result == "Fail" ){
                alert(data.Info);
            }
            else if ( data.Result == "Success" ){
                alert(data.Info);
                SearchLecture(coID);
            }
        }
    });
    
    
}

function FileDownload(ID){
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
                //文件下载现在还是用直接给出url，需要实现无刷新无跳转，不给出url
                //$("#filedownload").attr("href", data.LectureArray.lectUrl);
                window.location.href = data.LectureArray.lectUrl;
            }
	    }
	});
}
















