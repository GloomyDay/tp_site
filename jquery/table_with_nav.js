$(document).ready(function(){
    $("#navigation_bar").load("../php_scripts/table_navigate.php",function(){
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
    });
});

$(document).ready(function(){
    var data = $(this).serializeArray();
    data.push({name: 'client_table', value: 'true'});
    $.ajax({
        type: 'POST',
        url: '../php_scripts/table_navigate.php',
        data: data,
        success: function(response) {
            $('#my_navigation_bar').html(response);
                $("#blabla").prop('id', 'my_nav_bar');
                var last_elem_num=$("#my_nav_bar li").length;
                $("#my_nav_bar li").slice(0,5).show();
                $("#my_nav_bar li").slice(5,last_elem_num).hide();
                $("#my_next").click(function() {
                if ($("#my_nav_bar li:visible").last().next().length != 0) {
                    $("#my_nav_bar li:visible").last().nextAll().slice(0,5).show();
                    $("#my_nav_bar li:visible").slice(0,5).hide(); }
                else{
                }
                     return false;       
                });
                $("#my_prev").click(function() {
                 if ($("#my_nav_bar li:visible").prev().length != 0) {
                         $("#my_nav_bar li:visible").first().prevAll().slice(0,5).show();
                         $("#my_nav_bar li:visible").slice(5).hide();}
                     else {
                     }
                     return false;
                });
                $("#my_nav_bar li").click(function () {
                    var page=$(this).text();
                    var data = $(this).serializeArray();
                    data.push({name: 'client_table', value: 1});
                    data.push({name: 'page_all', value: page});
                    $.ajax({
                        type: 'POST',
                        url: '../php_scripts/table_navigate_handler.php',
                        data: data,
                        success: function(response) {
                            $('#my_issues_table').html(response);
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
    var onload_data = $(this).serializeArray();
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
    var onload_data_2 = $(this).serializeArray();
    onload_data_2.push({name: 'issues_by_worker', value: 1});
    onload_data_2.push({name: 'page_my', value: 0});
    $.ajax({
        type: 'POST',
        url: '../php_scripts/table_navigate_handler.php',
        data: onload_data_2,
        success: function(response) {
            $('#my_issues').html(response);
        },
        error: function(response) {
            alert('Что то пошло не так');
        }
    });
});
$(document).ready(function(){
        $("#reg_new_user").click(function () {
        $.redirect("../php_scripts/navigate.php",{ reg_new_user: "true"}); 
    });
});
$(document).ready(function(){
        $("#logout").click(function () {
        $.redirect("../php_scripts/navigate.php",{ logout: "true"}); 
    });
});
$(document).ready(function(){
        $("#search_issue_workaround").click(function () {
        $.redirect("../php_scripts/navigate.php",{ search_issue_workaround: "true"}); 
    });
});