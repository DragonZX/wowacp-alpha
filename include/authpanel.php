<div align="center">
<form method="POST">
  <table border="0" cellpadding="0" cellspacing="0">
  <tr><td width="100" height="35" align="left" valign="middle" class="LoginText"><?php echo $txt[1]; ?>:</td>
      <td width="180" height="35" align="right" valign="middle" class="LoginInput"><input type="text" name="auth_name"></td></tr>
  <tr><td width="100" height="35" align="left" valign="middle" class="LoginText"><?php echo $txt[2]; ?>:</td>
      <td width="180" height="35" align="right" valign="middle" class="LoginInput"><input type="password" name="auth_pass"></td></tr>
  <tr><td height="40" colspan="2" align="right" valign="middle" class="LoginButton"><input type="submit" value="<?php echo $txt[3]; ?>"></td></tr>
  <?php
  $r_connect = mysql_connect($r_ip, $r_userdb, $r_pw);
  mysql_select_db($r_db, $r_connect);
  mysql_query("SET NAMES '$encoding'");
  $rip = 'no';   
  $res = mysql_query("SELECT `ip` FROM `ip_banned` WHERE `ip`='".$_SERVER['REMOTE_ADDR']."' LIMIT 1") or trigger_error(mysql_error().$query);
  if ($row = mysql_fetch_assoc($res)) $rip  = $row['ip'];
  if ($rip != $_SERVER['REMOTE_ADDR']) {
     echo '<tr><td height="30" colspan="2" align="left" valign="middle">
           <img src="images/admin.png" align="absmiddle"/> <a href="index.php?modul=reg">'.$txt[4].'</a></td></tr>
           <tr><td height="30" colspan="2" align="left" valign="middle">
           <img src="images/letter.png" align="absmiddle"/> <a href="index.php?modul=remember">'.$txt[5].'</a></td></tr>';
     } ?>
   </table>
</form>
<br><br><?php require('modules/bans.php'); ?>
</div>