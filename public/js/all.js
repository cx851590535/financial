/**
 * Created by dell on 2016/9/12.
 */
$(function () {
    var pointer = "<div class='pointer'>"+$(".pointer").html()+"</div>";
    $(".pointer").remove();
    var pathname = window.location.pathname;
    $("#dashboard-menu").find(".active").removeClass("active");
    $("#dashboard-menu").find("a[href='"+pathname+"']").addClass("active");
    if($("#dashboard-menu").find("a[href='"+pathname+"']").parent().parent().attr("class") == "submenu"){
        var obj = $("#dashboard-menu").find("a[href='"+pathname+"']").parent().parent();
        obj.addClass("active");
        obj.parent("li").addClass("active");
        obj.parent("li").append(pointer);
    }else{
        $("#dashboard-menu").find("a[href='"+pathname+"']"). append(pointer);
    }
    $(".container-fluid").css("min-height",$("#sidebar-nav").height())
});
