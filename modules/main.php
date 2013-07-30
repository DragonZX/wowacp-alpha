<?php 
$rip = '';
$r_connect = mysql_connect($r_ip, $r_userdb, $r_pw);
mysql_select_db($r_db, $r_connect);
mysql_query("SET NAMES '$encoding'");
$query0 = "SELECT `ip` FROM `ip_banned` WHERE `ip`='".$_SERVER['REMOTE_ADDR']."' LIMIT 1";
$res0 = mysql_query($query0) or trigger_error(mysql_error().$query0);
if ($row0 = mysql_fetch_assoc($res0)) {
  $rip  = $row0['ip'];
  }	
  $query = "SELECT * FROM `account` WHERE `id`=".$_SESSION['user_id']." LIMIT 1";
  $res = mysql_query($query) or trigger_error(mysql_error().$query);
  if ($row = mysql_fetch_assoc($res)) {
		  $ra_id           = $row['id'];
          $ra_username     = $row['username'];
  		  $ra_gmlevel      = $txt[70+$row['gmlevel']];
		  $ra_email        = $row['email'];
		  $ra_joindate     = $row['joindate'];
		  $ra_last_ip      = $row['last_ip'];
		  $ra_locked       = $row['locked'];
		  $ra_last_login   = $row['last_login'];
		  $ra_online       = $row['online'];
		  $ra_expansion    = getExpansion($row['expansion']);
		  $ra_locale       = getlocale($row['locale']);
  }
if ($_SESSION['slovo'] != $row['sha_pass_hash']) {
   session_destroy();
echo '<table width="500" border="0" cellspacing="0" cellpadding="0"><tr><td height="25" align="center" valign="middle" class="ErrTitle">
<b>'.$txt[20].'</b></td></tr><tr><td height="45" align="center" valign="middle"  class="ErrTab"><b>'.$txt[120].'</b></td></tr></table>
<br><br>';
   ReturnMainForm(40);
   return;
}
         $query2 = "SELECT `active` FROM `account_banned` WHERE `id`='".$ra_id."' LIMIT 1";
          $res2 = mysql_query($query2) or trigger_error(mysql_error().$query2);
          if ($row2 = mysql_fetch_assoc($res2)) {$r_act  = $row2['active'];} else {$r_act = '0';}	  
  
  ?>
<div align="center">
<p class="MainTitle"> <?php echo $txt[30]; ?> </p>
( <?php echo $ServerName; ?> )<br /><br />
<table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="25" colspan="3" align="center" valign="middle" class="TableTitle"><b><?php echo $txt[1]; ?></b></td>
    </tr>
  <tr>
    <td width="190" height="20" align="right"><?php echo $txt[1]; ?>: </td>
    <td width="10" height="20">&nbsp;</td>
    <td width="300" height="20" align="left"><?php echo $ra_username; ?></td>
  </tr>
  <tr>
    <td width="190" height="20" align="right"><?php echo $txt[16]; ?>: </td>
    <td width="10" height="20">&nbsp;</td>
    <td width="300" height="20" align="left"><?php echo $ra_expansion; ?></td>
  </tr>
  <tr>
    <td width="190" height="20" align="right"><?php echo $txt[31]; ?>: </td>
    <td width="10" height="20">&nbsp;</td>
    <td width="300" height="20" align="left"><?php echo $ra_gmlevel; ?></td>
  </tr>
  <tr>
    <td width="190" height="20" align="right"><?php echo $txt[32]; ?>: </td>
    <td width="10" height="20">&nbsp;</td>
    <td width="300" height="20" align="left"><?php 
	   if  (!eregi("^[a-zA-Z0-9\._-]+@[a-zA-Z0-9\._-]+\.[a-zA-Z]{2,4}$", $ra_email)) {
       echo $txt['66'];
	   if ( $ra_email <> '') {
	              mysql_query('update `account` set `email` = "" where `id` = '.$ra_id.';');
				   $ra_email= ''; 
				  }
       } else {	echo $ra_email; }?></td>
  </tr>
  <tr>
    <td height="20" align="right"><?php echo $txt[33]; ?>: </td>
    <td height="20">&nbsp;</td>
    <td height="20" align="left"><?php echo $ra_locale; ?></td>
  </tr>
  <tr>
    <td height="20" align="right"><?php echo $txt[34]; ?>: </td>
    <td height="20">&nbsp;</td>
    <td height="20" align="left"><?php 
if ($ra_online==1) { echo $txt[35]; }
    else { echo $txt[36]; }	
    ?></td>
  </tr>
  <tr>
    <td height="20" align="right">&nbsp;</td>
    <td height="20">&nbsp;</td>
    <td height="20" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td height="20" align="right"><?php echo $txt[37]; ?>: </td>
    <td height="20">&nbsp;</td>
    <td height="20" align="left"><?php echo $ra_joindate; ?></td>
  </tr>
  <tr>
    <td height="20" align="right"><?php echo $txt[38]; ?>: </td>
    <td height="20">&nbsp;</td>
    <td height="20" align="left"><?php echo $ra_last_login; ?></td>
  </tr>
  <tr>
    <td height="20" align="right"><?php echo $txt[39]; ?>: </td>
    <td height="20">&nbsp;</td>
    <td height="20" align="left"><?php echo $ra_last_ip; ?></td>
  </tr>
  <tr>
    <td height="20" align="right"><?php echo $txt[40]; ?>: </td>
    <td height="20">&nbsp;</td>
    <td height="20" align="left"><?php 
if ($ra_locked==0) echo $txt[42];
    else echo $txt[41];
?></td>
  </tr>
</table><br>
<?php 
if (($r_act != '1') AND ($rip  == '')) {
		echo ' <form method="get"><input action="index.php" name="modul" value="acc" type=hidden><input name=id value="';
		echo $ra_id;
		echo '" type=hidden><div align="center"> <input type="submit" value="'.$txt[43].'"></form><br /><br />';
	}
		echo ' <form method="get"><input action="index.php" name="modul" value="command" type=hidden><input type="submit" value="'.$txt[68].'"><br></form>';

if ($r_act == '1') echo '<div align="center" class="ErrMessage"><b>'.$txt[15].'</b></div>';
if ($rip  != '')   echo '<div align="center" class="ErrMessage"><b>'.$txt[14].'</b></div>';
?>
<?php require('modules/bans.php'); ?><br>
<form method="GET">
<input name="modul" value="char" type=hidden>
<table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="25" colspan="5" align="center" valign="middle" class="TableTitle"><b><?php echo $txt[44]; ?></b></td>
    </tr>
<?php
     echo '<tr><td width="30" align="center" valign="middle" class="TableOther">Sel</td>';
     echo '<td width="30" align="center" valign="middle" class="TableOther"></td>';
     echo '<td width="240" align="left" valign="middle" class="TableOther">Race - Class - Name</td>';
	 echo '<td  width="50" align="center" valign="middle" class="TableOther">lvl</td>';
	 echo '<td width="150" align ="right" valign="middle" class="TableOther">Money (gold,silver,copper)...</td></tr>';
  $c_connect = mysql_connect($c_ip, $c_userdb, $c_pw);
  mysql_select_db($c_db, $c_connect);
  mysql_query("SET NAMES '$encoding'");   
  $c_query = "SELECT `name`, `class`, `guid`, `race`, `online`, `gender`, `level`, `money` FROM `characters` WHERE `account` = $ra_id order by `guid`;";
  $res = mysql_query($c_query) or trigger_error(mysql_error().$c_query);
  $inp=0;
  $kol=1;   
  while ($cres = mysql_fetch_array($res)){
   $money    = $cres['money'];
     echo '<tr>';  
	 echo '<td height="40" width="30" align="center" valign="middle" class="TableLeft">';
	 if ($cres['online']=='1') {echo  "<img src='images/no.png' align='absmiddle'> ";}
	    else {echo "<input name=id type=radio value='";
     		  echo $cres['guid'];
	    	  echo "'>";	 
			  $inp++;
	     }
	 echo '</td>';
     echo '<td height="40" width="30" align="center" valign="middle" class="TableCenter">'.$kol.'</td>';
     echo '<td height="40" width="240" align="left" valign="middle" class="TableCenter">';
     echo "<img src='images/race/".$cres['race']."-".$cres['gender'].".png' align='absmiddle'> ";
     echo "<img src='images/class/".$cres['class'].".png' align='absmiddle'> - ";
     if ($charview == '') { echo '<b>'.$cres['name'].'</b></td>'; }
	 else { echo '<b><a href="'.$charview.$cres['guid'].'" target="_blank">'.$cres['name'].'</a></b></td>'; }
	 echo '<td height="40"  width="50" align="center" valign="middle" class="TableCenter">'.$cres['level'].'</td>';
	 echo '<td height="40" width="150" align ="right" valign="middle" class="TableRight">';
	 echo getGold($money);
	 echo' .</td>';
	 echo '</tr>';
	 $kol++;
     }
  if ($kol==1) { echo '<tr><td height="25" colspan="5" align="center" valign="middle" ><b>No Characters!</b></td></tr>'; }

?>
</table>
<?php if (($inp > 0) AND ($r_act != '1') AND ($rip  == '') AND ($kol > 1)) {echo $txt[86].'<br><br><input type="submit" value="'.$txt[45].'">';} ?>
</form>
<?php if ($autobroadcast > 0) {
echo '<br><br><div style="margin-top:2px"><table width="500" border="0" cellspacing="0" cellpadding="0"><tr><td>
<div class="smallfont" style="margin-bottom:1px" align="left"><input type="button" value="+" style="width:15px;font-size:9px;margin:0px;padding:0px;" 
		onClick="'; 
echo " if (this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display != '')
	        { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = '';
        	 this.innerText = ''; this.value = '-'; } 
	       else 
		{ this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none'; 
                               this.innerText = ''; this.value = '+'; }";
echo '" > '.$txt[79].'</div>
<div class="alt2" style="margin: 0px; padding: 1px; border: 0px inset;">
<div style="display: none;">
<table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr><td height="25" colspan="3" align="center" valign="middle" class="TableTitle"><b>'.$txt[46].'</b></td></tr>';
if ($autobroadcast == 2) {
  $r_connect = mysql_connect($r_ip, $r_userdb, $r_pw);
  mysql_select_db($r_db, $r_connect);
}
else {
  $m_connect = mysql_connect($m_ip, $m_userdb, $m_pw);
  mysql_select_db($m_db, $m_connect);
}
  mysql_query("SET NAMES '$encoding'");   
  $m_query = "SELECT `text` FROM `autobroadcast` order  by `id`;";
  $res4 = mysql_query($m_query) or trigger_error(mysql_error().$m_query);
  $kol=1;   
  while ($mres = mysql_fetch_array($res4)){
     echo '<tr><td height="40" width="40" align="center" valign="middle" 
	      class="TableLeft"><img src="images/yes.png" align="absmiddle"></td>';
     echo '<td height="40" width="440" align="justify" valign="middle" class="TableCenter">';
	 echo $mres['text'].'</td>';
	 echo '<td height="40" width="20"  class="TableRight">&nbsp;</td></tr>';
	 $kol++;
     }
  if ($kol==1) { echo '<tr><td height="25" colspan="3" align="center" valign="middle" ><b>'.$txt[47].'</b></td></tr>'; }
echo '</table></div></div></td></tr></table></div>';
echo '<br>';
}
if($_SESSION['gnom'] > 1) 
   { echo '<form method="get"><input action="index.php" name="modul" value="log" type=hidden><input type="submit" value="'.$txt[134].'"></form>'; }
?>
<br>
<table width="100%" height="30" border="0" cellpadding="0" cellspacing="0"><tr>
<td width="50%" align="left" valign="middle" class="LogoutText"><?php echo $_SESSION['ip'];?></td>
<td width="50%" align="right" valign="middle" class="LogoutText"><a href="logout.php"><?php echo $txt[13]; ?></a></td>
</tr></table>
</div>
