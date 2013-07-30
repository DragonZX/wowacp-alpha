<?php
require "include/config.php";
require "include/modules_list.php";
require "include/auth.php";
require "include/func.php";

if ($lang == 'en') require "include/text.".$lang.".php";
              else require "include/text.".$lang.".".$encoding.".php";
if ($SkinChange == 1) {
   if (($_GET['skin'] <> '') AND (file_exists("skins/".$_GET['skin']."/skin.php"))) {
        $skin  =  $_GET['skin']; }
   if ($_SESSION['skin'] <> '') {
        if (($_GET['skin'] <> '') AND (file_exists("skins/".$_GET['skin']."/skin.php"))){
                $_SESSION['skin'] = $_GET['skin']; }
        if (file_exists("skins/".$_SESSION['skin']."/skin.php")) {
                $skin = $_SESSION['skin']; }
       }
   }
   
$cssfile = "skins/$skin/style.css";
if (!file_exists($cssfile)) $cssfile = 'lkstyle.css';

$skindir  = "skins/$skin/";
$skinfile = "skins/$skin/skin.php";
if ($encoding == 'cp1251') $code_page = 'windows-1251';
else $code_page = 'utf-8';
if (file_exists($skinfile)) include($skinfile);
                       else include("skins/default/skin.php");
?>

