var GET = $.urlGet();
var coID = GET['coID'];

$(document).ready(function(){
	changeClassAndUrl();
    changeCourseName(coID);

    $("#sub").addClass("active");
    $("#sub > a").attr("href","#");
    $('.popover-dismiss').popover({
		trigger: 'manual'
	});
    $('.popover-dismiss').blur(function(){
		$(this).popover('hide');
	});
	$("#back").click(function(){
        window.location.href = "SubList.php?coID="+coID+"";
    });
    $("#save").click(saveSub);
});

function saveSub(){
	var subTitle = $("#subTitle").val();
	var subType = (function(){
		switch($("#subType").val()){
			case "判断题": return 1;
			case "单选题": return 2;
			case "多选题": return 3;
			case "填空题": return 4;
			default: return 0;
		}
	})();
	var subDifficulty = (function(){
		switch($("#subDifficulty").val()){
			case "简单": return 1;
			case "中等": return 2;
			case "困难": return 3;
			default: return 0;
		}
	})();
	var subCont = $("#subCont").val();
	var Answer = $("#Answer").val();

	if(subTitle == "") $("#subTitle").popover("show").focus();
	else if(subType == 0) $("#subType").popover("show").focus();
	else if(subDifficulty == 0) $("#subDifficulty").popover("show").focus();
	else if(subCont == "") $("#subCont").popover("show").focus();
	else if(Answer == "") $("#Answer").popover("show").focus();
	else {
		var Notice = "题目：" + subCont + "\n" + "答案：" + Answer;
		if ( !confirm(Notice) ) return;
	}

	$.ajax({
		url: "SubConfig.php",
		type: "POST",
		dataType: "json",
		data: { Type: "SaveSub", subType: subType, subCont: subCont, subDifficulty: subDifficulty, subTitle: subTitle, Answer: Answer, coID: coID },
		error: function( XMLHttpRequest, textStatus, errorThrown ){
			alert(errorThrown);
            alert(textStatus);
            alert(XMLHttpRequest.responseText);
		},
		success: function( data, status ){
			if(data.Result == "Fail"){
				alert(data.Info);
			}
			else if(data.Result == "Success"){
				alert(data.Info);
				window.location.href = "SubList.php?coID="+coID+"";
			}
		}
	});
}
