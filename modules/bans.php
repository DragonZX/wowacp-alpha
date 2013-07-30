<div align="center">
<?php
$r_connect = mysql_connect($r_ip, $r_userdb, $r_pw);
mysql_select_db($r_db, $r_connect);
mysql_query("SET NAMES '$encoding'");

$res = mysql_query("SELECT bandate, unbandate, banreason, account_banned.id as idd, username FROM account_banned, account WHERE (account_banned.id = account.id) and (account_banned.active = 1) ORDER BY bandate DESC") or trigger_error(mysql_error());
echo '<div style="margin-top:2px">
<table width="500" border="0" cellspacing="0" cellpadding="0"><tr><td>
<div class="smallfont" style="margin-bottom:1px" align="left"><input type="button" value="+" style="width:15px;font-size:9px;margin:0px;padding:0px;" 
		onClick="'; 
echo " if (this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display != '')
	        { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = '';
        	 this.innerText = ''; this.value = '-'; } 
	       else 
		{ this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none'; 
                               this.innerText = ''; this.value = '+'; }";
echo '" > '.$txt[85].'</div>';
echo '<div class="alt2" style="margin: 0px; padding: 1px; border: 0px inset;">
<div style="display: none;">
<table width="500" border="0" cellspacing="0" cellpadding="0">
<tr><td height="25" colspan="5" align="center" valign="middle" class="TableTitle"><b>'.$txt[80].'</b></td></tr>
<tr><td width="10" class="TableOther">&nbsp;</td>
<td width="180" align="left" valign="middle" class="TableOther">'.$txt[1].'</td>
<td width="150" align="left" valign="middle" class="TableOther">'.$txt[83].'</td>
<td width="150" align="left" valign="middle" class="TableOther">'.$txt[84].'</td>
<td width="10" class="TableOther">&nbsp;</td></tr>';
$kol = 1;
 while ($mres = mysql_fetch_array($res)){
  echo '<tr><td width="10" align="center" valign="middle" class="TableLeft">&nbsp;</td>';
  echo '<td width="180" align="left" valign="middle" class="TableCenter"><b>';
if ($_SESSION['user_id'] == $mres['idd'])   echo '<font color=red>'.$mres['username'].'</font>';
else echo $mres['username'];
  echo '</b></td><td width="150" align="left"  valign="middle" class="TableCenter">'.date("d-m-Y H:i", $mres['bandate']).'</td>
<td width="150" align="left"  valign="middle" class="TableCenter">'.date("d-m-Y H:i", $mres['unbandate']).'</td>
 <td width="10" class="TableRight">&nbsp;</td></tr>';
	 $kol++;
     }
  if ($kol==1) { echo '<tr><td height="30" colspan="5" align="center" valign="middle" ><b>'.$txt[81].'</b></td></tr>'; }
echo '</table>';

$res = mysql_query("SELECT ip, bandate, unbandate, banreason FROM ip_banned") or trigger_error(mysql_error());
echo '<br><table width="500" border="0" cellspacing="0" cellpadding="0">
<tr><td height="25" colspan="5" align="center" valign="middle" class="TableTitle"><b>'.$txt[82].'</b></td></tr>
<tr><td width="10" class="TableOther">&nbsp;</td>
<td width="180" align="left" valign="middle" class="TableOther">IP</td>
<td width="150" align="left" valign="middle" class="TableOther">'.$txt[83].'</td>
<td width="150" align="left" valign="middle" class="TableOther">'.$txt[84].'</td>
<td width="10" class="TableOther">&nbsp;</td></tr>';
$kol = 1;
 while ($mres = mysql_fetch_array($res)){
  echo '<tr><td width="10" align="center" valign="middle" class="TableLeft">&nbsp;</td>';
  echo '<td width="180" align="left" valign="middle" class="TableCenter"><b>';
if ($mres['ip'] == $_SERVER['REMOTE_ADDR']) echo '<font color=red>'.$mres['ip'].'</font>';
else echo $mres['ip'];
  echo '</b></td><td width="150" align="left"  valign="middle" class="TableCenter">'.date("d-m-Y H:i", $mres['bandate']).'</td>
<td width="150" align="left"  valign="middle" class="TableCenter">'.date("d-m-Y H:i", $mres['unbandate']).'</td>
 <td width="10" class="TableRight">&nbsp;</td></tr>';
	 $kol++;
     }
  if ($kol==1) { echo '<tr><td height="30" colspan="5" align="center" valign="middle" ><b>'.$txt[81].'</b></td></tr>'; }
echo '</table>';
echo '</div></div></td></tr></table></div>';
  ?>
