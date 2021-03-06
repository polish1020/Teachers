var GET = $.urlGet();
var coID = GET['coID'];
var items_per_page = 10;

$(document).ready(function () {
    changeClassAndUrl();
    changeCourseName(coID);
    $("#lab").addClass("active");
    $("#lab > a").attr("href", "#");
    $("#new").click(function () {
        window.location.href = "NewLab.php?coID=" + coID + "";
    });
    initItems();
});

function initItems() {
    $("#tablebody").empty().append('<p>正在加载……</p>');
    $.ajax({
        url: "LabConfig.php",
        type: "POST",
        dataType: "json",
        data: {
            Type: "SearchLabItems",
            coID: coID
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest.responseText);
            alert(textStatus);
            alert(errorThrown);
        },
        success: ajaxSuccessCallback
    });
}

function ajaxSuccessCallback(data, textStatus) {
    var items;
    if (data.Result == "Fail") {
        items = 0;
    } else if (data.Result == "None") {
        items = 1;
    } else if (data.Result == "Success") {
        items = data.Items;
    }
    initPagination(items);
}

function initPagination(items) {
    if (items == 1) {
        $("#tablebody").empty().append('<p>搜索无结果！</p>');
    } else if (items == 0) {
        alert("搜索失败，请重试");
    } else {
        window.Items = items;
        var num_entries = items.length;
        var opt = {
            callback: pageSelectCallback,
            current_page: 0,
            items_per_page: items_per_page,
            num_edge_entries: 2,
            num_display_entries: 8,
            next_text: "next",
            prev_text: "prev",
            load_first_page: true
        };
        $("#Pagination").pagination(num_entries, opt);
    }
}

function pageSelectCallback(pageIndex, jq) {
    var max_items_page = Math.min(window.Items.length, (pageIndex + 1) * items_per_page);
    $("#tablebody").empty();
    for (var i = items_per_page * pageIndex; i < max_items_page; i++) {
        if (window.Items[i].examStatus == 1) {
            var Status = "开启";
        } else {
            var Status = "关闭";
        }
        var option = '<a id="modify' + i + '" name="' + window.Items[i].examDefID + '">修改  </a>';
        option += '<a id="delete' + i + '" name="' + window.Items[i].examDefID + '">  删除</a>';
        var row = '<tr id="row" name="' + window.Items[i].examDefID + '">';
        row += '<td name="' + window.Items[i].examDefID + '">' + window.Items[i].examDefName + '</td>';
        row += '<td name="' + window.Items[i].examDefID + '">' + window.Items[i].examFileName + '</td>';
        row += '<td name="' + window.Items[i].examDefID + '">' + window.Items[i].examDefNote + '</td>';
        row += '<td name="' + window.Items[i].examDefID + '">' + window.Items[i].endDate + '</td>';
        row += '<td name="' + window.Items[i].examDefID + '">' + Status + '</td>';
        row += '<td id="op">' + option + '</td>';
        row += '</tr>';
        $("#tablebody").append(row);
        $("#tablebody").delegate("#row", "mouseover", function () {
            $(this).css({
                cursor: "pointer"
            });
        });
        $("#tablebody").delegate("#row", "mouseout", function () {
            $(this).css({
                cursor: "default"
            });
        });
        $("#tablebody").delegate("#modify" + i + "", "click", function () {
            var examDefID = $(this).attr("name");
            window.location.href = "LabModify.php?coID=" + coID + "&examDefID=" + examDefID + "";
        });
        $("#tablebody").delegate("#delete" + i + "", "click", function () {
            var examDefID = $(this).attr("name");
            deleteLab(examDefID, coID);
        });
        // $("#tablebody").delegate("td[name='" + data.ClassArray[i].classID + "']", "click", function () {
        //     var examDefID = $(this).attr("name");
        //     window.location.href = "../classstudent/ClassStudentList.php?coID=" + coID + "&classID=" + classID + "";
        // });
    }
    return false;
}

function deleteLab(examDefID, coID) {
	$.ajax({
        url: "LabConfig.php",
        type: "POST",
        dataType: "json",
        data: { Type: "DeleteLab", examDefID: examDefID, coID: coID },
        error: function( XMLHttpRequest, textStatus, errorThrown ){
            alert(errorThrown);
            alert(textStatus);
            alert(XMLHttpRequest.responseText);
        },
        success: function(data, textStatus){
            if ( data.Result == "Fail" ){
                alert(data.Info);
            }
            else if ( data.Result == "Success" ){
                alert(data.Info);
                $("#tablebody tr[name="+examDefID+"]").remove();
            }
        }
    });
}
