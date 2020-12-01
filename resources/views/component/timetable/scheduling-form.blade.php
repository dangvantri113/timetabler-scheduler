<div style="width: 100%; height: 30px; display: flex">
    <button style="height: 30px"><a href="/admin/timetable/view">Vew Time Table</a></button>
    <form style="height: 30px" action="/admin/scheduling" method="post">
        @csrf
        <div style="text-align: center; align-content: center">
            <label></label>
            <input type="submit" value="Scheduling">
        </div>
    </form>
    <button style="height: 30px"><a href="/admin/timetable/random">Random Table</a></button>
    <button style="height: 30px"><a href="/admin/timetable/export-excel" target="_blank">Tải file excel</a></button>
    @if(session('message'))
        <span>{{session('message')}}</span>
    @endif
</div>