@extends('layout')
@section('load-css')
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/admin.css">
@endsection

@section('content')
    <div class="admin-content">
        @include('component.side-bar')
        <div class="w-100">
            @for($i=0;$i<count($classes);$i++)
                <div style="height: 10px; width: 100%; border-bottom: solid 1px #E91E7E; margin-bottom: 10px"></div>
                <table border="5" cellspacing="0" align="center" class="timetable">
                    <h3>Lớp {{$classes[$i]->name}}</h3>
                    <tr>
                        <td>Tiết/Thứ</td>
                        <td>Thứ 2</td>
                        <td>Thứ 3</td>
                        <td>Thứ 4</td>
                        <td>Thứ 5</td>
                        <td>Thứ 6</td>
                    </tr>
                    <tr>
                        <td>Tiết 1</td>
                        <td>
                            @if($data[0][$i]!==null)<span>
                                {{$data[0][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[0][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[10][$i]!==null)<span>
                                {{$data[10][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[10][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[20][$i]!==null)<span>
                                {{$data[20][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[20][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[30][$i]!==null)<span>
                                {{$data[30][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[30][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>

                        <td>
                            @if($data[40][$i]!==null)<span>
                                {{$data[40][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[40][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <td>Tiết 2</td>
                        <td>
                            @if($data[1][$i]!==null)<span>
                                {{$data[1][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[1][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[11][$i]!==null)<span>
                                {{$data[11][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[11][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[21][$i]!==null)<span>
                                {{$data[21][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[21][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[31][$i]!==null)<span>
                                {{$data[31][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[31][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>

                        <td>
                            @if($data[41][$i]!==null)<span>
                                {{$data[41][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[41][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <td>Tiết 3</td>
                        <td>
                            @if($data[2][$i]!==null)<span>
                                {{$data[2][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[2][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[12][$i]!==null)<span>
                                {{$data[12][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[12][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[22][$i]!==null)<span>
                                {{$data[22][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[22][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[32][$i]!==null)<span>
                                {{$data[32][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[32][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>

                        <td>
                            @if($data[42][$i]!==null)<span>
                                {{$data[42][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[42][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <td>Tiết 4</td>
                        <td>
                            @if($data[3][$i]!==null)<span>
                                {{$data[3][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[3][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[13][$i]!==null)<span>
                                {{$data[13][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[13][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[23][$i]!==null)<span>
                                {{$data[23][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[23][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[33][$i]!==null)<span>
                                {{$data[33][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[33][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>

                        <td>
                            @if($data[43][$i]!==null)<span>
                                {{$data[43][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[43][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <td>Tiết 5</td>
                        <td>
                            @if($data[4][$i]!==null)<span>
                                {{$data[4][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[4][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[14][$i]!==null)<span>
                                {{$data[14][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[14][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[24][$i]!==null)<span>
                                {{$data[24][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[24][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[34][$i]!==null)<span>
                                {{$data[34][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[34][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>

                        <td>
                            @if($data[44][$i]!==null)<span>
                                {{$data[44][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[44][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <td>Nghỉ trưa</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Tiết 6</td>
                        <td>
                            @if($data[5][$i]!==null)<span>
                                {{$data[5][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[5][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[15][$i]!==null)<span>
                                {{$data[15][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[15][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[25][$i]!==null)<span>
                                {{$data[25][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[25][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[35][$i]!==null)<span>
                                {{$data[35][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[35][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>

                        <td>
                            @if($data[45][$i]!==null)<span>
                                {{$data[45][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[45][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <td>Tiết 7</td>
                        <td>
                            @if($data[6][$i]!==null)<span>
                                {{$data[6][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[6][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[16][$i]!==null)<span>
                                {{$data[16][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[16][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[26][$i]!==null)<span>
                                {{$data[26][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[26][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[36][$i]!==null)<span>
                                {{$data[36][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[36][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>

                        <td>
                            @if($data[46][$i]!==null)<span>
                                {{$data[46][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[46][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <td>Tiết 8</td>
                        <td>
                            @if($data[7][$i]!==null)<span>
                                {{$data[7][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[7][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[17][$i]!==null)<span>
                                {{$data[17][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[17][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[27][$i]!==null)<span>
                                {{$data[27][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[27][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[37][$i]!==null)<span>
                                {{$data[37][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[37][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>

                        <td>
                            @if($data[47][$i]!==null)<span>
                                {{$data[47][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[47][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <td>Tiết 9</td>
                        <td>
                            @if($data[8][$i]!==null)<span>
                                {{$data[8][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[8][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[18][$i]!==null)<span>
                                {{$data[18][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[18][$i]->teacher->name}}
                            </i>                            @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[28][$i]!==null)<span>
                                {{$data[28][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[28][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[38][$i]!==null)<span>
                                {{$data[38][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[38][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>

                        <td>
                            @if($data[48][$i]!==null)<span>
                                {{$data[48][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[48][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <td>Tiết 10</td>
                        <td>
                            @if($data[9][$i]!==null)<span>
                                {{$data[9][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[9][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[19][$i]!==null)<span>
                                {{$data[19][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[19][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[29][$i]!==null)<span>
                                {{$data[29][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[29][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                        <td>
                            @if($data[39][$i]!==null)<span>
                                {{$data[39][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[39][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>

                        <td>
                            @if($data[49][$i]!==null)<span>
                                {{$data[49][$i]->subject->name}}</span>
                            <br><i style="color:#E91E7E;">
                                {{$data[49][$i]->teacher->name}}
                            </i>                          @else
                                {{'---'}}
                            @endif

                        </td>
                    </tr>
                </table>
            @endfor
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
