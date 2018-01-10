<?php
include 'config.php';
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
error_log("Sess_looged".$_SESSION['loggedin'],0);
if(!isset($_SESSION['loggedin'])) {
    header("Location: http://$web_site_name/tp_site/");
}
?>