$(document).ready(function(){
    var GET = $.urlGet();
    var coID = GET["coID"];
    changeClassAndUrl();
    changeCourseName(coID);
    SearchClass(coID);
});

$(function(){
    var GET = $.urlGet();
	var ID = GET['coID'];
    $("#new").click(function(){
        window.location.href = "NewClass.php?coID="+ID+"";
    });
});

function SearchClass(coID){
    $.ajax({
        url: "ClassConfig.php",
        type: "POST",
        dataType: "json",
        data: { Type: "SearchClass", coID: coID },
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
                $("#tablebody").html("无班级列表");
            }
            else if ( data.Result == "Success" ){
                $("#tablebody").html("");
                for ( var i = 0; i < data.Count; i++ ){
                    if ( data.ClassArray[i].classStatus == 1 ){
                        var Status = "开启";
                    }
                    else {
                        var Status = "关闭";
                    }
                    var option = '<a id="modify'+i+'" name="'+data.ClassArray[i].classID+'">修改  </a>';
                    option += '<a id="delete'+i+'" name="'+data.ClassArray[i].classID+'">  删除</a>';
                    var row = '<tr id="row" name="'+data.ClassArray[i].classID+'">';
                    row += '<td name="'+data.ClassArray[i].classID+'">'+data.ClassArray[i].classID+'</td>';
                    row += '<td name="'+data.ClassArray[i].classID+'">'+data.ClassArray[i].className+'</td>';
                    row += '<td name="'+data.ClassArray[i].classID+'">'+data.ClassArray[i].classDesc+'</td>';
                    row += '<td name="'+data.ClassArray[i].classID+'">'+Status+'</td>';
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
                    $("#tablebody").delegate("#modify"+i+"", "click", function(){
                        var classID = $(this).attr("name");                                                
                        window.location.href = "ClassModify.php?coID="+coID+"&classID="+classID+"";
                    });
                    $("#tablebody").delegate("#delete"+i+"", "click", function(){
                        var classID = $(this).attr("name");                                            
                        DeleteClass(classID,coID);
                    });
                    $("#tablebody").delegate("td[name='"+data.ClassArray[i].classID+"']", "click", function(){
                        var classID = $(this).attr("name");                                             
                        window.location.href = "ClassStudentList.php?coID="+coID+"&classID="+classID+"";
                    });                
                }//End of for
            }
        }
    });
}

function DeleteClass(classID, coID){
    $.ajax({
        url: "ClassConfig.php",
        type: "POST",
        dataType: "json",
        data: { Type: "DeleteClass", classID: classID },
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
	            SearchClass(coID);
	        }
	    }
    });
}


































