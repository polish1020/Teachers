$(document).ready(function(){
    var GET = $.urlGet();
    var coID = GET["coID"];
    changeClassAndUrl();
    changeCourseName(coID);
    $('.popover-dismiss').popover({
		trigger: 'manual'
	});
    $('.popover-dismiss').blur(function(){
		$(this).popover('hide');
	});
});

$(function(){
    var GET = $.urlGet();
	var ID = GET['coID'];
    $("#back").click(function(){
        window.location.href = "ClassList.php?coID="+ID+"";
    });
    $("#save").click(function(){
        var Name = $("#className").val();
        var Desc = $("#classDesc").val();
        if ( $("#classStatus").val() == "开启" ){
            var Status = 1;
        }
        else {
            var Status = 0;
        }
        if ( Name == "" ){
            $("#className").popover("show").focus();
            return;
        }
        else if ( Desc == "" ){
            $("#classDesc").popover("show").focus();
            return;
        }
        else {
            var Notice = Name + "\n";
            Notice += Desc + "\n";
            if ( Status == 1 ){
                Notice += "\n*班级立即生效\n";
            }
            else {
                Notice += "\n*班级暂不生效，请稍后配置\n";
            }
            if ( !confirm(Notice) ){
                return;
            }
            else {
                //continue
            }
        }
        
        $.ajax({
            url: "ClassConfig.php",
            type: "POST",
            dataType: "json",
            data: { Type: "AddClass", coID: ID, className: Name, classDesc: Desc, classStatus: Status },
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
                    window.location.href = "ClassList.php?coID="+ID+"";
                }
            }
        });
        
    });
});


















