<?php
	class timestamp
	{
		//Wandelt MySql Datum -> Deutsches Datum
		function timestamp_mysql2german($date) 
		{
    
   		 $stamp['date']    =    sprintf("%02d.%02d.%04d",
      	                        substr($date, 6, 2),
          	                    substr($date, 4, 2),
          	                    substr($date, 0, 4)); 
          	                    
    	return $stamp;
		
		}
		
		//Wandelt Deutsches Datum -> MySql Datum
		function timestamp_german2mysql($date) {
    
   		 	  $split = explode(" ",$date);
  			  $timestamp =    sprintf("%04d%02d%02d",
              	              substr($split[0], 6, 4),
              	              substr($split[0], 3, 2),
                  	          substr($split[0], 0, 2));
   	 	return $timestamp;
		}
		
		//Wandelt MySql Zeit -> Deutsche Zeit
		function timestamp_time2ger($time) 
		{
    	
			if($time == 0)
			{
				$stamp['time'] = " / ";
			}
			else 
			{
   		 		$stamp['time']    =    date("H:i",$time);
			}
	            
    	return $stamp;
		}
		
		
		//Wandelt Deutsche Zeit -> MySql Zeit
		function timestamp_time2mysql($time) 
		{
    
   		$split = explode(" ",$time);
  		$timemysql =  sprintf("%02d%02d",
              	              substr($split[0], 0, 2),
                  	          substr($split[0], 3, 2));
	           
    	return $timemysql;
		}

		
			function secondsR($time)
		{
			if($time != '')
			{
			$startTimeCut = explode(":", $time);
			$timemysql = mktime($startTimeCut[0], $startTimeCut[1], 0);
			}
			else 
			{
			$timemysql	= "1303768800";
			}
			
			

			
		return $timemysql;
		}
		
		/*
		function roundTimeGer($time)
		{
			$quarter = bcmul(15, 60);
			$pauseInQuarter	= bcdiv($time, $quarter);			
			$roundedPause = $pauseInQuarter * 15 / 60;
			$roundedPause += round(bcdiv(bcmod($time, $quarter), $quarter));
			
			return $roundedPause;
		}
		*/
		
		function timersSTD($time)
		{
			$times_1 = date("i",$time);
			$times_2 = floor($time /60 /60);
			
			$times_output = $times_2 . " Std <br>" .  $times_1 . " Min ";
			
			return $times_output;
		}
		
			
		function ustunden($time)
		{
                        $times_1 = date("i",$time);
			$times_2 = intval($time /60 /60);
                        if($time < 0 && $times_2 == 0){
                            $times_1 = "-".$times_1;
                        }
                        
			
			$ustunden_output = $times_2  . " Std " .  $times_1 . " Min ";
			
			return $ustunden_output;
		}
		
		function roundTime($time)
		{
			$round1		=	round($time, 2);
			$split 		= 	explode(" ",$round1);
  			$timeround	=  sprintf("%02d Std %02d Min.",
              	              substr($split[0], 0, 2),
                  	          substr($split[0], 2, 2));
           return $timeround;
			
		}
                
             
           function showmonth()
           {
               for($i = 1; $i < 13; $i++)
               {
                   if($i < 10)
                   $month[$i] = "0".$i;
                   else
                   $month[$i] = $i;
               }
               return $month;
           }
		
		
	}
	