<div class="list-container">
    <table>
        <tr>
            <th>Khối</th>
            <th>Môn Học</th>
            <th>Số tiết học</th>
            <th>Hành động</th>
        </tr>
        @foreach($subject_levels as $subject_level)
            <tr id="sb_{{$subject_level->id}}">
                <td class="subject-level-subject-id" id="subject-level-subject-id-{{$subject_level->subject->id}}">{{$subject_level->subject->name}}</td>
                <td class="subject-level-level-id" id="subject-level-level-id-{{$subject_level->level->id}}">{{$subject_level->level->name}}</td>
                <td class="subject-level-units">{{$subject_level->units}}</td>
                <td class="action subject-action">
                    <a class="edit" href="#" onclick="editSubjectLevel({{$subject_level->id}})">Edit</a>
                    <a class="delete" href="#" onclick="deleteSubjectLevel({{$subject_level->id}})">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    @include('component.pagination',['dataLink'=>$subject_levels])
</div>
