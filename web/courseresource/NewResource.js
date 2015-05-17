var GET = $.urlGet();
var coID = GET['coID'];
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

    $('#save').click(function () {
        saveResource();
    });
});

function saveResource() {
    var resTitle = $('#resTitle').val();
    var resNote = $('#resNote').val();
    var resPublic = $('#resPublic').val();
    var Status;
    var Public;
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
    } else if (resPublic === '') {
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

    $.ajaxFileUpload({
        url: "ResourceConfig.php",
        secureuri: false,
        fileElementId: "resFile",
        dataType: "json",
        data: {
            Type: "AddResource",
            resTitle: resTitle,
            resNote: resNote,
            resPublic: resPublic,
            resStatus: Status,
            FileID: "resFile",
            coID: coID,
            Year: Year,
            Public: Public
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
            alert(textStatus);
            alert(XMLHttpRequest.responseText);
        },
        success: function (data, textStatus) {
            //alert(data);
            if (data.Result == "FailStore") {
                alert(data.Info);
            } else if (data.Result == "Exist") {
                alert(data.Info);
            } else if (data.Result == "FailInsert") {
                alert(data.Info);
            } else if (data.Result == "Success") {
                alert(data.Info);
                window.location.href = "ResourceList.php?coID=" + coID + "";
            } else if (data.Result == "FailMoveUpload") {
                alert(data.Info);
            } else if (data.Result === 'FailMoveUploadAndDelete') {
                alert(data.Info);
            }
        }
    });


}
