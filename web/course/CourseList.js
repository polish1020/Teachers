$(document).ready(function(){
	$("#index").attr("class","dropdown");
	$("#course").attr("class","active dropdown");
    SearchCourse();
});

$(function(){

    $("#changeTerm > div")
    .mouseover(function(){
        $("a",this).css({
            cursor : "pointer"
        });
    })
    .mouseout(function(){
        $("a",this).css({
            cursor : "default"
        });
    })
    .click(function(){
        var term = $("a",this).html();
        $("#coTerm").html(term);
        SearchCourse();
    });

    $("#changeYear > div")
    .mouseover(function(){
        $("a",this).css({
            cursor : "pointer"
        });
    })
    .mouseout(function(){
        $("a",this).css({
            cursor : "default"
        });
    })
    .click(function(){
        var Year = $("a",this).html();
        $("#coYear").html(Year);
        SearchCourse();
    });

});

function SearchCourse(){
    var Year = $("#coYear").html();
    var Term = $("#coTerm").html();
    $.ajax({
        url: "CourseMangement.php",
        type: "POST",
        dataType: "json",
        data: {Type:"SearchCourse", coYear:Year, coTerm:Term},
        error: function( XMLHttpRequuest, textStatus, errorThrown ){
            alert( XMLHttpRequuest.responseText );
            alert( textStatus );
            alert( errorThrown );
        },    
        success: function( data, textStatus ){
            if ( data.Result == "Fail" ){
                alert( data.Info );
            } 
            else if ( data.Result == "None" ){
                $("#tablebody").html("无查询结果");
            }
            else if ( data.Result == "Success" ){
                $("#tablebody").html("");
                for ( var i = 0; i < data.Count; i++){
                    if ( data.CourseArray[i].coStatus == 1 ){
                        var status = "活动";
                    }
                    else {
                        var status = "关闭";
                    }
                    var operation = "<a id='modify' name='"+data.CourseArray[i].coID+"'>修改 </a><a id='delete' name='"+data.CourseArray[i].coID+"_"+data.CourseArray[i].coYear+"'> 删除</a>";
                    var row = '<tr id="row" name="'+data.CourseArray[i].coID+'"><td>'+data.CourseArray[i].coBH+'</td><td>'+data.CourseArray[i].coName+'</td><td id="coYear">'+data.CourseArray[i].coYear+'</td><td>'+data.CourseArray[i].coTerm+'</td><td>'+data.CourseArray[i].coDept+'</td><td>'+status+'</td><td>'+operation+'</td></tr>';
                    $("#tablebody").append(row);
                    $("#tablebody").delegate("#row","mouseover",function(){
						$(this).css({
							cursor : "pointer"
						});
					});
                    $("#tablebody").delegate("#row","mouseout",function(){
						$(this).css({
							cursor : "pointer"
						});
					});
                    $("#tablebody").delegate("#delete","click",function(){
						var str = $(this).attr("name");
                        var array = str.split('_'); 
                        var coID = array[0];
                        var coYear = array[1];       
                        DeleteCourse( coID, coYear );
					});
                    $("#tablebody").delegate("#modify","click",function(){
						var coID = $(this).attr("name");
                        window.location.href = "CourseModify.php?coID="+coID+"";
					});
                    $("#tablebody").delegate("#row","click",function(){
						var coID = $(this).attr("name");
                        //alert(coID);
					});
                }
                
            }
        }
    });
}


function DeleteCourse( ID, Year ){
    $.ajax({
        url: "CourseMangement.php",
        type: "POST",
        dataType: "json",
        data: {Type: "DeleteCourse", coID: ID, coYear: Year},
        error: function( XMLHttpRequest, textStatus, errorThrown ){
            alert( XMLHttpRequuest.responseText );
            alert( textStatus );
            alert( errorThrown );
        },
        success: function( data, textStatus ){
            if ( data.Result == "Fail" ){
                alert(data.Info);
            }
            else if ( data.Result == "Success" ){
                alert(data.Info);
                SearchCourse();
            }
        }
    });
}











