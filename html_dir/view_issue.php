<?php
require_once '../php_scripts/session.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>                                                            
        <script type="text/javascript" src="../jquery.js"></script>
        <script type="text/javascript" src="../jquery/view_issue.js"></script>
        <script type="text/javascript" src="../jquery/jquery.redirect.js"></script>
        <link rel='stylesheet' type=text/css href="../css_folder/bootstrap_1.css">
        <link rel='stylesheet' type=text/css href="../css_folder/my_view_issue.css">
        <link rel="icon" type="image/png" sizes="48x48" href="../favicon.ico">
        <script type='text/javascript' src="../bootstrap_js/bootstrap.js"></script>
        </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Red Eye</a>
          <img src="../red_eye_50_50.png" width="50" height="50" alt="">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" id='back_to_main' href="#">Назад на главную</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id='logout' href="#">Выйти</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
        <br>
        <br>
        <br>
        <br>
        <div class="container-fluid">
        <div class="row">
            
            <div class="col-12 col-md-4">
                <label class='issue_info_div subject' >Тема:</label>
                <div id="issue_subj"></div>
            </div>
            <div class="col">
                <label class='issue_info_div status'>Cтатус заявки:</label>
                <div id="issue_status"></div>
            </div>
            <div class="col">
                <label class='issue_info_div status'>Изменить Статус Заявки</label>
                <form method='post' action='../php_scripts/change_issue_status.php' id='change_issue_status'>
                    <div class="form-row align-items-center">
                      <div class="col-auto my-1">
                        <select  class="custom-select mr-sm-2" name="issue_status" id="issue_status1">
                            <option selected>Choose...</option>
                            <option value='0'>Открыта</option>
                            <option value='1'>В работе</option>
                            <option value='2'>Ожидание доп. информации</option>
                            <option value='3'>ХЗ_3</option>
                            <option value='4'>ХЗ_4</option>
                            <option value='5'>Закрыта</option>
                        </select>
                      </div>
                      <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary" name='new_issue_status'  value='Отправить'>Submit</button>
                      </div>
                    </div>
                </form>
            </div>
        </div>
</div>
        <br>
        <br>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-4">
                    <label>Текущий исполнитель:</label>
                    <div id="cur_issue_worker"></div>
                </div>
                <div class="col">
                    <label>Изменить исполнителя</label>
                    <form method='post' action='../php_scripts/set_new_issue_worker.php' id="c_issue_w">
                        <div class="form-row align-items-center">
                            <div id='l_w_p_issue_w'></div>
                            <div class="col-auto my-1">
                                <button type='submit' class="btn btn-primary" name='change_issue_worker' value='Отправить'>Submit</button>
                            </div>
                        </div>
                    </form>
            </div>
            </div>
        </div>
        <hr width="100%">
        <div class="container-fluid">
        <label class='label_style'>Описание Проблемы:</label>
        <div id="issue_descr" class="pre-scrollable rounded">
            <p id='issue_description'></p>
        </div>
        </div>
        <div class="container-fluid">
        <div id="div1"></div>
        <div id="div2"></div>
        <div id="div3" class='messages'></div>
        <hr width="100%">
        <form method='post' action='../php_scripts/view_issue_1.php' id='send_message'>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Ответить:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name='message_text' rows="3"></textarea>
                <p><b>Тип сообщения</b></p>
                <label class="radio-inline">
                    <input type="radio" name='message_type' value=0 checked>Ответ
                </label>
                <label class="radio-inline">
                    <input type="radio" name='message_type' value=1>Заметка
                </label>
                <label class="radio-inline">
                    <button type='submit' id='submit_inline' class="btn btn-primary" name='send_message' value='Отправить'>Отправить</button>
                </label>
            </div>
        </form>
        </div>
        <div class="b-popup" id="popup1">
            <div class="b-popup-content">
                <form method='post' action='../php_scripts/write_issue_solve_method.php' id='issue_solve_method'>
                <br>
                <label class='label_style'>Способ решения проблемы:</label>
                <textarea class='form-control' id='solve_textarea' name='issue_solve_method'></textarea>
                <button type='submit' name='issue_solve_method' class="btn btn-primary float-right" value='Отправить'>Отправить</button>
                <button type="button" id='popup_close_button' class="btn btn-secondary float-right">Закрыть</button>
                </form>
            </div>
        </div>
    </body>
</html>