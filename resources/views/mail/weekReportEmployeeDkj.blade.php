<table style ="width:100%;border:1px solid #231f20;border-collapse:collapse;padding:3px;">
<thead style="color:#efd88f;">
<tr>
<td colspan="5" style="border:1px solid #231f20;text-align:center;padding:3px;background:#231f20; color:#efd88f;">
<font size="6" face="sans-serif">RAPORT TYGODNIOWY PRACOWNICY DKJ - BADANIA</td>
<td colspan="6" style="border:1px solid #231f20;text-align:left;padding:6px;background:#231f20;">
<img src="http://teambox.pl/image/logovc.png"></td>
</tr>
<tr>
<th style="border:1px solid #231f20;padding:3px;background:#231f20;">Lp.</th>
<th style="border:1px solid #231f20;padding:3px;background:#231f20;">Pracownik DKJ</th>
<th style="border:1px solid #231f20;padding:3px;background:#231f20;">Zakres Dat</th>
<th style="border:1px solid #231f20;padding:3px;background:#231f20;">Liczba odsłuchanych rozmów</th>
<th style="border:1px solid #231f20;padding:3px;background:#231f20;">Liczba poprawnych rozmów</th>
<th style="border:1px solid #231f20;padding:3px;background:#231f20;">Liczba niepoprawnych rozmów</th>
<th style="border:1px solid #231f20;padding:3px;background:#231f20;">Czas Pracy</th>
<th style="border:1px solid #231f20;padding:3px;background:#231f20;">Średnia na godzinę</th>
</tr>
</thead>
<tbody>

@php
    $i = 1;
    $total_user_sum = 0;
    $total_user_janek = 0;
    $total_user_not_janek = 0;
    $total_work_hour = 0;
    $total_avg = 0;
    $user_avg = 0;
    $user_time_sum = 0;
@endphp
@foreach($dkj as $item)
    @if($item->dating_type == 0)
    @php
        $create_column = true;
        $create_total_up = true;
    @endphp
        <tr>
            <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$i}}</td>
            <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$item->first_name . ' ' . $item->last_name}}</td>
            <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$date_start . ' - ' . $date_stop}}</td>
            <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$item->user_sum}}</td>
            <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$item->user_not_janek}}</td>
            <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$item->user_janek}}</td>
            @foreach($work_hours as $hour)

                @if($hour->id == $item->id)
                @php
                $create_column = false;
                $time_sum_array = explode(":", $hour->work_time);
                $user_time_sum = round((($time_sum_array[0] * 3600) + ($time_sum_array[1] * 60) + $time_sum_array[2]) / 3600, 2);
                $total_work_hour += $user_time_sum;
                if($user_time_sum != 0)
                        $user_avg = round($item->user_sum / $user_time_sum, 2);
                    else
                        $user_avg = 0;
                @endphp
                    <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$hour->work_time}}</td>
                @endif
            @endforeach
            @if($create_column == true)
                <td style="border:1px solid #231f20;text-align:center;padding:3px;">0</td>
            @endif
            <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$user_avg}}</td>
        </tr>

        @php
            $total_user_sum += $item->user_sum;
            $total_user_janek += $item->user_janek;
            $total_user_not_janek += $item->user_not_janek;
            $i++;
        @endphp
    @endif
@endforeach

@if(isset($create_total_up) && $create_total_up == true)
    <tr>
        <td colspan="3" style="border:1px solid #231f20;text-align:center;padding:3px;"><b>Total</b></td>
        <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$total_user_sum}}</td>
        <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$total_user_not_janek}}</td>
        <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$total_user_janek}}</td>
        <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$total_work_hour}}</td>
        @if($total_work_hour > 0)
            <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{round($total_user_sum / $total_work_hour, 2)}}</td>
        @else
            <td style="border:1px solid #231f20;text-align:center;padding:3px;">0</td>
        @endif
    </tr>
@endif

</tbody>
</table>
<br>
<br>
<table style ="width:100%;border:1px solid #231f20;border-collapse:collapse;padding:3px;">
<thead style="color:#efd88f;">
<tr>
<td colspan="5" style="border:1px solid #231f20;text-align:center;padding:3px;background:#231f20; color:#efd88f;">
<font size="6" face="sans-serif">RAPORT TYGODNIOWY PRACOWNICY DKJ - WYSYŁKA</td>
<td colspan="6" style="border:1px solid #231f20;text-align:left;padding:6px;background:#231f20;">
<img src="http://teambox.pl/image/logovc.png"></td>
</tr>
<tr>
<th style="border:1px solid #231f20;padding:3px;background:#231f20;">Lp.</th>
<th style="border:1px solid #231f20;padding:3px;background:#231f20;">Pracownik DKJ</th>
<th style="border:1px solid #231f20;padding:3px;background:#231f20;">Zakres Dat</th>
<th style="border:1px solid #231f20;padding:3px;background:#231f20;">Liczba odsłuchanych rozmów</th>
<th style="border:1px solid #231f20;padding:3px;background:#231f20;">Liczba poprawnych rozmów</th>
<th style="border:1px solid #231f20;padding:3px;background:#231f20;">Liczba niepoprawnych rozmów</th>
<th style="border:1px solid #231f20;padding:3px;background:#231f20;">Czas Pracy</th>
<th style="border:1px solid #231f20;padding:3px;background:#231f20;">Średnia na godzinę</th>
</tr>
</thead>
<tbody>

@php
    $y = 1;
    $total_user_sum = 0;
    $total_user_janek = 0;
    $total_user_not_janek = 0;
    $total_work_hour = 0;
    $total_avg = 0;
@endphp
@foreach($dkj as $item)
    @if($item->dating_type == 1)
    @php
        $create_column = true;
        $create_total_down = true;
    @endphp
        <tr>
            <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$y}}</td>
            <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$item->first_name . ' ' . $item->last_name}}</td>
            <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$date_start . ' - ' . $date_stop}}</td>
            <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$item->user_sum}}</td>
            <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$item->user_not_janek}}</td>
            <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$item->user_janek}}</td>
            @foreach($work_hours as $hour)
                @if($hour->id == $item->id)
                @php
                    $create_column = false;
                    $time_sum_array = explode(":", $hour->work_time);
                    $user_time_sum = round((($time_sum_array[0] * 3600) + ($time_sum_array[1] * 60) + $time_sum_array[2]) / 3600, 2);
                    $total_work_hour += $user_time_sum;
                    if($user_time_sum != 0)
                        $user_avg = round($item->user_sum / $user_time_sum, 2);
                    else
                        $user_avg = 0;
                @endphp
                    <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$hour->work_time}}</td>
                @endif
            @endforeach
            @if($create_column == true)
                <td style="border:1px solid #231f20;text-align:center;padding:3px;">0</td>
            @endif
            <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$user_avg}}</td>
        </tr>

        @php
            $total_user_sum += $item->user_sum;
            $total_user_janek += $item->user_janek;
            $total_user_not_janek += $item->user_not_janek;
            $y++;
        @endphp
    @endif
@endforeach

@if(isset($create_total_down) && $create_total_down == true)
    <tr>
        <td colspan="3" style="border:1px solid #231f20;text-align:center;padding:3px;"><b>Total</b></td>
        <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$total_user_sum}}</td>
        <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$total_user_not_janek}}</td>
        <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$total_user_janek}}</td>
        <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{$total_work_hour}}</td>
        @if($total_work_hour > 0)
            <td style="border:1px solid #231f20;text-align:center;padding:3px;">{{round($total_user_sum / $total_work_hour, 2)}}</td>
        @else
            <td style="border:1px solid #231f20;text-align:center;padding:3px;">0</td>
        @endif
    </tr>
@endif




</tbody>
</table>
