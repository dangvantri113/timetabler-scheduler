<div class="list-container">
    <table>
        <tr>
            <th>Môn Học</th>
            <th>Số tiết học</th>
            <th>Hành động</th>
        </tr>
        @foreach($subjects as $subject)
            <tr id="sb_{{$subject->id}}">
                <td class="subject-name">{{$subject->name}}</td>
                <td class="subject-hours">{{$subject->number_hours}}</td>
                <td class="action subject-action">
                    <a class="edit" href="#" onclick="editSubject({{$subject->id}})">Edit</a>
                    <a class="delete" href="#" onclick="deleteSubject({{$subject->id}})">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    @include('component.pagination',['dataLink'=>$subjects])
</div>
