<?php
$log_connect = mysql_connect($k_ip, $k_userdb, $k_pw);
if (($log_account == '') OR ($log_account == 0)) {$log_account = $_SESSION['user_id']; }
if ($log_character == '') { $log_character = 0; }
mysql_select_db($k_db, $log_connect);
mysql_query("SET NAMES '$encoding'");
mysql_query("insert `log` (`ip`, `account`, `character`, `mode`, `email`, `resultat`, `note`, `old_data`)
values ('".$_SERVER['REMOTE_ADDR']."', ".$log_account.", ".$log_character.", ".$log_mode.", '".$log_email."', '".$log_resultat."', '".$log_note."', '".$log_old_data."')");
echo '<br><br>';
/*
�������� ���� mode:
0 - ������ (������� � ���� "note")
1 - �����������
2 - �������������� ������ (������)
3 - �������������� ������ (������ �����)
4 - ����� ������ (������)
5 - ����� ������ (������)
6 - ������� �� ������ ������� ���������
7 - �������������� ���������
8 - unlock ip
9 - antierror
*/
?>