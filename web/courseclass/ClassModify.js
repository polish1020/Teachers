$(document).ready(function(){
    var GET = $.urlGet();
    var coID = GET["coID"];
    var classID = GET["classID"];
    changeClassAndUrl();
    changeCourseName(coID);
    
    $.ajax({
        url: "ClassConfig.php",
        type: "POST",
        dataType: "json",
        data: { Type:"SelectClass", classID: classID },
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
                $("#className").val(data.ClassArray.className);
                $("#classDesc").val(data.ClassArray.classDesc);
                if ( data.ClassArray.classStatus == 1 ){
                    $("#classStatus").val("开启");
                }
                else {
                    $("#classStatus").val("关闭");
                }
            }
        }
    });
});

$(function(){
    var GET = $.urlGet();
    var coID = GET["coID"];
    var classID = GET["classID"];
    $("#back").click(function(){
        window.location.href = "ClassList.php?coID="+coID+"";
    });
    $("#save").click(function(){
        var className = $("#className").val();
        var classDesc = $("#classDesc").val();
        if ( $("#classStatus").val() == "开启" ){
            var classStatus = 1;
        }
        else {
            var classStatus = 0;
        }
        if ( className == "" ){
            $("#className").popover("show").focus();
            return;
        }
        else if ( classDesc == "" ){
            $("#classDesc").popover("show").focus();
            return;
        }
        else {
            var Notice = className + "\n";
            Notice += classDesc + "\n";
            if ( classStatus == 1 ){
                Notice += "\n班级立即开启\n";
            }
            else {
                Notice += "\n班级暂不开启，请稍后配置\n";
            }
            if ( !(confirm(Notice)) ){
                return;
            }
            else {
                $.ajax({
                    url: "ClassConfig.php",
                    type: "POST",
                    dataType: "json",
                    data: { Type: "UpdateClass", className: className, classDesc: classDesc, classStatus: classStatus, classID: classID },
                    error: function( XMLHttpRequest, textStatus, errorThrown ){
                        alert(errorThrown);
                        alert(textStatus);
                        alert(XMLHttpRequest.responseText);
                    },
                    success: function( data, textStatus ){
                        if ( data.Result == "Fail" ){
                            alert(data.Info);
                        }
                        else if ( data.Result == "Exist" ){
                            alert(data.Info);
                        }
                        else if ( data.Result == "Success" ){
                            alert(data.Info);
                            window.location.href = "ClassList.php?coID="+coID+"";
                        }
                    }
                });
            }
        }
    });
});












