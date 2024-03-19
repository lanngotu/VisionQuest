<?php
    $n=(int)trim(fgets(STDIN));
    $schedules=fgets(STDIN);
    function find_solution($n,$schedules){
        $firstOffDay=-1;
        $lastOffDay=-1;
        $numberOfWeek=ceil($n/7);
        $numberDayNotFullWeek=$n%7;
        if ($numberOfWeek*7+$numberDayNotFullWeek>$n){
            $numberOfWeek=$numberOfWeek-1;
        }
        $scheduleAray=explode(" ",$schedules);
        $calendar=array();        
        $scheduleOfWeek=array(-1,-1,-1,-1,-1,-1,-1);
        $currentIndexOfSchedule=0;
        $isValid=true;
        if ($numberDayNotFullWeek>0){
            for ($i=0;$i<$numberDayNotFullWeek;$i++){
                if ($scheduleAray[$i]==0){
                    $firstOffDay=$i+1;
                }
                $scheduleOfWeek[7-$numberDayNotFullWeek+$i]=$scheduleAray[$i];
            }
            array_push($calendar,$scheduleOfWeek);
        }
        else{
            $firstOffDay=0;
        }
        $currentIndexOfSchedule=$numberDayNotFullWeek;
        for ($j=0;$j<$numberOfWeek;$j++){
            $scheduleOfWeek=array(-1,-1,-1,-1,-1,-1,-1);
            $countOffDayOfWeek=0;
            for ($k=0;$k<7;$k++){                
                $scheduleOfWeek[$k]=$scheduleAray[$currentIndexOfSchedule];
                if ($scheduleAray[$currentIndexOfSchedule]==0){
                    $countOffDayOfWeek=$countOffDayOfWeek+1;
                    $lastOffDay=$currentIndexOfSchedule;
                }
                $currentIndexOfSchedule=$currentIndexOfSchedule+1;
            }
            if ($countOffDayOfWeek>1){
                $isValid=$isValid && true;
            }
            else{
                $isValid=$isValid &&false;
            }
            array_push($calendar,$scheduleOfWeek);
        }
        if ($isValid){
            if ($numberDayNotFullWeek==0){
                return $lastOffDay+1;
            }
            else{
                return $lastOffDay-$firstOffDay+$numberDayNotFullWeek;
            }            
        }
        else{
            return 0;
        }        
    }
    // echo find_solution(14,"1 1 1 1 1 0 0 1 1 1 1 1 0 0")."\n";
    // echo find_solution(9,"1 0 1 1 1 1 1 1 0")."\n";
    // echo find_solution(11,"1 1 1 0 1 1 1 0 1 1 0")."\n";
    echo find_solution($n,$schedules);
?>