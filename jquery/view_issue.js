
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;
    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] === sParam) {
        return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
    };
    var issue_id = getUrlParameter('issue_id');


    $(document).ready(function(){
        PopUpHide();
    });
    function PopUpShow(){
        $("#popup1").show();
    }
    function PopUpHide(){
        $("#popup1").hide();
    }
$(document).ready(function(){
    var onload_data= $(this).serializeArray();
    onload_data.push({name: 'get_p_issue_w', value: 1});
    $.ajax({
        type: 'POST',
        url: '../php_scripts/get_users_list.php',
        data: onload_data,
        success: function(response) {
            $('#l_w_p_issue_w').html(response);
        },
        error: function(response) {
            alert('Что то пошло не так');
        }
    });
});

$(document).ready(function(){
    $("#issue_status").load("../php_scripts/view_issue_1.php?" + $.param({
    issue_id: issue_id}) +" #issue_status"
    );
});
$(document).ready(function(){
    $("#issue_subj").load("../php_scripts/view_issue_1.php?" + $.param({
    issue_id: issue_id}) +" #subj"
    );
});
$(document).ready(function(){
    $("#issue_description").load("../php_scripts/view_issue_1.php?" + $.param({
    issue_id: issue_id}) +" #issue_desc"
    );
});
$(document).ready(function(){
    $("#div3").load("../php_scripts/view_issue_1.php?" + $.param({
    issue_id: issue_id}) +" #table"
    );
});


    $(document).ready(function(){
        $("#send_message").submit( function (e) {
            e.preventDefault();
            var $form = $(this);
            var formdata = $(this).serializeArray();
            formdata.push({name: 'send_message', value: "Отправить"});
                $.ajax({
                type: $form.attr('method'),
                url: $form.attr('action'),
                data: formdata,
                success: function(response) {
                    document.getElementById("send_message").reset();
                    $('#div3').empty();
                    $("#div3").load("../php_scripts/view_issue_1.php?" + $.param({
                     issue_id: issue_id}) +" #table"
                    );
                },
                error: function(response) {
                    document.getElementById("send_message").reset();
                }
            });
        });


    });
    $(document).ready(function(){
        $("#change_issue_status").submit( function (e) {
            e.preventDefault();
            var $form = $(this);
            var formdata = $(this).serializeArray();
            var ddl = document.getElementById("issue_status1");
            var selectedValue = ddl.options[ddl.selectedIndex].value;
            if (selectedValue == "5"){
                PopUpShow();
                }
                formdata.push({name: 'issue_id', value: issue_id});
                formdata.push({name: 'change_issue_status', value: 'True'});
                    $.ajax({
                    type: $form.attr('method'),
                    url: $form.attr('action'),
                    data: formdata,
                    success: function(response) {
                        $('#issue_status').empty(); 
                        $("#issue_status").load("../php_scripts/view_issue_1.php?" + $.param({
                        issue_id: issue_id}) +" #issue_status"
                        );
                    },
                    error: function(response) {
                    }
                });
        });
    });


$(document).ready(function(){
    $("#issue_solve_method").submit( function (e) {
        e.preventDefault();
        var $form = $(this);
        var formdata = $(this).serializeArray();
            formdata.push({name: 'issue_id', value: issue_id});
            formdata.push({name: 'write_issue_status', value: 'True'});
                $.ajax({
                type: $form.attr('method'),
                url: $form.attr('action'),
                data: formdata,
                success: function(response) {
                    document.getElementById("issue_solve_method").reset();
                    $("#popup1").hide();
                },
                error: function(response) {
                    document.getElementById("issue_solve_method").reset();
                    $("#popup1").hide();
                }
            });
    });
});
$(document).ready(function(){
    $("#issue_solve_method").submit( function (e) {
        e.preventDefault();
        var $form = $(this);
        var formdata = $(this).serializeArray();
            formdata.push({name: 'issue_id', value: issue_id});
            formdata.push({name: 'write_issue_status', value: 'True'});
                $.ajax({
                type: $form.attr('method'),
                url: $form.attr('action'),
                data: formdata,
                success: function(response) {
                    document.getElementById("issue_solve_method").reset();
                    $("#popup1").hide();
                },
                error: function(response) {
                    document.getElementById("issue_solve_method").reset();
                    $("#popup1").hide();
                }
            });
    });
});

$(document).ready(function(){
    $("#c_issue_w").submit( function (e) {
        e.preventDefault();
        var $form = $(this);
        var formdata = $(this).serializeArray();
        formdata.push({name: 'g_c_issue_w', value: 1});
        formdata.push({name: 'issue_id', value: issue_id});
        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: formdata,
            success: function(response) {
                $('#cur_issue_worker').html(response);
            },
            error: function(response) {
            }
        });
    });
});
$(document).ready(function(){
        var onload_data = $(this).serializeArray();
        onload_data.push({name: 'g_c_issue_w', value: 1});
        onload_data.push({name: 'issue_id', value: issue_id});
        $.ajax({
            type: 'POST',
            url: '../php_scripts/set_new_issue_worker.php',
            data: onload_data,
            success: function(response) {
                $('#cur_issue_worker').html(response);
            },
            error: function(response) {
            }
    });
});
$(document).ready(function(){
        $("#logout").click(function () {
        $.redirect("../php_scripts/navigate.php",{ logout: "true"}); 
    });
});
$(document).ready(function(){
        $("#popup_close_button").click(function () {
        $("#popup1").hide();
    });
});
$(document).ready(function(){
        $("#popup_show_button").click(function () {
        $("#popup1").show();
    });
});
$(document).ready(function(){
        $("#back_to_main").click(function () {
        $.redirect("../php_scripts/navigate.php",{ back_to_main: "true"}); 
    });
});