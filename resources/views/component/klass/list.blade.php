<div class="list-container">
    <table>
        <tr>
            <th>Lớp</th>
            <th>Sĩ số</th>
            <th>Phòng</th>
            <th>GVCN</th>
            <th>Hành động</th>
        </tr>
        @foreach($klasses as $klass)
            <tr id="sb_{{$klass->id}}">
                <td class="klass-name">{{$klass->name}}</td>
                <td class="klass-students">{{$klass->number_students}}</td>
                <td class="klass-room" id="room_{{$klass->room?$klass->room->id:""}}">{{$klass->room?$klass->room->name:""}}</td>
                <td class="klass-teacher" id="teacher_{{$klass->teacher?$klass->teacher->id:""}}">{{$klass->teacher?$klass->teacher->name:""}}</td>
                <td class="action klass-action">
                    <a class="edit" href="#" onclick="editKlass({{$klass->id}})">Edit</a>
                    <a class="delete" href="#" onclick="deleteKlass({{$klass->id}})">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    @include('component.pagination',['dataLink'=>$klasses])
</div>
