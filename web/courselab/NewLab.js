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
    $("#lab").addClass("active");
    $("#lab > a").attr("href", "#");
    $("#back").click(function () {
        window.location.href = "LabList.php?coID=" + coID + "";
    });

    $('#datetimepicker').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        startDate: Date(),
        autoclose: true
    });

    $('#save').click(function () {
        saveExam();
    });
});

function saveExam() {
    var examName = $('#examName').val();
    var examNote = $('#examNote').val();
    var endDate = $('#datetimepicker').val();
    var Status;
    var Year = $('#coName').attr('name');

    if ($("#examStatus").val() == "开启") {
        var Status = 1;
    } else {
        var Status = 0;
    }
    var examFile = $("#examFile").val();
    if (examName === '') {
        $('#examName').popover('show').focus();
        return;
    } else if (examNote === '') {
        $('#examNote').popover('show').focus();
        return;
    } else if (endDate === '') {
        $('#datetimepicker').popover('show').focus();
    } else if (Status == '') {
        $('#examStatus').popover('show').focus();
        return;
    } else if (examFile == '') {
        $('#examFile').popover('show').focus();
        return;
    } else {
        var Notice = examName + "\n" + examNote + "\n" + examFile + "\n" + endDate + "\n";
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
        url: "LabConfig.php",
        secureuri: false,
        fileElementId: "examFile",
        dataType: "json",
        data: {
            Type: "AddLab",
            examName: examName,
            examNote: examNote,
            endDate: endDate,
            examStatus: Status,
            FileID: "examFile",
            coID: coID,
            Year: Year,
            examStatus: Status
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
                window.location.href = "LabList.php?coID=" + coID + "";
            } else if (data.Result == "FailMoveUpload") {
                alert(data.Info);
            } else if (data.Result === 'FailMoveUploadAndDelete') {
                alert(data.Info);
            }
        }
    });


}
