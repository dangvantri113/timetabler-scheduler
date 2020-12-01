@extends('layout')
@section('load-css')
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/admin.css">
    <style>
        html {
            height: auto;
        }
    </style>
@endsection

@section('content')
    <div class="admin-content">
        @include('component.side-bar')
        <div class="w-100">
            <button style="height: 30px"><a href="/admin/timetable/export-excel" target="_blank">Tải file excel</a></button>
            @foreach($klasses as $klass)
                <div style="text-align: center; border-bottom: pink solid 2px; padding-bottom: 30px;">
                    <h2>{{$klass->level->name}} {{$klass->name}}</h2>
                    <table class="timetable m-auto">
                        <tr style="background: pink">
                            <th>Tiết / Thứ</th>
                            <th>Thứ Hai</th>
                            <th>Thứ Ba</th>
                            <th>Thứ Tư</th>
                            <th>Thứ Năm</th>
                            <th>Thứ Sáu</th>
                        </tr>

                        @for($i=1;$i<=10;$i++)
                            <tr>
                                <td>Tiết {{$i}}</td>

                                <?php $klass_timetable = $klass->timeTables->where('hour', $i) ?>
                                @if(count($klass_timetable->where('date','HAI'))>0)
                                    @foreach($klass_timetable->where('date','HAI') as $time)
                                        @if($time->teacher_id == $klass->teacher_id)
                                            <td><b>{{$time->subject->name}}</b></td> @else
                                            <td>{{$time->subject->name}}</td> @endif
                                    @endforeach
                                @else
                                    <td>---</td>
                                @endif
                                @if(count($klass_timetable->where('date','BA'))>0)
                                    @foreach($klass_timetable->where('date','BA') as $time)
                                        @if($time->teacher_id == $klass->teacher_id)
                                            <td><b>{{$time->subject->name}}</b></td> @else
                                            <td>{{$time->subject->name}}</td> @endif
                                    @endforeach
                                @else
                                    <td>---</td>
                                @endif
                                @if(count($klass_timetable->where('date','TƯ'))>0)
                                    @foreach($klass_timetable->where('date','TƯ') as $time)
                                        @if($time->teacher_id == $klass->teacher_id)
                                            <td><b>{{$time->subject->name}}</b></td> @else
                                            <td>{{$time->subject->name}}</td> @endif
                                    @endforeach
                                @else
                                    <td>---</td>
                                @endif
                                @if(count($klass_timetable->where('date','NĂM'))>0)
                                    @foreach($klass_timetable->where('date','NĂM') as $time)
                                        @if($time->teacher_id == $klass->teacher_id)
                                            <td><b>{{$time->subject->name}}</b></td> @else
                                            <td>{{$time->subject->name}}</td> @endif
                                    @endforeach
                                @else
                                    <td>---</td>
                                @endif
                                @if(count($klass_timetable->where('date','SÁU'))>0)
                                    @foreach($klass_timetable->where('date','SÁU') as $time)
                                        @if($time->teacher_id == $klass->teacher_id)
                                            <td><b>{{$time->subject->name}}</b></td> @else
                                            <td>{{$time->subject->name}}</td> @endif
                                    @endforeach
                                @else
                                    <td>---</td>
                                @endif
                            </tr>
                        @endfor

                    </table>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('load-js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="/js/bootstrap/bootstrap.min.js"></script>
@endsection
