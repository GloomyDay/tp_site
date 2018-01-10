/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
    $("#register_new_user").submit( function (e) {
        e.preventDefault();
        var $form = $(this);
        var formdata = $(this).serializeArray();
            formdata.push({name: 'register_new_user', value: 'True'});
                $.ajax({
                type: $form.attr('method'),
                url: $form.attr('action'),
                data: formdata,
                success: function(response) {
                    alert('Пользователь добавлен');
                    document.getElementById("register_new_user").reset();
                },
                error: function(response) {
                }
            });
    });
});