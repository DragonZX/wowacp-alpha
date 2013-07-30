<div align="center">
<table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="25" colspan="4" align="center" valign="middle" class="TableTitle"><b><?php echo $txt[23]; ?></b></td>
    </tr>
<?php
// тут выводим табличку аккаунта.
if (($_GET['id'] > 0) and ($_SESSION['user_id']> 0)) {
  $c_connect = mysql_connect($c_ip, $c_userdb, $c_pw);
         mysql_select_db($c_db, $c_connect);
         mysql_query("SET NAMES '$encoding'");   
  $res = mysql_query("SELECT `name`, `class`, `guid`, `race`, `online`, `gender`, `level`, `money` FROM `characters` WHERE (`guid` = ".$_GET['id'].") and (`account` = ".$_SESSION['user_id'].") LIMIT 1") or trigger_error(mysql_error());
  $kol=1;   
  while ($cres = mysql_fetch_array($res)){
     echo '<tr>';  
	 echo '<td width="30" align="center" valign="middle">';
	 echo  "<img src='images/yes.png' align='absmiddle'> ";
	 echo '</td>';
     echo '<td width="220" align="left" valign="middle">';
     echo "<img src='images/race/".$cres['race']."-".$cres['gender'].".png' align='absmiddle'> ";
     echo "<img src='images/class/".$cres['class'].".png' align='absmiddle'> ";
     if ($charview == '') { echo $cres['name'].'</td>'; }
	 else { echo '<a href="'.$charview.$cres['guid'].'" target="_blank">'.$cres['name'].'</td>'; }
	 echo '<td  width="70" align="center" valign="middle">'.$cres['level'].' lvl</td>';
	 echo '<td width="150" align ="right" valign="middle">';
	 echo getGold($cres['money']);
	 $money = $cres['money'];
	 echo'</td>';
	 echo '</tr>';
	 $kol++;
     }
  if ($kol==1) { echo '<tr><td height="25" colspan="3" align="center" valign="middle" ><b>'.$txt[24].'</b></td></tr>'; }
 } else {
    $_SESSION['modul'] = 'main';
    echo '<tr><td height="25" colspan="4" align="center" valign="middle" ><b>'.$txt[24].'</b></td></tr>';
 }
?>

</table><br /><hr />
<form method="POST">
<input name="modul" value="charedit" type=hidden>
<input name="character" value="<?php echo $_GET['id']; ?>" type=hidden>
<table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50" height="30" align="center" valign="middle"><input name=id type=radio value='1' checked /></td>
    <td width="300" height="30" align="left" valign="middle"><?php echo $txt[26]; ?></td>
    <td width="150" height="30" align="right" valign="middle"><?php echo $txt[25]; ?></td>
  </tr>
  <tr>
    <td width="50" height="30" align="center" valign="middle"> 
	<?php if (($money >= $Rename_price) OR ($_SESSION['gnom'] >= $gm_free_pay)) {
         echo "<input name=id type=radio value='2' />";
		 }else{
	     echo  "<img src='images/no.png' align='absmiddle'> ";} ?>
	    </td>
    <td width="300" height="30" align="left" valign="middle"><?php echo $txt[27]; ?></td>
    <td width="150" height="30" align="right" valign="middle"><?php 
	if ($_SESSION['gnom'] >= $gm_free_pay) echo $txt[25];
	else echo getGold($Rename_price)?></td>
  </tr>
  <tr>
    <td width="50" height="30" align="center" valign="middle">
	<?php if (($money >= $Relocate_price) OR ($_SESSION['gnom'] >= $gm_free_pay)) {
         echo "<input name=id type=radio value='3'>";
		 }else{
	     echo  "<img src='images/no.png' align='absmiddle'> ";} ?>
	    </td>
    <td width="300" height="30" align="left" valign="middle"><?php echo $txt[28]; ?></td>
    <td width="150" height="30" align="right" valign="middle"><?php 
	if ($_SESSION['gnom'] >= $gm_free_pay) echo $txt[25];
	else echo getGold($Relocate_price)?></td>
  </tr>
  <tr>
    <td width="50" height="30" align="center" valign="middle">
	<?php if (($money >= $Teleport_price) OR ($_SESSION['gnom'] >= $gm_free_pay)) {
         echo "<input name=id type=radio value='4'>";
		 }else{
	     echo  "<img src='images/no.png' align='absmiddle'> ";} ?>
	    </td>
    <td width="300" height="30" align="left" valign="middle"><?php echo $txt[29]; ?></td>
    <td width="150" height="30" align="right" valign="middle"><?php 
	if ($_SESSION['gnom'] >= $gm_free_pay) echo $txt[25];
	else echo getGold($Teleport_price)?></td>
  </tr>
</table>
<?php if ($kol != 1) echo '
<br>
<div align="center"><input type="submit" value="'.$txt[11].'"></div>';?>
</form>

<?php if ($WriteBagreport == 1) {
require("include/edit.php");
echo $edit_script;
echo '<br><br><div style="margin-top:2px"><table width="500" border="0" cellspacing="0" cellpadding="0"><tr><td>
<div class="smallfont" style="margin-bottom:1px" align="left"><input type="button" value="+" style="width:15px;font-size:9px;margin:0px;padding:0px;" 
		onClick="'; 
echo " if (this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display != '')
	        { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = '';
        	 this.innerText = ''; this.value = '-'; } 
	       else 
		{ this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none'; 
                               this.innerText = ''; this.value = '+'; }";
echo '" > '.$txt[149].'</div>
<div class="alt2" style="margin: 0px; padding: 1px; border: 0px inset;">
<div style="display: none;">';

echo '<br><form method="post"><div align="center">'.$txt[171].'</div><br>';
echo '<table width="490" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="80" height="30" align="right" valign="middle">'.$txt[145].'</td>
    <td width="10" height="30" >&nbsp;</td>
    <td width="400" height="30" align="left" valign="middle"><input type="text" name="tema" size="60"></td>
  </tr>
  <tr>
    <td width="80" height="30" align="right" valign="middle">'.$txt[146].'</td>
    <td width="10" height="30" >&nbsp;</td>
    <td width="400" height="30" align="left" valign="middle">';
				echo '<select name=kategor><option value=0> </option>';
 				for ($i = 1; $i <= 10; $i++) {
   					echo '<option value='.$i;
					if ($_GET['kategor'] == $i) echo ' selected>';
					else echo '>';
					echo $txt[$i+150].'</option>';
				}
echo '</select></td></tr></table><textarea name="report" style="width:480"></textarea><br>';
echo '<input type="submit" value="'.$txt[150].'"></form>';
echo '</div></div></td></tr></table></div>';
}
else echo '<br>' ?>
<div align="center"><A href="index.php"><?php echo $txt[12]; ?></a></div>
<table width="100%" height="30" border="0" cellpadding="0" cellspacing="0"><tr>
<td width="50%" align="left" valign="middle" class="LogoutText"><?php echo $_SESSION['ip'];?></td>
<td width="50%" align="right" valign="middle" class="LogoutText"><a href="logout.php"><?php echo $txt[13]; ?></a></td>
</tr></table>
</div>