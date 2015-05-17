$(document).ready(function(){
	$("#index").attr("class","dropdown");
	$("#course").attr("class","active dropdown");
    //$(".dropdown-toggle").dropdown('toggle');

    $('.popover-dismiss').popover({
		trigger: 'manual'
	});
    $('.popover-dismiss').blur(function(){
		$(this).popover('hide');
	});
});

$(function(){
	$("#save").click(function(){
        //Save the information
        var courseName = $("#courseName").val();
        var coBH = $("#coBH").val();
        var coName = $("#coName").val();
        var coYear = $("#coYear").val();
        var coTerm = $("#coTerm").val();
        var coDept = $("#coDept").val();
        var coPrecis = $("#coPrecis").val();
        var coNote = $("#coNote").val();
        var coCalender = $("#coCalender").val();
        var ccID = $("#coBH").attr("name");
        console.log(coName);
        
        if($("#coStatus").val() == "开启"){
            var coStatus = 1;
        }
        else{
            var coStatus = 0;
        }
        
        //Check for the input
        if( courseName == "" ){
            $('#courseName').popover('show').focus();
			return;
        }
        else if( coBH == "" ){
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
        else if ( coCalender == "" ){
            $("#coCalender").popover('show').focus();
            return;
        }
        else if ( coStatus == "" ){
            $("#coStatus").popover('show').focus();
            return;
        }
        else {
            var Notice = '课程名称：'+coName+'';
            if( coName == "自定义课程" ){
                Notice += '(自定义课程)\n';
            }
            else{
                Notice += '（模板课程）\n';
            }
            Notice += '课程编号：'+coBH+'\n';
            Notice += '开课时间：'+coYear+'学年 '+coTerm+'学期\n';
            Notice += '开课学院：'+coDept+'\n';
            if ( coStatus == 1 ){
                Notice += '\n*课程空间立即生效\n';
            }
            else if ( coStatus == 0 ){
                Notice += '\n*课程空间暂不生效,稍后到课程管理界面配置\n';
            }
            //alert(Notice);
            if(!confirm(Notice)){
                return;
            }
        }

        $.ajax({
            url: "new.php",
            type: "POST",
            dataType: "json",
            data: {ThiscoBH:coBH, ThiscoName:coName, ThiscoYear:coYear, ThiscoTerm:coTerm, ThiscoDept:coDept, ThiscoNote:coNote, ThiscoPrecis:coPrecis, ThiscoCalender:coCalender, ThiscoStatus:coStatus, ThiscourseName:courseName, ThisccID:ccID},
            error: function(XMLHttpRequuest, textStatus, errorThrown){
                alert(XMLHttpRequuest.responseText);
                alert(textStatus);
                alert(errorThrown);
            },
            success: function(data, textStatus){
                console.log(data.extra);
                if(data.Result=="fail"){
                    alert(data.Info);
                }
                else if(data.Result=="success"){
                    alert(data.Info);
                    window.location.href = "CourseList.php";
                }
            }
        });//End of ajax
	});//End of click
});



