$(document).ready(function(){
    $("#sform").submit( function (e) {
        e.preventDefault();
        var $form = $(this);
        var formdata = $(this).serializeArray();
        formdata.push({name: 'search_issue', value: "True"});
            $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: formdata,
            success: function(response) {
                $('#div2').html(response);
            },
            error: function(response) {
                alert('Что то пошло не так');
            }
        });
    });
});
$(document).ready(function(){
        $("#back_to_main").click(function () {
        $.redirect("../php_scripts/navigate.php",{ back_to_main: "true"}); 
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