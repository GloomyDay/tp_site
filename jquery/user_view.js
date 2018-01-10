$(document).ready(function(){
    var onload_data = $(this).serializeArray();
    onload_data.push({name: 'client_table', value: 1});
    onload_data.push({name: 'page_all', value: 0});
    $.ajax({
        type: 'POST',
        url: '../php_scripts/table_navigate_handler.php',
        data: onload_data,
        success: function(response) {
            $('#issues_table').html(response);
        },
        error: function(response) {
            alert('Что то пошло не так');
        }
    });
});
$(document).ready(function(){
    var data = $(this).serializeArray();
    data.push({name: 'client_table', value: 'true'});
    $.ajax({
        type: 'POST',
        url: '../php_scripts/table_navigate.php',
        data: data,
        success: function(response){ 
            $('#navigation_bar').html(response);
                $("#blabla").prop('id', 'common_nav_bar');
                var last_elem_num=$("#common_nav_bar li").length;
                $("#common_nav_bar li").slice(0,5).show();
                $("#common_nav_bar li").slice(5,last_elem_num).hide();
                $("#next").click(function() {
                if ($("#common_nav_bar li:visible").last().next().length != 0) {
                    $("#common_nav_bar li:visible").last().nextAll().slice(0,5).show();
                    $("#common_nav_bar li:visible").slice(0,5).hide(); }
                else{
                }
                     return false;       
                });
                $("#prev").click(function() {
                 if ($("#common_nav_bar li:visible").prev().length != 0) {
                         $("#common_nav_bar li:visible").first().prevAll().slice(0,5).show();
                         $("#common_nav_bar li:visible").slice(5).hide();}
                     else {
                     }
                     return false;
                });
                $("#common_nav_bar li").click(function () {
                    var page=$(this).text();
                    var data = $(this).serializeArray();
                    data.push({name: 'client_table', value: 1});
                    data.push({name: 'page_all', value: page});
                    $.ajax({
                        type: 'POST',
                        url: '../php_scripts/table_navigate_handler.php',
                        data: data,
                        success: function(response) {
                            $('#issues_table').html(response);
                        },
                        error: function(response) {
                            alert('Что то пошло не так');
                        }
                    });
                });
        },
        error: function(response) {
            alert('Что то пошло не так');
        }
    });
});
$(document).ready(function(){
        $("#but1").click(function() {
        if ($('#but1').hasClass("clicked-once")) {
            $('#but1').removeClass("clicked-once");
            $('#new_issue_with_button').removeClass("margin_from_top");
            $('#user_view').addClass("margin_from_top");
            $('#user_view').slideToggle("slow");
            var data = $(this).serializeArray();
            data.push({name: 'client_table', value: 'true'});
            $.ajax({
                type: 'POST',
                url: '../php_scripts/table_navigate.php',
                data: data,
                success: function(response){ 
                    $('#navigation_bar').html(response);
                        $("#blabla").prop('id', 'common_nav_bar');
                        var last_elem_num=$("#common_nav_bar li").length;
                        $("#common_nav_bar li").slice(0,5).show();
                        $("#common_nav_bar li").slice(5,last_elem_num).hide();
                        $("#next").click(function() {
                        if ($("#common_nav_bar li:visible").last().next().length != 0) {
                            $("#common_nav_bar li:visible").last().nextAll().slice(0,5).show();
                            $("#common_nav_bar li:visible").slice(0,5).hide(); }
                        else{
                        }
                             return false;       
                        });
                        $("#prev").click(function() {
                         if ($("#common_nav_bar li:visible").prev().length != 0) {
                                 $("#common_nav_bar li:visible").first().prevAll().slice(0,5).show();
                                 $("#common_nav_bar li:visible").slice(5).hide();}
                             else {
                             }
                             return false;
                        });
                        $("#common_nav_bar li").click(function () {
                            var page=$(this).text();
                            var data = $(this).serializeArray();
                            data.push({name: 'client_table', value: 1});
                            data.push({name: 'page_all', value: page});
                            $.ajax({
                                type: 'POST',
                                url: '../php_scripts/table_navigate_handler.php',
                                data: data,
                                success: function(response) {
                                    $('#issues_table').html(response);
                                },
                                error: function(response) {
                                    alert('Что то пошло не так');
                                }
                            });
                        });
                },
                error: function(response) {
                    alert('Что то пошло не так');
                }
            });
            $('#new_issue').empty(); 
            $('#but1').text('Создать новую заявку')
        }
        else {
            $('#but1').addClass("clicked-once");
            $('#new_issue_with_button').addClass("margin_from_top");
            $('#user_view').slideToggle("slow");
            $('#user_view').removeClass("margin_from_top");
            $("#new_issue").load("new_issue_form.php");
            $('#new_issue').empty();
            $('#but1').text('Назад к просмотру')
        }
    });
});
$(document).ready(function(){
        $("#logout").click(function () {
        $.redirect("../php_scripts/navigate.php",{ logout: "true"}); 
    });
});