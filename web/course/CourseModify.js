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
	var ID = GET['coID'];
    $.ajax({
        url: "CourseMangement.php",
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
                $("#coBH").val(data.CourseArray.coBH);
                $("#coName").val(data.CourseArray.coName);
                $("#coYear").val(data.CourseArray.coYear);
                $("#coDept").val(data.CourseArray.coDept);
                $("#coTerm").val(data.CourseArray.coTerm);
                $("#coPrecis").val(data.CourseArray.coPrecis);
                $("#coNote").val(data.CourseArray.coNote);
                $("#coCalendar").val(data.CourseArray.coCalendar);
                if ( data.CourseArray.coStatus == 1){
                    $("#coStatus").val("开启");
                }
                else if ( data.CourseArray.coStatus ==0 ){
                    $("#coStatus").val("关闭");
                }
                $("#coBH").attr("name", data.CourseArray.ccID)          
                
            }
        }
    });
});

$(function(){
    $("#save").click(function(){
        var GET = $.urlGet();
	    var coID = GET['coID'];
        var coBH = $("#coBH").val();
        var coName = $("#coName").val();
        var coYear = $("#coYear").val();
        var coTerm = $("#coTerm").val();
        var coDept = $("#coDept").val();
        var coPrecis = $("#coPrecis").val();
        var coNote = $("#coNote").val();
        var coCalendar = $("#coCalendar").val();
        if($("#coStatus").val() == "开启"){
            var coStatus = 1;
        }
        else if ($("#coStatus").val() == "关闭"){
            var coStatus = 0;
        }
        if( coBH == "" ){
            $("#coBH").popover('show').focus();
            return;
        }
        else if ( coName == "" ){
            $("#coName").popver('show').focus();
            return;
        }
        else if ( coYear == "" ){
            $("#coYear").popover('show').focus();
            return;
        }
        else if ( coTerm == "" ){
            $("#coTerm").popover('show').focus();
            return;
        }
        else if ( coDept == "" ){
            $("#coDept").popover('show').focus();
            return;
        }
        else if ( coPrecis == "" ){
            $("#coPrecis").popover('show').focus();
            return;
        }
        else if ( coNote == "" ){
            $("#coNote").popover('show').focus();
            return;
        }
        else if ( coCalendar == "" ){
            $("#coCalender").popover('show').focus();
            return;
        }
        else if ( coStatus == "" ){
            $("#coStatus").popover('show').focus();
            return;
        }
        else {
            var Notice = '课程名称：'+coName+'';
            if( $("#coBH").attr("name") == 0 ){
                Notice += '(自定义课程)\n';
            }
            else{
                Notice += '（模板课程）\n';
            }
            Notice += '课程编号：'+coBH+'\n';
            Notice += '开课时间：'+coYear+'学年 '+coTerm+'学期\n';
            Notice += '开课学院：'+coDept+'\n';
            if ( coStatus == 1 ){
                Notice += '\n*课程空间开启\n';
            }
            else if ( coStatus == 0 ){
                Notice += '\n*课程空间关闭\n';
            }
            //alert(Notice);
            if(!confirm(Notice)){
                return;
            }
        }
        $.ajax({
            url: "CourseMangement.php",
            type: "POST",
            dataType: "json",
            data: {Type:"UpdateCourse", ID:coID, BH:coBH, Name:coName, Term:coTerm, Dept:coDept, Note:coNote, Precis:coPrecis, Calendar:coCalendar, Status:coStatus},
            error: function(XMLHttpRequuest, textStatus, errorThrown){
                alert(XMLHttpRequuest.responseText);
                alert(textStatus);
                alert(errorThrown);
            },
            success: function(data, textStatus){
                if(data.Result=="Fail"){
                    alert(data.Info);
                }
                else if(data.Result=="Success"){
                    alert(data.Info);
                    window.location.href = "CourseList.php";
                }
            }
        });//End of ajax   
    });//End of click
});













