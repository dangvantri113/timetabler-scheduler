<div class="list-container">
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Class</th>
            <th>Position</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>Teacher 1</td>
            <td>Teacher1@gmail.com</td>
            <td>1A</td>
            <td>Giáo Viên Thể Dục</td>
            <td>
                <a href="/admin/teacher/detail/1">Details</a>
                <a href="/admin/teacher/edit/1">Edit</a>
                <a href="/admin/teacher/delete/1" onclick="javascript:void(0)">Delete</a>
            </td>
        </tr>
        @foreach($teachers as $teacher)
            <tr>
                <td>{{$teacher->name}}</td>
                <td>{{$teacher->email}}</td>
                <td>{{$teacher->klass->name}}</td>
                <td>{{$teacher->position}}</td>
                <td>
                    <a href="/admin/teacher/detail/1">Details</a>
                    <a href="/admin/teacher/edit/1">Edit</a>
                    <a href="/admin/teacher/delete/1" onclick="javascript:void(0)">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
