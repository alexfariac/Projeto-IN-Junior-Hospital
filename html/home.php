<?php session_start();
if(!isset($_SESSION['user'])){
    require "deslogado.php";

} else{
    require "logado.php";
}