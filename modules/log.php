<div align="center">
<?php
if ($_SESSION['gnom'] > 1) {
   if ($_GET['erase'] == 'yes') {
       $k_connect = mysql_connect($k_ip, $k_userdb, $k_pw);
       mysql_select_db($k_db, $k_connect);
       mysql_query("SET NAMES '$encoding'");
       mysql_query("DELETE FROM `log` WHERE DATEDIFF(NOW(), `date`) > ".$LogDateLimit);
       }
echo '<br><br><div style="margin-top:2px"><table width="500" border="0" cellspacing="0" cellpadding="0"><tr><td>
<div class="smallfont" style="margin-bottom:1px" align="left"><input type="button" value="+" style="width:15px;font-size:9px;margin:0px;padding:0px;" 
		onClick="'; 
echo " if (this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display != '')
	        { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = '';
        	 this.innerText = ''; this.value = '-'; } 
	       else 
		{ this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none'; 
                               this.innerText = ''; this.value = '+'; }";
echo '" > '.$txt[140].'</div>
<div class="alt2" style="margin: 0px; padding: 1px; border: 0px inset;">
<div style="display: none;">';

echo '<form method="get"><table width="500" border="0" cellspacing="0" cellpadding="0"><tr><td width="350" align="left">';
echo '<input action="index.php" name="modul" value="log" type=hidden>';
echo '<input action="index.php" name="tp" value="_" type=radio checked>'.$txt[139].'<br>';
for ($i = 0; $i <= 9; $i++) {echo '<input action="index.php" name="tp" value="'.$i.'" type=radio>'.$txt[122+$i].'<br>';}
echo '</td><td width="150" align="right" valign="bottom">';
echo '<input type="submit" value="'.$txt[11].'">';
echo '</td></tr></table><br>';
echo '</form>';
echo '</div></div></td></tr></table></div>';
if (($_GET['tp'] == '') OR ($_GET['tp'] == '_')) {
     $WHR = '';
	 $WHR_TITLE = '';
	 }
else if (($_GET['tp'] >= 0) AND ($_GET['tp'] < 10)) {
     $WHR = ' where `mode` = '.$_GET['tp'];
	 $WHR_TITLE = '( '.$txt[122+$_GET['tp']].' )';
	 }
echo '<table width="500" border="0" cellspacing="0" cellpadding="0"><tr><td height="25" colspan="4" ';
echo 'align="center" valign="middle" class="TableTitle"><b>'.$txt['134'].'</b> '.$WHR_TITLE.'</td></tr>';

$kol = 1;
$k_connect = mysql_connect($k_ip, $k_userdb, $k_pw);
mysql_select_db($k_db, $k_connect);
mysql_query("SET NAMES '$encoding'");
$query = "SELECT count(date) as kol FROM `log` ".$WHR;
$res = mysql_query($query) or trigger_error(mysql_error().$query);
$kolzap = mysql_fetch_array($res);
echo '<tr><td  colspan="4" width="150" align="left" valign="middle" class="TableOther">All: '.$kolzap['kol'].'</td></tr>';
if ($kolzap['kol'] > $LogPageSize) {
    $PageLen = $LogPageSize; 
    if ($_GET['page'] == '') $StartRec = 0;
	else 	$StartRec = ($_GET['page']-1)*$LogPageSize;
	}
else {
    $PageLen = $kolzap['kol'];
	$StartRec = 0;
	}
 
$query = "SELECT * FROM `log` ".$WHR." order by `date` limit ".$StartRec.",".$PageLen;
$res = mysql_query($query) or trigger_error(mysql_error().$query);
 while ($mres = mysql_fetch_array($res)){
     echo '<tr><td width="150" align="left" valign="middle" class="TableLeft">';
	 echo $mres['date'].'<br>'.$mres['ip'].'<br>'.$mres['email'];
     echo '</td><td width="310" align="left" valign="middle" class="TableCenter"><b>';
	 echo $txt[122+$mres['mode']].'</b><br>';
	 if ($mres['reultat'] <> '')echo $txt[135].' '.$mres['reultat'].'<br>';
	 if ($mres['note'] <> '')echo $txt[136].' '.$mres['note'].'<br>';
	 if ($mres['old_data'] <> '')echo $txt[137].' '.$mres['old_data'].'<br>';
	 
	 echo '</td><td width="35" align="right" valign="middle" class="TableCenter">';
	 if ($mres['account'] > 0) echo 'a:'.$mres['account'].'<br>';
	 if ($mres['character'] > 0) echo 'c:'.$mres['character'];
	 echo '</td><td width="5" class="TableRight">&nbsp;&nbsp;</td></tr>';
	 $kol++;
     }
  if ($kol==1) { echo '<tr><td height="30" colspan="3" align="center" valign="middle" ><b>'.$txt[141].'</b></td></tr>'; }
  if ($kolzap['kol'] > $LogPageSize) {
  $PagesSelector = '-';
  $PageCounter = ceil($kolzap['kol'] / $LogPageSize);
   if ($_GET['tp'] == '') $tp2 = '_';
      else $tp2 = $_GET['tp'];

   if (($_GET['page'] == '') OR ($_GET['page'] == '_')) $tp3 = 1;
      else $tp3 = $_GET['page'];

   for ($i = 1; $i <= $PageCounter; $i++) {
        if ($tp3 == $i) $PagesSelector .= ' '.$i.' -';
		else $PagesSelector .= ' <A href="index.php?modul=log&tp='.$tp2.'&page='.$i.'">'.$i.'</a> -';
        }
  echo '<tr><td height="30" colspan="3" align="center" valign="middle" ><b>'.$PagesSelector.'</b></td></tr>';
  }
echo '</table><br>';
echo '
<div align="left"><form method="get">';
echo '<input action="index.php" name="modul" value="log" type=hidden>';
echo '<input action="index.php" name="page" value="1" type=hidden>';
echo '<input action="index.php" name="tp" value="'.$_GET['tp'].'" type=hidden>';
echo '<input action="index.php" name="erase" value="yes" type=hidden>';
echo '<input type="submit" value="'.$txt[142].'">';
echo '</form></div>';
}
else echo $txt[138];
?>
<br />
<div align="center"><A href="index.php"><?php echo $txt[12]; ?></a></div>
<table width="100%" height="30" border="0" cellpadding="0" cellspacing="0">
  <tr>
<td width="50%" align="left" valign="middle" class="LogoutText"><?php echo $_SESSION['ip'];?></td>
<td width="50%" align="right" valign="middle" class="LogoutText"><a href="logout.php"><?php echo $txt[13]; ?></a></td>
</tr></table>
</div>