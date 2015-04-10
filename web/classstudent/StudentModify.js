var GET = $.urlGet();
var coID = GET["coID"];
var classID = GET['classID'];
var stuID = GET['stuID'];

$(document).ready(function(){
    changeClassAndUrl();
    changeCourseName(coID);
    changeClassName(classID);
    $("#courseclass").addClass("active");
    $("#courseclass > a").attr("href","#");
    
    $('.popover-dismiss').popover({
		trigger: 'manual'
	});
    $('.popover-dismiss').blur(function(){
		$(this).popover('hide');
	});
	fillStudent();
});

$(function(){
    $("#back").click(function(){
        window.location.href = "ClassStudentList.php?coID="+coID+"&classID="+classID+"";
    });
    $("#save").click(function(){
        saveStudent();
    });
});

function fillStudent(){
    $.ajax({
        url: "StudentConfig.php",
        type: "POST",
        dataType: "json",
        data: {Type: "SelectStudent", stuID: stuID },
        error: function( XMLHttpRequest, textStatus, errorThrown ){
            alert(errorThrown);
            alert(textStatus);
            alert(XMLHttpRequest.responseText);
        },
        success: function(data, textStatus ){
            if(data.Result == "Fail"){
                alert(data.Info); 
            }
            else if(data.Result == "Success"){
                //fill the input
                $("#stuNumber").val(data.StudentArray.stuNumber);
                $("#stuName").val(data.StudentArray.stuName);
                $("#stuEnName").val(data.StudentArray.stuEnName);
                $("#telphone").val(data.StudentArray.telphone);
                $("#stuQQNum").val(data.StudentArray.stuQQNum);
                $("#stuFace").val(data.StudentArray.stuFace);
                $("#deptName").val(data.StudentArray.deptName);
                $("#stuDesc").val(data.StudentArray.stuDesc);
                
                if(data.StudentArray.stuStatus == "1"){
                    $("#stuStatus").val("开启");
                }
                else{
                    $("#stuStatus").val("关闭");
                }
                
            }
            else if(data.Result == "None"){
                alert(data.Info);
            }
            else{
                alert("other");
            }
        }
    });
}

function saveStudent(){
        var stuNumber = $("#stuNumber").val();
        var stuName = $("#stuName").val();
        var stuEnName = $("#stuEnName").val();
        var telphone = $("#telphone").val();
        var stuQQNum = $("#stuQQNum").val();
        var stuFace = $("#stuFace").val();
        var deptName = $("#deptName").val();
        var stuDesc = $("#stuDesc").val();
        if ( $("#stuStatus").val() == "开启" ){
            var stuStatus = 1;
        }
        else {
            var stuStatus = 0;
        }
        if ( stuNumber == "" ){
            $("#stuNumber").popover("show").focus();
            return;
        }
        else if ( stuName == "" ){
            $("#stuName").popover("show").focus();
            return;
        }
        else {
            var Notice = "学号："+stuNumber+"\n";
            Notice += "姓名："+stuName+"\n";
            if ( stuStatus == 1 ){
                Notice += "\n*学生立即生效\n";
            }
            else {
                Notice += "\n*学生暂不生效，请稍后配置\n";
            }
            if ( !confirm(Notice) ){
                return;
            }
            else {
                $.ajax({
                    url: "StudentConfig.php",
                    type: "POST",
                    dataType: "json",
                    data: { Type: "AddStudentEach", stuNumber: stuNumber, stuName: stuName, stuEnName: stuEnName, telphone: telphone, stuQQNum: stuQQNum, stuFace: stuFace, deptName: deptName, stuDesc: stuDesc, stuStatus: stuStatus, classID: classID },
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
                            window.location.href = "ClassStudentList.php?coID="+coID+"&classID="+classID+"";
                        }
                    }
                });
            }
        }
}

