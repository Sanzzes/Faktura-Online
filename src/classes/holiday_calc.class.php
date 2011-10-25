<?php

setlocale(LC_TIME, "de_DE");

class holiday_calc {
  function getEasterSundayTime($year) {
    $p = floor($year/100);
    $r = floor($year/400);
    $o = floor(($p*8+13)/25)-2;
    $w = (19*($year%19)+(13+$p-$r-$o)%30)%30;
    $e = ($w==29?28:$w);
    if ($w==28&&($year%19)>10) $e=27;
    $day = (2*($year%4)+4*($year%7)+6*$e+(4+$p-$r)%7)%7+22+$e;
    $month = ($day>31?4:3);
    if ($day>31) $day-=31;
    return mktime(0, 0, 0, $month, $day, $year);
  }
  function getHolidays($year) {
    $time = $this->getEasterSundayTime($year);
    $days["Neujahr"] = strftime("%d.%B", mktime(0, 0, 0, 1, 1, $year));
    $days["Heilige 3 Koenige"] = strftime("%d.%B", mktime(0, 0, 0, 1, 6, $year));
    $days["Aschermittwoch"] = strftime("%d.%B", $time-(86400*46)+3600);
    $days["Karfreitag"] = strftime("%d.%B", $time-(86400*2));
    $days["Ostersonntag"] = strftime("%d.%B", $time);
    $days["Tag der Arbeit"] = strftime("%d.%B", mktime(0, 0, 0, 5, 1, $year));
    $days["Christi Himmelfahrt"] = strftime("%d.%B", $time+(86400*39));
    $days["Pfingstsonntag"] = strftime("%d.%B", $time+(86400*49));
    $days["Pfingstmontag"] = strftime("%d.%B", $time+(86400*50));
    $days["Fronleichnam"] = strftime("%d.%B", $time+(86400*60));
    $days["Tag der Deutschen Einheit"] = strftime("%d.%B", mktime(0, 0, 0, 10, 3, $year));
    $days["Allerheiligen"] = strftime("%d.%B", mktime(0, 0, 0, 11, 1, $year));
    $days["1.Weihnachtsfeiertag"] = strftime("%d.%B", mktime(0, 0, 0, 12, 25, $year));
    $days["2.Weihnachtsfeiertag"] = strftime("%d.%B", mktime(0, 0, 0, 12, 26, $year));
    return $days;
  }
  
  public function freeDay (){
      $day = date("d");
      $month = date("n");
      $year = date("y");
      
      if(strlen($day) == 1){
          $day = "0$day";
      }
      if(strlen($month) == 1){
          $month = "0$month";
      }
      // Calculate Weekends
      $date_c = getdate(mktime(0,0,0, $month, $day, $year));
      $weekday = $date_c['wday'];
      
      //Check if Weekend
      if($weekday == 0){
          return "Wochenende";
      }
      elseif($weekday == 6){
          return "Wochenende";
      }
      else{
          return "Wochentag";
      }
   
  }       

} 
?>