var GET = $.urlGet();
var coID = GET['coID'];
var items_per_page = 10;

$(document).ready(function(){
    changeClassAndUrl();
    changeCourseName(coID);

    $("#sub").addClass("active");
    $("#sub > a").attr("href","#");
    bindSelect();
    initItems()
});

function pageSelectCallback( pageIndex, jq ){
	var max_items_page = Math.min( window.Items.length, (pageIndex+1)*items_per_page );
	$("#tablebody").empty();
	for ( var i = items_per_page*pageIndex; i < max_items_page; i++ ){
		var option = '<a id="modify'+i+'" name="'+window.Items[i].SID+'">修改  </a>';
        option += '<a id="delete'+i+'" name="'+window.Items[i].SID+'">  删除</a>';
		var row = '<tr id="row" name="'+window.Items[i].SID+'">';
        row += '<td name="'+window.Items[i].SID+'">'+window.Items[i].subType+'</td>';
        row += '<td name="'+window.Items[i].SID+'">'+window.Items[i].subTitle+'</td>';
        row += '<td name="'+window.Items[i].SID+'">'+window.Items[i].subCont+'</td>';
        row += '<td name="'+window.Items[i].SID+'">'+window.Items[i].Answer+'</td>';
        row += '<td name="'+window.Items[i].SID+'">'+window.Items[i].subDifficulty+'</td>';
        row += '<td name="'+window.Items[i].SID+'">'+window.Items[i].subDesc+'</td>';
        row += '<td id="op">'+option+'</td>';
        row += '</tr>';
        $("#tablebody").append(row);
        $("#tablebody").delegate("#row", "mouseover", function(){
            $(this).css({
				cursor: "pointer"
			});
        });
        $("#tablebody").delegate("#row", "mouseout", function(){
        	$(this).css({
            	cursor: "default"
			});
        });
        /*$("#tablebody").delegate("#modify"+i+"", "click", function(){
                        var classID = $(this).attr("name");                                                
                        window.location.href = "ClassModify.php?coID="+coID+"&classID="+classID+"";
                    });
                    $("#tablebody").delegate("#delete"+i+"", "click", function(){
                        var classID = $(this).attr("name");                                            
                        DeleteClass(classID,coID);
                    });
                    $("#tablebody").delegate("td[name='"+data.ClassArray[i].classID+"']", "click", function(){
                        var classID = $(this).attr("name");                                             
                        window.location.href = "../classstudent/ClassStudentList.php?coID="+coID+"&classID="+classID+"";
                    }); */
	}
	return false;
}

function initPagination( items ){
	if(items == -2){
		$("#tablebody").empty().append('<p>搜索无结果！</p>');
	} else if(items == -1) {
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

function initItems(subType, subDifficulty){
	$("#tablebody").empty().append('<p>正在加载……</p>');
	var subType = (function(){
		var type = $("#subType").text();
		switch(type){
			case "所有": return 0;
			case "判断题": return 1;
			case "单选题": return 2;
			case "多选题": return 3;
			case "填空题": return 4;
			default: return 0;
		}
	})();
	var subDifficulty = (function(){
		var difficulty = $("#subDifficulty").text();
		switch(difficulty){
			case "所有": return 0;
			case "简单": return 1;
			case "中等": return 2;
			case "困难": return 3;
			default: return 0;
		}
	})();
	//alert(subType+"/"+subDifficulty);
	$.ajax({
		url: "SubConfig.php",
		type: "POST",
		dataType: "json",
		data: { subType: subType, subDifficulty: subDifficulty, Type: "SearchSubItems", coID: coID },
		error: function( XMLHttpRequuest, textStatus, errorThrown ){
			alert(XMLHttpRequuest);
			alert(textStatus);
			alert(errorThrown);
		},
		success: ajaxSuccessCallback
	});
}


function ajaxSuccessCallback( data, textStatus ){
	var items;
	if(data.Result == "Fail"){
		items = -1;
	} else if(data.Result == "None") {
		items = -2;
	} else if(data.Result == "Success") {
		items = data.Items;
	}
	initPagination(items);
}

function bindSelect(){
	$("#changeDifficult > div").mouseover(function(){
        $("a",this).css({
            cursor : "pointer"
        });
    }).mouseout(function(){
        $("a",this).css({
            cursor : "default"
        });
    }) .click(function(){
        var Difficulty = $("a",this).html();
        $("#subDifficulty").html(Difficulty);
        initItems();
    });

    $("#changeSub > div").mouseover(function(){
        $("a",this).css({
            cursor : "pointer"
        });
    }).mouseout(function(){
        $("a",this).css({
            cursor : "default"
        });
    }).click(function(){
        var Type = $("a",this).html();
        $("#subType").html(Type);
        initItems();
    });

    $("#new").click(function(){
        window.location.href = "NewSub.php?coID="+coID+"";
    });
}