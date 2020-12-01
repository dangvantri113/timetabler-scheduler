<div class="list-container">
    <table>
        <tr>
            <th>Tên</th>
            <th>Email</th>
            <th>Lớp</th>
            <th>Môn dạy</th>
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>
            <th>Chức vụ</th>
            <th>Hành Động</th>
        </tr>
        @foreach($teachers as $teacher)
            <tr id="tc-{{$teacher->id}}">
                <td class="teacher-name">{{$teacher->name}}</td>
                <td class="teacher-email">{{$teacher->email}}</td>
                <td class="teacher-klass">{{$teacher->klass?$teacher->klass->level->name.$teacher->klass->name:""}}</td>
                <td class="teacher-subjects">
                    @foreach($teacher->subjects as $subject)
                        <span class="subject-item sb_{{$subject->id}}">{{$subject->name}}</span>
                    @endforeach
                </td>
                <td class="teacher-gender">{{$teacher->gender?"Nam":"Nữ"}}</td>
                <td class="teacher-birthday">{{$teacher->birthday}}</td>
                <td class="teacher-position">{{$teacher->position}}</td>
                <td class="action teacher-action">
                    <a class="edit" href="#" onclick="editTeacher({{$teacher->id}})">Edit</a>
                    <a class="delete" href="#" onclick="deleteTeacher({{$teacher->id}})">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    @include('component.pagination',['dataLink'=>$teachers])
</div>
