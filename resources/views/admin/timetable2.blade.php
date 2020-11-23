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
            <select class="w-100" name="klass_id" id="ip-klass">
                <option value="1A">1A</option>
            </select>
            @for($i=0;$i<count($classes);$i++)
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
                    @for($j=0; $j<50; $j++)

                    @endfor
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
