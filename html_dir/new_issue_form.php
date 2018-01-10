<?php
require_once '../php_scripts/session.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css_folder/new_issue_form.css">
        <script type="text/javascript" src="../jquery.js"></script>
        <link rel='stylesheet' type=text/css href="../css_folder/bootstrap_1.css">
        <script>
            $(document).ready(function(){
                $("#cform").submit( function (e) {
                    e.preventDefault();
                    var $form = $(this);
                    var formdata = $(this).serializeArray();
                    formdata.push({name: 'write_new_issue', value: "Отправить"});
                        $.ajax({
                        type: $form.attr('method'),
                        url: $form.attr('action'),
                        data: formdata,
                        success: function(response) {
                            alert('Заявка успешно создана!');
                            document.getElementById("cform").reset();
                        },
                        error: function(response) {
                            document.getElementById("cform").reset();
                            alert('Заявка не создана ,что то пошло не так');
                        }
                    });
                });
            });
        </script>
    </head>
    <body>
            <div class="new_issue_form">
            <form method="post" action="../php_scripts/new_issue.php" id="cform">
                                <div class="form-group row">
                    <label for="sbj" class="col-sm-2 col-form-label">Тема</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  name="subject" id="sbj" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rq_type" class="col-sm-2 col-form-label">Тип проблемы</label>
                    <div class="col-sm-10">
                        <select name="request_type" class="custom-select mr-sm-2" id='rq_type'>
                            <option value='0'>Общие Проблемы</option>
                            <option value='1'>Проблемы с компьютером</option>
                            <option value='2'>Проблемы с сетью</option>
                            <option value='3'>Проблемы с сайтом</option>
                            <option value='4'>Проблемы с орг.техникой</option>
                        </select>
                    </div>
                </div>
                <label>Описание проблемы:</label>
                <p><textarea class="new_issue_problem_desc" rows="10" cols="45" name="issue_desc"></textarea></p>
                <p><input type="submit" name="write_new_issue" value="Отправить"></p>
            </form>
        </div>
    </body>
</html>
