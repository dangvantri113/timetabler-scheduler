<div class="list-container">
    <table>
        <tr>
            <th>Môn Học</th>
            <th>Hành động</th>
        </tr>
        @foreach($rooms as $room)
            <tr id="sb_{{$room->id}}">
                <td class="room-name">{{$room->name}}</td>
                <td class="action room-action">
                    <a class="edit" href="#" onclick="editRoom({{$room->id}})">Edit</a>
                    <a class="delete" href="#" onclick="deleteRoom({{$room->id}})">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    @include('component.pagination',['dataLink'=>$rooms])
</div>
