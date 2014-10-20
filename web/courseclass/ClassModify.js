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
            //
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
});
