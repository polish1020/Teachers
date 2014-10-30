$(document).ready(function(){
    var GET = $.urlGet();
    var coID = GET["coID"];
    var classID = GET['classID'];
    changeClassAndUrl();
    changeCourseName(coID);
    changeClassName(classID);
    searchStudent();
});

$(function(){
    var GET = $.urlGet();
	var coID = GET['coID'];
	var classID = GET['classID'];
	$("#changeticket > div")
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
        $("#ticket").html(term);
    });
    $("#back").click(function(){
        window.location.href = "../courseclass/ClassList.php?coID="+coID+"";
    });
    $("#search").click(function(){
        searchStudent();
    });
    $("#key").keypress(function(event){
        if ( event.which == 13 ){
            $("#search").trigger("click");
        }
    });
    $("#addone").click(function(){
        window.location.href = "AddStudentEach.php?coID="+coID+"&classID="+classID+"";
    });
    $("#addmore").click(function(){
        //批量导入按钮
        window.location.href = "AddStudentMore.php?coID="+coID+"&classID="+classID+"";
    });
});

function searchStudent(){
    var GET = $.urlGet();
    var coID = GET["coID"];
    var classID = GET['classID'];
    var ticketCh = $("#ticket").html();
    if ( ticketCh == "姓名" ) var ticket = "stuName";
    else if ( ticketCh == "学号" ) var ticket = "stuNumber";
    else if ( ticketCh == "英文名" ) var ticket = "stuEnName";
    else if ( ticketCh == "电话" ) var ticket = "telphone";
    else if ( ticketCh == "QQ号码" ) var ticket = "stuQQNum";
    else if ( ticketCh == "学院" ) var ticket = "deptName";
    
    var key = $("#key").val();
    
    $.ajax({
        url: "StudentConfig.php",
        type: "POST",
        dataType: "json",
        data: { Type: "SearchStudent", classID: classID, ticket: ticket, key: key },
        error: function( XMLHttpRequuest, textStatus, errorThrown ){
            alert( textStatus );
            alert( errorThrown );
            alert( XMLHttpRequuest.responseText );
        },    
        success: function( data, textStatus ){
            if ( data.Result == "Fail" ){
                alert(data.Info);
            }
            if ( data.Result == "None" ){
                $("#tablebody").html("无学生列表");
            }
            else if ( data.Result == "Success" ){
                $("#tablebody").html("");
                for ( var i = 0; i < data.Count; i++ ){
                    var option = '<a id="modify'+i+'" name="'+data.StudentArray[i].stuID+'">修改  </a>';
                    option += '<a id="delete'+i+'" name="'+data.StudentArray[i].stuID+'">  删除</a>';
                    option += '<a id="reset'+i+'" name="'+data.StudentArray[i].stuID+'">  重置密码</a>';
                    var row = '<tr id="row" name="'+data.StudentArray[i].stuID+'">';
                    row += '<td name="'+data.StudentArray[i].stuID+'">'+data.StudentArray[i].stuID+'</td>';
                    row += '<td name="'+data.StudentArray[i].stuID+'">'+data.StudentArray[i].stuNumber+'</td>';
                    row += '<td name="'+data.StudentArray[i].stuID+'">'+data.StudentArray[i].stuName+'</td>';
                    row += '<td name="'+data.StudentArray[i].stuID+'">'+data.StudentArray[i].stuEnName+'</td>';
                    row += '<td name="'+data.StudentArray[i].stuID+'">'+data.StudentArray[i].telphone+'</td>';
                    row += '<td name="'+data.StudentArray[i].stuID+'">'+data.StudentArray[i].stuQQNum+'</td>';
                    row += '<td name="'+data.StudentArray[i].stuID+'">'+data.StudentArray[i].deptName+'</td>';
                    
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
                    
                }
                    
            }
        }
    });
}



























