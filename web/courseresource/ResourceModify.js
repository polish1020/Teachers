var GET = $.urlGet();
var coID = GET['coID'];
var resID = GET['resID'];
var items_per_page = 10;

$(document).ready(function () {
    changeClassAndUrl();
    changeCourseName(coID);
    $('.popover-dismiss').popover({
        trigger: 'manual'
    });
    $('.popover-dismiss').blur(function () {
        $(this).popover('hide');
    });
    $("#resource").addClass("active");
    $("#resource > a").attr("href", "#");
    $("#back").click(function () {
        window.location.href = "ResourceList.php?coID=" + coID + "";
    });

    $('#datetimepicker').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        startDate: Date(),
        autoclose: true
    });
    initValue();

    $('#save').click(function () {
        updateResource();
    });
});

function initValue() {
    $.ajax({
        url: "ResourceConfig.php",
        type: "POST",
        dataType: "json",
        data: {
            Type: "SelectResource",
            resID: resID
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
            alert(textStatus);
            alert(XMLHttpRequest.responseText);
        },
        success: function (data, textStatus) {
            if (data.Result == "Fail") {
                alert(data.Info);
            } else if (data.Result == "Success") {
                $('#resTitle').val(data.ResourceArray.resTitle);
                $('#resNote').val(data.ResourceArray.resNote);
                $('#resPublic').val(data.ResourceArray.Public);
                $('#resFile').val(data.ResourceArray.resFile);

                if (data.ResourceArray.resStatus == 1) {
                    $("#resStatus").val("开启");
                } else { 
                    $("#resStatus").val("关闭");
                }

                if (data.ResourceArray.Public == 1) {
                    $("#resPublic").val("公开（对您的所有学生可见）");
                } else {
                    $("#resPublic").val("不公开（只对该课程学生可见）");
                }

                var url = data.ResourceArray.resUrl;
                $("#coName").attr("name", url);
            }
        }
    });
}

function updateResource() {
    var resTitle = $('#resTitle').val();
    var resNote = $('#resNote').val();
    var resPublic = $('#resPublic').val();
    var Public;
    var Status;
    var Year = $('#coName').attr('name');

    if ($("#resStatus").val() == "开启") {
        var Status = 1;
    } else {
        var Status = 0;
    }
    if ($("#resPublic").val() == "公开（对您的所有学生可见）") {
        var Public = 1;
    } else {
        var Public = 0;
    }

    var resFile = $("#resFile").val();
    if (resTitle === '') {
        $('#resTitle').popover('show').focus();
        return;
    } else if (resNote === '') {
        $('#resNote').popover('show').focus();
        return;
    } else if (Public === '') {
        $('#resPublic').popover('show').focus();
    } else if (Status == '') {
        $('#resStatus').popover('show').focus();
        return;
    } else if (resFile == '') {
        $('#resFile').popover('show').focus();
        return;
    } else {
        var Notice = resTitle + "\n" + resNote + "\n" + resFile + "\n";
        if (Public == 1) {
            Notice += "\n*公开（对您的所有学生可见）\n";
        } else {
            Notice += "\n不公开（只对该课程学生可见）\n";
        }

        if (Status == 1) {
            Notice += "\n*立即生效\n";
        } else {
            Notice += "\n暂不生效，稍后请在实验列表中配置\n";
        }
        if (!confirm(Notice)) {
            return;
        } else {
            //
        }
    }

    $.ajax({
        url: "ResourceConfig.php",
        type: "POST",
        dataType: "json",
        data: {
            Type: "UpdateResource",
            resTitle: resTitle,
            resNote: resNote,
            resStatus: Status,
            FileID: "resFile",
            coID: coID,
            Url: Year,
            Public: Public,
            resFile: resFile,
            resID: resID
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
            alert(textStatus);
            alert(XMLHttpRequest.responseText);
        },
        success: function (data, textStatus) {
            //alert(data);
            if (data.Result == "Fail") {
                alert(data.Info);
            } else if (data.Result == "Success") {
                alert(data.Info);
                window.location.href = "ResourceList.php?coID=" + coID + "";
            }
        }
    });


}
