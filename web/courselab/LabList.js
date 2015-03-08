var GET = $.urlGet();
var coID = GET['coID'];

$(document).ready(function(){
    changeClassAndUrl();
    changeCourseName(coID);
    $("#lab").addClass("active");
    $("#lab > a").attr("href","#");
});


