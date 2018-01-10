<?php
if(!isset($_SESSION))
{ 
    session_start(); 
}
include 'session.php';
include 'db_connect.php';
include 'get_user_id.php';
include 'translate.php';
include 'needed_variables.php';
include_once 'get_users_list.php';
include_once 'get_time.php';

function gen_table($query){
    echo $query;
    $output=pg_fetch_all(db_conn($query));
    $iter_k=0;
    $iter_v=0;
    $arr_k=[];
    $arr_tst=[];
    global $lang_RU;
    static $issue_num;
    if ($output !== false){
    foreach ($output as $arr){
        foreach ($arr as  $key => $value){
            global $iter;
            global $issue_num;
            global $link_hr;
            global $web_site_name;
            global $issue_type_RU;
            global $priority_RU;
            global $issue_status_RU;
            $user_first_second_name_arr=gen_users_arr();
            if ($key == 'issue_id'){
                $issue_num =$value;
            }
            $counter=count($arr);
            if ($iter_k != $counter){
                $arr_k[$iter_k]="<p class=".$key."_class>".$lang_RU[$key]."<p>";
                $iter_k++;
            }
            if ($iter_v != ($counter - 1)){
                if (in_array($key,$link_hr)){
                    $value="<a href='http://".$web_site_name."/tp_site/html_dir/view_issue.php?issue_id=".$issue_num."'><p class='".$key."_class'>".$value."</p></a>";
                }
                if (($key == 'responsible_worker_id')||( $key =='client_id')){
                    $value=$user_first_second_name_arr[$value];
                }
                elseif ($key == 'priority'){
                    $value=$priority_RU[$value];
                }
                elseif ($key == 'issue_type'){
                    $value=$issue_type_RU[$value];
                }
                elseif ($key == 'date_id'){
                    $value=get_create_time($value);
                }
                $arr_v[$iter_v]=$value;
                $iter_v++;
            }
            else {
                if ($key == 'issue_status'){
                    $value=$issue_status_RU[$value];
                }
               $arr_v[$iter_v]=$value;
               array_push($arr_tst, $arr_v);
               unset($arr_v);
               $iter_v=0;
            }

        }
    }
    $temp_cells=array();
    foreach ($arr_k as $th){
        $temp_cells[]="<th>{$th}</th>";
    }
    $thss[] = "<tr>" . implode('', $temp_cells) . "</tr>";
    foreach ($arr_tst as $td){
        $temp_cells=array();
        foreach ($td as $blabla){
            $temp_cells[]="<td>{$blabla}</td>";
        }
        $tdss[] = "<tr>" . implode('', $temp_cells) . "</tr>";
    }
    $data="<table class='table table-condensed table-dark table-sm' id='table'>" .implode('', $thss).''.implode('', $tdss). "</table>";
    var_dump($data);
    return $data;
    }
    else{
        return;
    }
}

if (!isset($cf_secondary_scr)){
    echo gen_table($query);
}