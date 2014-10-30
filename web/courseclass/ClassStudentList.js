$(document).ready(function(){
    var GET = $.urlGet();
    var coID = GET["coID"];
    var classID = GET['classID'];
    changeClassAndUrl();
    changeCourseName(coID);
    searchStudent(classID);
});

$(function(){
    var GET = $.urlGet();
	var coID = GET['coID'];
    $("#back").click(function(){
        window.location.href = "ClassList.php?coID="+coID+"";
    });
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
});

function searchStudent(classID){
    $.ajax({
        url: "StudentConfig.php",
        type: "POST",
        dataType: "json",
        data: { Type: "SearchStudent", classID: classID },
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
                alert(data.Info);
            }
        }
    });
}



























