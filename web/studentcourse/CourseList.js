$(document).ready(function () {
    initPage();
});

function initPage() {
    $("#index").attr("class", "dropdown");
    $("#course").attr("class", "active dropdown");
    $("#changeTerm > div")
        .mouseover(function () {
            $("a", this).css({
                cursor: "pointer"
            });
        })
        .mouseout(function () {
            $("a", this).css({
                cursor: "default"
            });
        })
        .click(function () {
            var term = $("a", this).html();
            $("#coTerm").html(term);
            SearchCourse();
        });
    $("#changeYear > div")
        .mouseover(function () {
            $("a", this).css({
                cursor: "pointer"
            });
        })
        .mouseout(function () {
            $("a", this).css({
                cursor: "default"
            });
        })
        .click(function () {
            var Year = $("a", this).html();
            $("#coYear").html(Year);
            SearchCourse();
        });
    SearchCourse();
}

function SearchCourse() {
    var Year = $("#coYear").html();
    var Term = $("#coTerm").html();
    $.ajax({
        url: "CourseConfig.php",
        type: "POST",
        dataType: "json",
        data: {
            Type: "SearchCourse",
            coYear: Year,
            coTerm: Term
        },
        error: function (XMLHttpRequuest, textStatus, errorThrown) {
            alert(XMLHttpRequuest.responseText);
            alert(textStatus);
            alert(errorThrown);
        },
        success: function (data, textStatus) {
            if (data.Result == "Fail") {
                alert(data.Info);
            } else if (data.Result == "None") {
                $("#tablebody").html("无查询结果");
            } else if (data.Result == "Success") {
                $("#tablebody").html("");
                for (var i = 0; i < data.Count; i++) {

                    var row = '<tr id="row" name="' + data.CourseArray[i].coID + '" tea="' + data.CourseArray[i].teaNum + '" teaID="' + data.CourseArray[i].teaID + '">'
                    +'<td name="' + data.CourseArray[i].coID + '" tea="' + data.CourseArray[i].teaNum + '" teaID="' + data.CourseArray[i].teaID + '">' + data.CourseArray[i].coBH + '</td>'
                    +'<td name="' + data.CourseArray[i].coID + '" tea="' + data.CourseArray[i].teaNum + '" teaID="' + data.CourseArray[i].teaID + '">' + data.CourseArray[i].coName + '</td>'
                    +'<td id="coYear" name="' + data.CourseArray[i].coID + '" tea="' + data.CourseArray[i].teaNum + '" teaID="' + data.CourseArray[i].teaID + '">' + data.CourseArray[i].coYear + '</td>'
                    +'<td name="' + data.CourseArray[i].coID + '" tea="' + data.CourseArray[i].teaNum + '" teaID="' + data.CourseArray[i].teaID + '">' + data.CourseArray[i].coTerm + '</td>'
                    +'<td name="' + data.CourseArray[i].coID + '" tea="' + data.CourseArray[i].teaNum + '" teaID="' + data.CourseArray[i].teaID + '">' + data.CourseArray[i].coTeacher + '</td>'
                    +'</tr>';

                    $("#tablebody").append(row);
                    $("#tablebody").delegate("#row", "mouseover", function () {
                        $(this).css({
                            cursor: "pointer"
                        });
                    });
                    $("#tablebody").delegate("#row", "mouseout", function () {
                        $(this).css({
                            cursor: "pointer"
                        });
                    });
                    $("#tablebody").delegate("td[id!='op']", "click", function () {
                        var coID = $(this).attr("name");
                        var teaNum = $(this).attr("tea");
                        var teaID = $(this).attr("teaID");
                        window.location.href = "../studentcourselecture/Lecture.php?coID=" + coID + "";
                    });
                    

                }

            }
        }
    });
}
