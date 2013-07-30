<?php 
    if (isset($_SESSION['user_id']) AND $_SESSION['ip'] == $_SERVER['REMOTE_ADDR']) {
         //if (isset($_REQUEST[session_name()])) session_start();
         if ($_GET['modul'] == '') $_SESSION['modul'] = 'main';
         if (($_POST['modul']  != '') or ($_GET['modul'] != ''))  {
                      if ($_POST['modul'] != '') $_SESSION['modul'] = $_POST['modul'];
                      else $_SESSION['modul'] = $_GET['modul'];
	       }
         if (($_SESSION['modul'] == "char") and ($_GET['id'] == '')) $_SESSION['modul'] = 'main'; 
         if (($_SESSION['modul'] ==  "acc") and ($_GET['id'] == '')) $_SESSION['modul'] = 'main';
         if (file_exists($modules[$_SESSION['modul']])) require $modules[$_SESSION['modul']];
    }else {  
          if (($_GET['modul'] == 'mail') or ($_GET['modul'] == 'reg') or ($_GET['modul'] == 'remember')) {
                   if (file_exists($modules[$_GET['modul']])) require $modules[$_GET['modul']]; }
          else  {if (file_exists($modules['login'])) require $modules['login'];}
    }

?>

