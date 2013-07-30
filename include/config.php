<?php
// Attention! Code Page this file == UTF-8 !!!

//realmd
$r_ip = '127.0.0.1';
$r_userdb = 'root';
$r_pw = '';
$r_db = 'realmd';

//characters
$c_ip = '127.0.0.1';
$c_userdb = 'root';
$c_pw = '';
$c_db = 'characters';

//mangos
$m_ip = '127.0.0.1';
$m_userdb = 'root';
$m_pw = '';
$m_db = 'mangos';

//lk(acp) - база самой панели.
$k_ip = '127.0.0.1';
$k_userdb = 'root';
$k_pw = '';
$k_db = 'lk'; 

//Цены
$gm_free_pay    =  2;   // здесь указываем GMLEVEL с которого начинается бесплатное выполнение операций
$Rename_price   =  '2000000'; // переименование
$Relocate_price = '10000000'; // перемещение на чужой акк.
$Teleport_price =    '50000'; // телепорт в столицы

// Язык и кодировка
$lang     = 'ru';    // ru или en
$encoding = 'cp1251'; // utf8 или cp1251 для английского языка ставим utf8

// дефолтовое значение поля EXPANSION при регистрации аккаунтов (2 - wotlk)
$def_exp_acc = '2';

// Шкурка сайта
$skin = 'standart';    
// выбираем из: standart, default, ajdin, battle, brown, purple, dark, euro, fan, tbc, gold, green,
//         illidan, lich, wotlk, wow, launcher....  или делаем свою и записываем ее каталог skins
// разрешить смену скина в ссылке
$SkinChange = 1; // 1 - меняем, 0 - нет.
//Для смены скина использовать ссылку типа: index.php?skin=MySkin

// Интеграция с wowd или cswowd
// это начало ссылки подписывает к именам персонажей. 
// пустая строка отключает ссылки
$charview ='';
//$charview = '../wowd/?player=';

//Название вашего сервера
$ServerName = 'Free WoW server';

// autobroadcast выводит список объявлений данного патча.
$autobroadcast      = '1'; 	//on|off|Realmd    0 - off , 1 - mangos , 2 - realmd

// Настройки почты. 
$mail_subject 	        = 'server WoW mail service';  // тема письма
$mail_from                      = 'server@mail.ru';                  // емайл от кого посылается письмо 
$mail_from_name           = 'WoW Server mailBOT';       // имя отправителя/сервера кто посылает пильмо
$mail_method                  = 'smtp'; 	                         // режим работы: "test", "mail", "sendmail", or "smtp"
/*
"test" - тестовый режим. письмо не посылается, а показывается на экране.
"mail" - посылка через PHP (все настройки берутся в PHP.INI
"sendmail" - посылка через sendmail
"smtp" - посылка через внешний smtp сервер. настройки сервера ниже.
*/
$mail_smtp_Host            = "smtp.mail.ru";       // SMTP сервер
$mail_smtp_Username   = "server";                // почтовый ящик на сервере отправителе
$mail_smtp_Password    = "pass"; 	          // пароль на указанный ящик

// Длина страницы лога
$LogPageSize = 40;
//Срок давности для лога.
$LogDateLimit = 60; // дней
// Сохранять новые пароли в логе (не советую!)
$LogSavePass = 0; // 0/1 (1-сохраняем.)

// Включить модуль багрепорта.
$WriteBagreport = 0;  // ВНИМАНИЕ МОДУЛЬ НАХОДИТСЯ В РАЗРАБОТКЕ!!! 0=off, 1=on

// отключение показа ошибок:
//error_reporting(E_ERROR | E_PARSE | E_WARNING);
error_reporting(E_ALL);
ini_set('display_errors', 0); //disable on production servers!

?>