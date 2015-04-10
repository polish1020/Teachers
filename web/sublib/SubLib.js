$(document).ready(function(){
	$("#index").attr("class","dropdown");
	$("#sublib").attr("class","active dropdown");
    //SearchCourse();
});

$(function(){

    $("#changeDifficult > div")
    .mouseover(function(){
        $("a",this).css({
            cursor : "pointer"
        });
    })
    .mouseout(function(){
        $("a",this).css({
            cursor : "default"
        });
    })
    .click(function(){
        var Difficulty = $("a",this).html();
        $("#subDifficulty").html(Difficulty);
        SearchCourse();
    });

    $("#changeSub > div")
    .mouseover(function(){
        $("a",this).css({
            cursor : "pointer"
        });
    })
    .mouseout(function(){
        $("a",this).css({
            cursor : "default"
        });
    })
    .click(function(){
        var Type = $("a",this).html();
        $("#subType").html(Type);
        SearchCourse();
    });

});

function searchSub(){
    var Type = $("#subType").html();
    var Difficulty = $("#subDifficulty").html();
    
    $.ajax({
        url: "SubConfig.php",
        type: "POST",
        dataType: "json",
        data: {},
        error: function( XMLHttpRequuest, textStatus, errorThrown ){
            alert( XMLHttpRequuest.responseText );
            alert( textStatus );
            alert( errorThrown );
        }, 
        success: function( data, textStatus ){
            
        }
    });
}





















