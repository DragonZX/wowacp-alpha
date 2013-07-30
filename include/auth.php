<?php
if (isset($_POST['auth_name'])) {
   $par= SHA1(strtoupper($_POST['auth_name']).':'.strtoupper($_POST['auth_pass']));
   $cont = mysql_connect($r_ip, $r_userdb, $r_pw);
   mysql_select_db($r_db, $cont);
   mysql_query("SET NAMES '$encoding'");   
   $res = mysql_query('SELECT * FROM `account` WHERE `username`="'.$_POST['auth_name'].'" AND sha_pass_hash ="'.$par.'"') or trigger_error(mysql_error());
   if ($row = mysql_fetch_assoc($res)) {
       session_start();
       $_SESSION['user_id'] = $row['id'];
       $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
       $_SESSION['kito'] = $_POST['auth_name'];
       $_SESSION['slovo'] = $par;
       $_SESSION['gnom'] = $row['gmlevel'];
       $_SESSION['modul'] = 'main';
	   $_SESSION['skin'] = $skin;
       }
   header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
   exit;
   }
if (isset($_GET['action']) AND $_GET['action']=="logout") {
   session_start();
   session_destroy();
   header("Location: http://".$_SERVER['HTTP_HOST']."/");
   exit;
   }
if (isset($_REQUEST[session_name()])) session_start();
if (isset($_SESSION['user_id']) AND $_SESSION['ip'] == $_SERVER['REMOTE_ADDR']) return;
if (($_GET['modul'] != 'login') AND ($_GET['modul'] != 'reg') AND ($_GET['modul'] != 'remember') AND isset($_SESSION['user_id'])) exit;
?>