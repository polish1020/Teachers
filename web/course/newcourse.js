$(document).ready(function(){
	$("#index").attr("class","dropdown");
	$("#course").attr("class","active");
});

$(function(){
	$("#save").click(function(){
		alert($("#coBH").attr("name"));
	});
});