<?php

class system {

    public function holiday($start_h, $end_h) {
        $split = explode(" ", $start_h);
        $start_h_eng = sprintf("%04d-%02d-%02d", substr($split[0], 6, 4), substr($split[0], 3, 2), substr($split[0], 0, 2));
        $split = explode(" ", $end_h);
        $end_h_eng = sprintf("%04d-%02d-%02d", substr($split[0], 6, 4), substr($split[0], 3, 2), substr($split[0], 0, 2));
        $days = (strtotime($end_h_eng) - strtotime($start_h_eng)) / 86400;

        while ($days != 0) {
            $start = strtotime($start_h_eng);
            if (date("l", $start) != "Sunday" || date("l", $start != "Saturday"))
                --$days;
        }
    }

    public function timeacc($array) {
        global $time;
        foreach($array AS $key => $value) {
            $checkday = date("N", $value['datum']);
            $workperday = ($value['weekhour'] / $value['weekwork'] * 60) * 60;
            if ($checkday == 6 || $checkday == 7) {

                $timeacc += $value['worktime'] + ($value['journeytime'] * 0.5);

                
            } else {
                if ($value['worktime'] < $workperday) {
                    $howmuch = $workperday - $value['worktime'];
                    if ($howmuch <= $value['journeytime']) {
                        $journeytime_new = $value['journeytime'] - $howmuch;
                        $workday = $value['worktime'] + $howmuch;
                        $journey = $journeytime_new * 0.5;
                        $workday_new = $journey + $workday;
                        $timeacc += $workday_new - $workperday;


                    } else {
                        $workday_new = $value['worktime'] + ($value['journeytime'] * 0.5);
                        $timeacc += $workday_new - $workperday;
                        
                    }
                } else {

                    $workday_new = $value['worktime'] + ($value['journeytime'] * 0.5);
                    $timeacc += $workday_new - $workperday;
                }
            }
        }

        return $time->timersSTD($timeacc);
    }

}

?>
