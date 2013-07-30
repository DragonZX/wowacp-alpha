<?php
$date = date('d-m-Y [H:i:s]');

function getLocale($locale)
{switch ($locale):
      case 0:
      $locale = "English";
      break;
    case 1:
      $locale = "Korean";
      break;
    case 2:
      $locale = "French";
      break;
    case 3:
      $locale = "German";
      break;
    case 4:
      $locale = "Chinese";
      break;
    case 5:
      $locale = "Taiwanese";
      break;
    case 6:
      $locale = "Spanish";
      break;
    case 7:
      $locale = "Spanish Mexico";
      break;
    case 8:
      $locale = "Russian";
      break;
  endswitch;
return $locale;
}


function getRace($rasa)
{switch ($rasa):
    case 1:
      $rasa = "Human";
      break;
    case 2:
      $rasa = "Ork";
      break;
    case 3:
      $rasa = "Dwarf";
      break;
    case 4:
      $rasa = "Night elf";
      break;
    case 5:
      $rasa = "Undead";
      break;
    case 6:
      $rasa = "Tauren";
      break;
    case 7:
      $rasa = "Gnome";
      break;
    case 8:
      $rasa = "Troll";
      break;
    case 9:
      $rasa = "Goblin";
      break;
    case 10:
      $rasa = "Blood elf";
      break;
    case 11:
      $rasa = "Draenei";
      break;
  endswitch;
print $rasa;
}

function getClass($class)
{switch ($class):
    case 1:
      $class = "Warrior";
      break;
    case 2:
      $class = "Paladin";
      break;
    case 3:
      $class = "Hunter";
      break;
    case 4:
      $class = "Rogue";
      break;
    case 5:
      $class = "Priest";
      break;
    case 6:
      $class = "Death Knight";
      break;
    case 7:
      $class = "Shaman";
      break;
    case 8:
      $class = "Mage";
      break;
    case 9:
      $class = "Warlock";
      break;
    case 11:
      $class = "Druid";
      break;
endswitch;
print $class;
}

function getExpansion($typ)
{switch ($typ):
    case 0:
    $typ = "World of Warcraft";
    break;
    case 1:
    $typ = "World of Warcraft the Burning Crusade";
    break;
    case 2:
    $typ = "World of Warcraft Wrath of the Lich King";
    break;
  endswitch;
return $typ;
}

function ReturnMainForm($Retime)
{echo '
<script type="text/javascript"> <!--
function exec_refresh(){
  window.status = "reloading..." + myvar;
  myvar = myvar + " .";
  var timerID = setTimeout("exec_refresh();", 100);
  if (timeout > 0){
  timeout -= 1;
  }else{
    clearTimeout(timerID);
    window.status = "";
    window.location = "index.php";
    }
}
var myvar = "";
var timeout = '.$Retime.';
exec_refresh();
//--> </script>';
}

function getGold($gold)
{  
	$g = floor( $gold / (100*100) );
	$gold = $gold - $g*100*100;
	$s = floor( $gold / 100 );
	$gold = $gold - $s*100;
	$c = floor( $gold );
	return sprintf("<b>%d<img src=\"images/gold.png\">&nbsp;%02d<img src=\"images/silver.png\">&nbsp;%02d<img src=\"images/copper.png\"></b>", $g, $s, $c);
}

function generate($number){
    $arr = array('a','b','c','d','e','f',
                 'g','h','i','j','k','l',
                 'm','n','o','p','r','s',
                 't','u','v','x','y','z',
                 'A','B','C','D','E','F',
                 'G','H','I','J','K','L',
                 'M','N','O','P','R','S',
                 'T','U','V','X','Y','Z',
                 '1','2','3','4','5','6',
                 '7','8','9','0',);
   $symbol = "";
   for($i = 0; $i < $number; $i++) {
     $index = rand(0, count($arr) - 1);
     $symbol .= $arr[$index];
     }
   return $symbol;
}
?>
