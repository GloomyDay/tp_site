<?php
if(!isset($_SESSION))
{ 
    session_start(); 
}
include 'session.php';

include 'db_connect.php';
include 'get_user_id.php';
if ($_SESSION['role']=="client"){
    $user_id=get_user_id();
    $query = "SELECT * FROM issues where client_id='".$user_id."';";
}
 elseif ($_SESSION['role']=="support") {
    $query = "SELECT * FROM issues;";
    
}
elseif (isset($view_issue)){
    $query="SELECT user_id,message_text from messages where issue_id=".$issue_id.";";
};


$output=pg_fetch_all(db_conn($query));
function html_table($data = array())
{
    $rows = array();
    global $count;
    $count=0;
    if (!empty($data)) {
            foreach ($data as $row) {
        $cells = array();
        foreach ($row as $cell) {
            $count++;
            if ($count == 1){
             $abc=array_keys($row);
             $temp_cells=array();
             foreach ($abc as $keys){
                 $temp_cells[] = "<td>{$keys}</td>";
             }
             $rows[] = "<tr>" . implode('', $temp_cells) . "</tr>";
            }
            //var_dump($row);
            $cells[] = "<td>{$cell}</td>";
        }
        $rows[] = "<tr>" . implode('', $cells) . "</tr>";
    }
    }
    return "<html><head>"
    . "<link rel='stylesheet' type='text/css' href='../css_folder/main_table.css'>"
    . "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>"
    . "<head><table class='hci-table'>" . implode('', $rows) . "</table><body></body></html>";
}
function create_array_for_table($output){
    $count=0;
    $data2=array();
    $tempdata=array();
    include 'config.php';
    foreach ($output as $rows){
        foreach ($rows as $row){
            global $count;
            $count++;
            global $str;
            if ($count == 1){
                $tempdata['ID заявки'] ="<a href='http://".$web_site_name."/tp_site/php_scripts/view_issue.php?issue_id=".$row."'>".$row."</a>";
            }    
            if ($count == 2){
                $tempdata['Время Создания заявки'] = $row;
            }
            if ($count == 3){
                $tempdata['Тема'] = $row;
            }
            if ($count == 4){
                $tempdata['Описание проблемы'] = $row;
            }
            if ($count == 5){
                $tempdata['Приоритет'] = $row;
            }
            if ($count == 6){
                $tempdata['Тип запроса'] = $row;
            }
                if ($count == 7){
                $tempdata['Ответсвенный сотрудник'] = $row;
            }
                if ($count == 8){
                $tempdata['Создатель заявки'] = $row;
            }
            if ($count == 9){
                $tempdata['Статус заявки'] = $row;
                array_push($data2, $tempdata);
                global $tempdata;
                $tempdata=array();
            }
            if ($count == 10){
                $count=1;
                //$tempdata['id'] = $row;
                $tempdata['id'] ="<a href='http://172.16.0.254/tp_site/php_scripts/view_issue.php?issue_id=".$row."'>".$row."</a>";
                //print($row."</br>");
            }       
        }
    }
    return $data2;
}
if (isset($_SESSION['role'])){
    $table_array= create_array_for_table($output);
    echo html_table($table_array);
   
};
?>
