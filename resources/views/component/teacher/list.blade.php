<div class="list-container">
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Class</th>
            <th>Position</th>
            <th>Action</th>
        </tr>
        @foreach($teachers as $teacher)
            <tr>
                <td>{{$teacher->name}}</td>
                <td>{{$teacher->email}}</td>
                <td>{{$teacher->klass?$teacher->klass->name:""}}</td>
                <td>{{$teacher->position}}</td>
                <td class="action teacher-action">
                    <a class="edit" href="#" onclick="editTeacher({{$teacher->id}})">Edit</a>
                    <a class="delete" href="#" onclick="deleteTeacher({{$teacher->id}})">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    @include('component.pagination',['dataLink'=>$teachers])
</div>
