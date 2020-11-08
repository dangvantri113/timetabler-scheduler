@extends('layout')
@section('load-css')
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/admin.css">
@endsection

@section('content')
    <div class="admin-content">
        <div class="w-100">
            <select class="w-100" name="klass_id" id="ip-klass">
                <option value="1A">1A</option>
            </select>
            <table border="5" cellspacing="0" align="center" class="timetable">
                <tr>
                    <td align="center" height="50"
                        width="100"><br>
                        <b>Day/Period</b></br>
                    </td>
                    <td align="center" height="50"
                        width="100">
                        <b>I<br>7h-8h</b>
                    </td>
                    <td align="center" height="50"
                        width="100">
                        <b>II<br>8h-9h</b>
                    </td>
                    <td align="center" height="50"
                        width="100">
                        <b>III<br>9h-10h</b>
                    </td>
                    <td align="center" height="50"
                        width="100">
                        <b>IV <br>10h-11h</b>
                    </td>
                    <td align="center" height="50"
                        width="100">
                        <b>V<br>11h-12h</b>
                    </td>
                    <td align="center" height="50"
                        width="100">
                        <b>VI<br>12h-13h</b>
                    </td>
                    <td align="center" height="50"
                        width="100">
                        <b>VII<br>13h-14h</b>
                    </td>
                    <td align="center" height="50"
                        width="100">
                        <b>VIII<br>14h-15h</b>
                    </td>
                    <td align="center" height="50"
                        width="100">
                        <b>IX<br>15h-16h</b>
                    </td>
                    <td align="center" height="50"
                        width="100">
                        <b>X<br>16h-17h</b>
                    </td>
                </tr>
                <tr>
                    <td align="center" height="50">
                        <b>Monday</b></td>
                    <td align="center" height="50">Eng</td>
                    <td align="center" height="50">Mat</td>
                    <td align="center" height="50">Che</td>
                    <td align="center" height="50">Che</td>
                    <td align="center" height="50">Che</td>
                    <td rowspan="6" align="center" height="50">
                        <h2>L<br>U<br>N<br>C<br>H</h2>
                    </td>
                    <td colspan="3" align="center"
                        height="50">LAB</td>
                    <td align="center" height="50">Phy</td>
                </tr>
                <tr>
                    <td align="center" height="50">
                        <b>Tuesday</b>
                    </td>
                    <td colspan="3" align="center"
                        height="50">LAB
                    </td>
                    <td align="center" colspan="2" height="50">Eng</td>
                    <td align="center" height="50">Che</td>
                    <td align="center" height="50">Mat</td>
                    <td align="center" colspan="2" height="50">SPORTS</td>
                </tr>
                <tr>
                    <td align="center" height="50">
                        <b>Wednesday</b>
                    </td>
                    <td align="center" colspan="2" height="50">Mat</td>
                    <td align="center" colspan="2" height="50">phy</td>
                    <td align="center" height="50">Eng</td>
                    <td align="center" height="50">Che</td>
                    <td colspan="3" align="center"
                        height="50">LIBRARY
                    </td>
                </tr>
                <tr>
                    <td align="center" height="50">
                        <b>Thursday</b>
                    </td>
                    <td align="center" height="50">Phy</td>
                    <td align="center" height="50">Eng</td>
                    <td align="center" colspan="3" height="50">Che</td>
                    <td colspan="3" align="center"
                        height="50">LAB
                    </td>
                    <td align="center" height="50">Mat</td>
                </tr>
                <tr>
                    <td align="center" height="50">
                        <b>Friday</b>
                    </td>
                    <td colspan="3" align="center"
                        height="50">LAB
                    </td>
                    <td align="center" colspan="2" height="50">Mat</td>
                    <td align="center" height="50">Che</td>
                    <td align="center" height="50">Eng</td>
                    <td align="center" colspan="2" height="50">Phy</td>
                </tr>
                <tr>
                    <td align="center" height="50">
                        <b>Saturday</b>
                    </td>
                    <td align="center" colspan="3" height="50">Eng</td>
                    <td align="center" height="50">Che</td>
                    <td align="center" height="50">Mat</td>
                    <td colspan="3" align="center"
                        height="50">SEMINAR
                    </td>
                    <td align="center" height="50">SPORTS</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
@section('load-js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="/js/bootstrap/bootstrap.min.js"></script>
@endsection
