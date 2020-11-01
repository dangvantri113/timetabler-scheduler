<table class="timetable">
    <tr>
        <td>Time</td>
        <td>Mon</td>
        <td>Tue</td>
        <td>Wed</td>
        <td>Thu</td>
        <td>Fri</td>
        <td>Sat</td>
        <td>Sun</td>
    </tr>
    @for($i=0; $i<10; $i++)
        <tr>
            <td>{{$i+7}}h - {{$i+8}}h</td>
        @for($j=0; $j<7; $j++)
            <td></td>
        @endfor
    @endfor

</table>
