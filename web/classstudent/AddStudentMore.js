var GET = $.urlGet();
var coID = GET["coID"];
var classID = GET['classID'];
var filepath = GET['filepath'];
var stulist = GET['stulist'];

$(document).ready(function(){
    changeClassAndUrl();
    changeCourseName(coID);
    changeClassName(classID);
    $("#courseclass").addClass("active");
    $("#courseclass > a").attr("href","#");
    
    var stulist = showStudentList();
    $('.popover-dismiss').popover({
		trigger: 'manual'
	});
    $('.popover-dismiss').blur(function(){
		$(this).popover('hide');
	});
	$("#back").click(function(){
        window.location.href = "../classstudent/ClassStudentList.php?coID="+coID+"&classID="+classID;
    });
    $("#backmodify").click(function(){
        window.location.href = "../classstudent/ClassStudentList.php?coID="+coID+"&classID="+classID;
    });
    $("#next").click(function(){
        //批量导入
        addStudentMore(stulist);
    });
    
    
});

function showStudentList(){
    stulist = decodeURI(stulist);
    stulist = stulist.split(",");
    var list = "<table class='table table-striped table-hover'><thead><tr><th>学号</th><th>姓名</th></tr></thead><tbody>";
    for(var i = 0; i < stulist.length; i++){
        var stu = stulist[i].split(" ");
        list = list + "<tr><td>" + stu[0] + "</td><td> " + stu[1].replace(/\s+/g, '') + " </td></tr>";
    }
    list += "</tbody></table>"
	$("#stulist").html(list);
	return stulist;
}


function addStudentMore(stulist){
    $.ajax({
        url: "StudentConfig.php",
        type: "POST",
        dataType: "json",
        data: { Type: "AddStudentMore", stulist: stulist, classID: classID, coID: coID },
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
            else{
                alert(data.Info);            
            }
        }
    });
}







