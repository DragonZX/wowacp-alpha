<div align="center">
<?php
  $r_connect = mysql_connect($r_ip, $r_userdb, $r_pw);
  mysql_select_db($r_db, $r_connect);
  mysql_query("SET NAMES '$encoding'");
  $rip = 'no';   
  $query = "SELECT `ip` FROM `ip_banned` WHERE `ip`='".$_SERVER['REMOTE_ADDR']."' LIMIT 1";
  $res = mysql_query($query) or trigger_error(mysql_error().$query);
  if ($row = mysql_fetch_assoc($res)) {
		  $rip  = $row['ip'];
  }	  
	if ($rip == $_SERVER['REMOTE_ADDR']) {
	         echo $txt['14'];
			 return;
				   }
if ($_POST['reg'] == '1') {
     $er = 0;
	 $er_txt = '';
	 if  (!eregi("^[a-zA-Z0-9\._-]+@[a-zA-Z0-9\._-]+\.[a-zA-Z]{2,4}$",$_POST['email'])) {
        $er = 1;
	    $er_txt = $txt['50'];
    	 }
     if (($_POST['pass1'] == $_POST['new_acc']) OR ($_POST['pass1'] != $_POST['pass2'])) {
        $er = 1;
	    $er_txt = $txt['51'];
    	 }
     if (($_POST['pass1'] == '') OR ($_POST['pass2'] == '') OR ($_POST['new_acc'] == '') OR ($_POST['email'] == '')) {
        $er = 1;
	    $er_txt = $txt['52'];
    	 }
	 if ($er == 0) {
        $query1 = 'select count(`username`) as kol from `account` where `username` = "'.$_POST['new_acc'].'"';
        $res1 = mysql_query($query1) or trigger_error(mysql_error().$query1);
        $row1 = mysql_fetch_assoc($res1);
		if ($row1['kol'] > 0) {
            $er = 1;
  	        $er_txt = $txt['53'];
		    }
        }	
  if ($er == 0) {
				mysql_query("INSERT INTO `account` (`username`,`sha_pass_hash`,`email`,`last_ip`,`locked`,`expansion`) VALUES (UPPER('"
				.$_POST['new_acc']."'),SHA1(CONCAT(UPPER('".$_POST['new_acc']."'),':',UPPER('".$_POST['pass1']."'))),'"
				.$_POST['email']."','".$_SERVER['REMOTE_ADDR']."','0','".$def_exp_acc."')");				
				echo '<img src="images/yes.png"> <b>'.$txt['55'].'</b><br><br><hr><div align="center"><A href="index.php">'.$txt[12].'</a></div>';
               $query2 = "SELECT * FROM `account` WHERE `username`='".$_POST['new_acc']."' AND sha_pass_hash ='".SHA1(strtoupper($_POST['new_acc']).':'.strtoupper($_POST['pass1']))."'";
               $res2 = mysql_query($query2) or trigger_error(mysql_error().$query2);
               if ($row2 = mysql_fetch_assoc($res2)) {
                  session_start();
                  $_SESSION['user_id'] = $row2['id'];
                  $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
                  $_SESSION['kito'] = $_SERVER['auth_name'];
                  $_SESSION['slovo'] = $_SERVER['auth_pass'];
                  $_SESSION['modul'] = 'main';

    $log_account   =  $_SESSION['user_id'];
    $log_character =  0;
    $log_mode      =  1;
	$log_email     =  $_POST['email'];
	$log_resultat  =  '';
	$log_note      =  $_SESSION['kito'];
	$log_old_data  =  '';
	require('include/log.php');					  
                  }
               ReturnMainForm(40);
    		   return;
	  }		
  if ($er == 1) echo '<table width="500" border="0" cellspacing="0" cellpadding="0"><tr><td height="25" align="center" valign="middle" class="ErrTitle">
     <b>'.$txt[20].'</b></td></tr><tr><td height="45" align="center" valign="middle"  class="ErrTab"><b>'.$er_txt.'</b></td></tr></table>';     
	}
	   
if ($er == 0) echo '
<table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="25" colspan="3" align="center" valign="middle" class="TableTitle"><b>'.$txt[4].'</b></td>
  </tr>
    <tr>
    <td width="50" height="40" class="TableLeft">&nbsp;</td>
    <td width="400" height="40" class="TableCenter"><div align="justify">'.$txt[54].'<br /></div></td>
    <td width="50" height="40" class="TableRight">&nbsp;</td>
    </tr>
</table>'; ?>
<br /><form method="post" action="index.php?modul=reg"><input name="reg" value="1" type=hidden>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="130" height="30" align="right" valign="middle"><?php echo $txt[1]; ?></td>
    <td width="10" height="30">&nbsp;</td>
    <td width="150" height="30" align="left" valign="middle"><span class="LoginInput">
      <input type="text" name="new_acc" <?php if ($_POST['new_acc'] != '') echo ' value="'.$_POST['new_acc'].'"';?>/>
    </span></td>
  </tr>
  <tr>
    <td width="130" height="30" align="right" valign="middle"><?php echo $txt[2]; ?></td>
    <td width="10" height="30">&nbsp;</td>
    <td width="150" height="30" align="left" valign="middle"><span class="LoginInput">
      <input type="password" name="pass1" />
    </span></td>
  </tr>
  <tr>
    <td width="130" height="30" align="right" valign="middle"><?php echo $txt[48]; ?></td>
    <td height="30">&nbsp;</td>
    <td width="150" height="30" align="left" valign="middle"><span class="LoginInput">
      <input type="password" name="pass2" />
    </span></td>
  </tr>
  <tr>
    <td width="130" height="30" align="right" valign="middle"><?php echo $txt[32]; ?></td>
    <td width="10" height="30">&nbsp;</td>
    <td width="150" height="30" align="left" valign="middle"><span class="LoginInput">
      <input type="text" name="email" <?php if ($_POST['email'] != '') echo ' value="'.$_POST['email'].'"';?>/>
    </span></td>
  </tr>
  <tr>
    <td width="130" height="40" align="left" valign="bottom">&nbsp;</td>
    <td width="10" height="40" valign="bottom">&nbsp;</td>
    <td width="150" height="40" align="left" valign="bottom"><span class="LoginButton">
      <input type="submit" value="<?php echo $txt[49]; ?>" />
    </span></td>
  </tr>
</table>
</form>
<br /><table width="100%" height="30" border="0" cellpadding="0" cellspacing="0">
  <tr>
<td width="50%" align="left" valign="middle" class="LogoutText">&nbsp;</td>
<td width="50%" align="right" valign="middle" class="LogoutText"><a href="index.php"><?php echo $txt[12]; ?></a></td>
</tr></table>
</div>