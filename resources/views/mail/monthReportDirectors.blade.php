<table style="width:100%;border:1px solid #231f20;border-collapse:collapse;padding:3px">
    <thead style="color:#efd88f">
    <tr>
        <td colspan="15" style="border:1px solid #231f20;text-align:center;padding:3px;background:#231f20;color:#efd88f">
            <font size="6" face="Calibri">RAPORT ODDZIAŁY {{$date_start . ' - ' . $date_stop}} </font></td>
        <td colspan="2" style="border:1px solid #231f20;text-align:left;padding:6px;background:#231f20">
            <img src="http://teambox.pl/image/logovc.png" class="CToWUd"></td>
    </tr>
    <tr>
        <td style="border:1px solid #231f20;padding:3px;background:#231f20;">Data</td>
        <td style="border:1px solid #231f20;padding:3px;background:#231f20;">RBH PLAN</td>
        <td style="border:1px solid #231f20;padding:3px;background:#231f20;">RBH REAL</td>
        <td style="border:1px solid #231f20;padding:3px;background:#231f20;">ZGODY</td>
        <td style="border:1px solid #231f20;padding:3px;background:#231f20;">CZAS ROZMÓW</td>
        <td style="border:1px solid #231f20;padding:3px;background:#231f20;">LICZBA ODSŁUCHANYCH</td>
        <td style="border:1px solid #231f20;padding:3px;background:#231f20;">LICZBA JANKÓW</td>
        <td style="border:1px solid #231f20;padding:3px;background:#231f20;">LICZBA STANOWISK</td>
        <td style="border:1px solid #231f20;padding:3px;background:#231f20;">CEL ZGODY</td>
        <td style="border:1px solid #231f20;padding:3px;background:#231f20;">CEL RBH</td>
        <td style="border:1px solid #231f20;padding:3px;background:#231f20;">ŚREDNIA</td>
        <td style="border:1px solid #231f20;padding:3px;background:#231f20;">% JANKÓW</td>
        <td style="border:1px solid #231f20;padding:3px;background:#231f20;">% ROZMÓW</td>
        <td style="border:1px solid #231f20;padding:3px;background:#231f20;">GRAFIK REAL</td>
        <td style="border:1px solid #231f20;padding:3px;background:#231f20;">STRATA GODZ</td>
        <td style="border:1px solid #231f20;padding:3px;background:#231f20;">% CELU</td>
        <td style="border:1px solid #231f20;padding:3px;background:#231f20;">POZOSTAŁO CELU</td>
    </tr>
    </thead>
    <tbody>

    @php
        $total_week_success = 0;
        $week_schedule_goal = 0;
        $real_week_RBH = 0;
        $real_week_phone_time = 0;
        $total_week_checked = 0;
        $total_week_bad = 0;
        $total_week_goal = 0;
        $total_week_goal_RBH = 0;
        $total_week_avg = 0;
        $total_week_proc_janky = 0;
        $total_week_proc_call = 0;
        $total_week_real_schedule = 0;
        $total_week_schedule_lost = 0;
        $total_week_goal_proc = 0;
        $total_week_rest_goal = 0;

        $total_week_sum_call_time = 0;
        $total_week_sum_call_proc = 0;

        $total_success = 0;
        $total_schedule_goal = 0;
        $total_real_RBH = 0;
        $total_phone_time = 0;
        $total_checked = 0;
        $total_bad = 0;
        $total_goal = 0;
        $total_goal_RBH = 0;
        $total_avg = 0;
        $total_proc_janky = 0;
        $total_proc_call = 0;
        $total_real_schedule = 0;
        $total_schedule_lost = 0;
        $total_goal_proc = 0;
        $total_rest_goal = 0;
        $size_total = 0;
        $total_sum_call_time = 0;
        $total_sum_call_proc = 0;

        $count_weeks = 0;
        $start_day = true;
        $sum_week = false;
    @endphp

    @for($i = 1; $i <= $total_days; $i++)
        @php
            $day = ($i < 10) ? '0' . $i : $i;
            $date = $year . '-' . $month . '-' . $day;
            $report = $hour_reports->where('report_date', '=', $date)->where('success', '>', 0)->first();

            $add_default_zero = ($report != null) ? false : true ;

            $size = 0;

        if ($add_default_zero == false) {
            //Sprawdzenie czy dzien jest normalny czy weekendowy
            $day_number = date('N', strtotime($report->report_date));
            //Pobranie celu dla danego dnia
            //Pobranie celu RBH
            $goal = 0;
            $working_hours = 0;
            $size = 0;
            foreach ($dep_info as $dep) {
                $goal += ($day_number < 6) ? $dep->dep_aim : $dep->dep_aim_week;
                $department_hours = ($day_number < 6) ? $dep->working_hours_normal : $dep->working_hours_week;
                $day_goal = ($day_number < 6) ? $dep->dep_aim : $dep->dep_aim_week;
                $working_hours += ($dep->commission_avg) ? $day_goal / $dep->commission_avg : 0 ;
                $size += $dep->size;
            }
            $size_total = $size;
            $working_hours_goal = round($working_hours);
            //Obliczenie % celu
            $proc_goal = round(($report->success / $goal) * 100, 2);
            //Obliczenie reszty celu
            $rest_goal = -1 * ($goal - $report->success);
            //Obliczenie real RBH
            $real_RBH = round(($report->time_sum_real_RBH / 3600) ,2);

            //Oblicznenie czasu rozmów
            $hour_time_use = $report->hour_time_use;

            //tutaj dodac %
            $call_time = ($real_RBH > 0) ? round(($hour_time_use / $real_RBH) * 100, 2) : 0 ;

            //obliczenie procentu
            $janky_count = ($report->success) ? round(($report->count_bad_check / $report->success) * 100, 2) : 0 ;

            //Pobranie godzin z grafiku
            //pobranie numeru tygodnia

            $week_num = date('W', strtotime($date));
            $week_schedule_data = $schedule_data->where('week_num', '=', $week_num)->first();

            if ($week_schedule_data != null) {
                switch ($day_number) {
                    case (1) :
                        $schedule_goal = ($week_schedule_data->day1 != null) ? $week_schedule_data->day1 : 0 ;
                    break;
                    case (2) :
                        $schedule_goal = ($week_schedule_data->day2 != null) ? $week_schedule_data->day2 : 0 ;
                    break;
                    case (3) :
                        $schedule_goal = ($week_schedule_data->day3 != null) ? $week_schedule_data->day3 : 0 ;
                    break;
                    case (4) :
                        $schedule_goal = ($week_schedule_data->day4 != null) ? $week_schedule_data->day4 : 0 ;
                    break;
                    case (5) :
                        $schedule_goal = ($week_schedule_data->day5 != null) ? $week_schedule_data->day5 : 0 ;
                    break;
                    case (6) :
                        $schedule_goal = ($week_schedule_data->day6 != null) ? $week_schedule_data->day6 : 0 ;
                    break;
                    case (7) :
                        $schedule_goal = ($week_schedule_data->day7 != null) ? $week_schedule_data->day7 : 0 ;
                    break;
                    default:
                    break;
                }
            } else {
                $schedule_goal = 0;
            }

            $real_schedule = ($working_hours_goal > 0 && $working_hours_goal != null) ? round(($real_RBH / $working_hours_goal) * 100, 2) : 0 ;
            $lost_schedule = -1 * (round($schedule_goal) - $real_RBH);

            $total_week_success += $report->success;
            $week_schedule_goal += $schedule_goal;
            $real_week_RBH += $real_RBH;
            $real_week_phone_time += $hour_time_use;
            $total_week_checked += $report->count_all_check;
            $total_week_bad += $report->count_bad_check;
            $total_week_goal += $goal;
            $total_week_goal_RBH += $working_hours_goal;
            $total_week_schedule_lost += $lost_schedule;
            $total_week_rest_goal += $rest_goal;

            $total_success += $report->success;
            $total_schedule_goal += $schedule_goal;
            $total_real_RBH += $real_RBH;
            $total_phone_time += $hour_time_use;
            $total_checked += $report->count_all_check;
            $total_bad += $report->count_bad_check;
            $total_goal += $goal;
            $total_goal_RBH += $working_hours_goal;
            $total_schedule_lost += $lost_schedule;
            $total_rest_goal += $rest_goal;

            $report_sum_call_time = ($report->call_time > 0 && $report->call_time != null) ? (($report->hour_time_use * 100) / $report->call_time) : 0 ;

            $total_week_sum_call_time += $call_time;
            $total_sum_call_time += $call_time;
        }

        /**
        *   Sumowanie wyników tygodniowo
        */
        $current_day = date('N', strtotime($date));
        $add_week_total = false;
        if ($start_day == false && $current_day == 1) {
            $sum_week = true;
        }
        if ($start_day == true && $current_day == 1) {
            $start_day = false;
            $sum_week = true;
        } else if ($start_day == true && $current_day != 1) {
            $start_day = false;
            $sum_week == false;
        }
        if ($current_day == 7 && $sum_week == true) {
            $add_week_total = true;
        }
        if ($count_weeks > 2) {
            $add_week_total = false;
        }
        @endphp
        @if($add_default_zero == false)
            <tr>
                <td style="border:1px solid #231f20;text-align:center;padding:3px">{{$year . '-' . $month . '-'}}{{($i < 10) ? '0' . $i : $i}}</td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px">{{round($schedule_goal)}}</td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px">{{$real_RBH}}</td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px">{{$report->success}}</td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px">{{$hour_time_use}}</td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px">{{$report->count_all_check}}</td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px">{{$report->count_bad_check}}</td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px">{{$size}}</td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px">{{$goal}}</td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px">{{round($working_hours_goal)}}</td>
                {{--<td style="border:1px solid #231f20;text-align:center;padding:3px">{{$report->average}}</td>--}}
                <td style="border:1px solid #231f20;text-align:center;padding:3px">{{ ($report->success <=0 || $real_RBH <=0)  ? 0: round($report->success/$real_RBH,2) }}</td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px">{{    $report->count_all_check == 0 ? '0' : round(($report->count_bad_check*100)/$report->count_all_check,2)}} %</td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px">{{$call_time}} %</td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px">{{$real_schedule}} %</td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px">{{($lost_schedule < 0) ? $lost_schedule : 0 }}</td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px">{{$proc_goal}} %</td>
                <td style="border:1px solid #231f20; background-color: @if($rest_goal >= 0) #5eff80 @else #ff5e5e @endif;text-align:center;padding:3px">{{$rest_goal}}</td>
            </tr>
        @else
            <tr>
                <td style="border:1px solid #231f20;text-align:center;padding:3px">{{$year . '-' . $month . '-'}}{{($i < 10) ? '0' . $i : $i}}</td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px"></td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px"></td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px"></td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px"></td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px"></td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px"></td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px"></td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px"></td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px"></td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px"></td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px"></td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px"></td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px"></td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px"></td>
                <td style="border:1px solid #231f20;text-align:center;padding:3px"></td>
                <td style="background-color: #5eff80;border:1px solid #231f20;text-align:center;padding:3px">0</td>
            </tr>
        @endif
        @if($add_week_total == true || $i == $total_days)
            @php
                $count_weeks++;
                $total_week_real_schedule = ($total_week_goal_RBH != null && $total_week_goal_RBH > 0) ? round(($real_week_RBH / $total_week_goal_RBH) * 100, 2) : 0 ;
                $total_week_avg = ($real_week_RBH != null && $real_week_RBH > 0) ? round(($total_week_success / $real_week_RBH), 2) : 0 ;
                $total_week_proc_janky = ($total_week_checked != null && $total_week_checked > 0) ? round(($total_week_bad / $total_week_checked) * 100, 2) : 0 ;
                $total_week_goal_proc = ($total_week_goal != null && $total_week_goal > 0) ? round(($total_week_success / $total_week_goal) * 100, 2) : 0 ;
                $total_goal_proc = ($total_week_success != null && $total_week_success > 0) ?  : 0 ;
                $total_week_sum_call_proc = ($real_week_RBH != null && $real_week_RBH > 0) ? round(($real_week_phone_time / $real_week_RBH) * 100, 2) : 0 ;
            @endphp
            <tr>
                <td style="background-color: #c67979;border:1px solid #231f20;text-align:center;padding:3px"><b>SUMA</b></td>
                <td style="background-color: #c67979;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$week_schedule_goal}}</b></td>
                <td style="background-color: #c67979;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$real_week_RBH}}</b></td>
                <td style="background-color: #c67979;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_week_success}}</b></td>
                <td style="background-color: #c67979;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$real_week_phone_time}}</b></td>
                <td style="background-color: #c67979;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_week_checked}}</b></td>
                <td style="background-color: #c67979;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_week_bad}}</b></td>
                <td style="background-color: #c67979;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$size_total}}</b></td>
                <td style="background-color: #c67979;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_week_goal}}</b></td>
                <td style="background-color: #c67979;border:1px solid #231f20;text-align:center;padding:3px"><b>{{round($total_week_goal_RBH)}}</b></td>
                <td style="background-color: #c67979;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_week_avg}}</b></td>
                <td style="background-color: #c67979;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_week_proc_janky}} %</b></td>
                <td style="background-color: #c67979;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_week_sum_call_proc}} %</b></td>
                <td style="background-color: #c67979;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_week_real_schedule}} %</b></td>
                <td style="background-color: #c67979;border:1px solid #231f20;text-align:center;padding:3px"><b>{{round($total_week_schedule_lost, 2)}}</b></td>
                <td style="background-color: #c67979;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_week_goal_proc}} %</b></td>
                <td style="background-color: #c67979;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_week_rest_goal}}</b></td>
            </tr>
            @php
                $add_week_total = false;
                $total_week_success = 0;
                $week_schedule_goal = 0;
                $real_week_RBH = 0;
                $real_week_phone_time = 0;
                $total_week_checked = 0;
                $total_week_bad = 0;
                $total_week_goal = 0;
                $total_week_goal_RBH = 0;
                $total_week_real_schedule = 0;
                $total_week_schedule_lost = 0;
                $total_week_rest_goal = 0;
            @endphp
        @endif
    @endfor

    @php
        $total_real_schedule = ($total_goal_RBH != null && $total_goal_RBH > 0) ? round(($total_real_RBH / $total_goal_RBH) * 100, 2) : 0 ;
        $total_week_avg = ($total_real_RBH != null && $total_real_RBH > 0) ? round(($total_success / $total_real_RBH), 2) : 0 ;
        $total_week_proc_janky = ($total_checked != null && $total_checked > 0) ? round(($total_bad / $total_checked) * 100, 2) : 0 ;
        $total_goal_proc = ($total_goal != null && $total_goal > 0) ? round(($total_success / $total_goal) * 100, 2) : 0 ;

        $total_sum_call_proc = ($total_real_RBH != null && $total_real_RBH > 0) ? round(($total_phone_time / $total_real_RBH) * 100, 2) : 0 ;
    @endphp

    <tr>
        <td style="background-color: #efef7f;border:1px solid #231f20;text-align:center;padding:3px"><b>SUMA</b></td>
        <td style="background-color: #efef7f;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_schedule_goal}}</b></td>
        <td style="background-color: #efef7f;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_real_RBH}}</b></td>
        <td style="background-color: #efef7f;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_success}}</b></td>
        <td style="background-color: #efef7f;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_phone_time}}</b></td>
        <td style="background-color: #efef7f;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_checked}}</b></td>
        <td style="background-color: #efef7f;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_bad}}</b></td>
        <td style="background-color: #efef7f;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$size_total}}</b></td>
        <td style="background-color: #efef7f;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_goal}}</b></td>
        <td style="background-color: #efef7f;border:1px solid #231f20;text-align:center;padding:3px"><b>{{round($total_goal_RBH)}}</b></td>
        <td style="background-color: #efef7f;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_week_avg}}</b></td>
        <td style="background-color: #efef7f;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_week_proc_janky}} %</b></td>
        <td style="background-color: #efef7f;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_sum_call_proc}} %</b></td>
        <td style="background-color: #efef7f;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_real_schedule}} %</b></td>
        <td style="background-color: #efef7f;border:1px solid #231f20;text-align:center;padding:3px"><b>{{round($total_schedule_lost, 2)}}</b></td>
        <td style="background-color: #efef7f;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_goal_proc}} %</b></td>
        <td style="background-color: #efef7f;border:1px solid #231f20;text-align:center;padding:3px"><b>{{$total_rest_goal}}</b></td>
    </tr>

    </tbody>
</table>
