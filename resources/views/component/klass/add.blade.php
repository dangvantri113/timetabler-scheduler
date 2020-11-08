<div class="form-container">
    <form id="form-klass" action="/admin/klass/add" method="post">
        @csrf
        <input type="number" name="id" id="ip-id" value="-1" hidden>
        <div class="field-group">
            <label id="lb-name">Tên lớp</label>
            <input type="name" name="name" id="ip-name" required>
        </div>
        <div class="field-group">
            <label id="lb-number-hours">Sĩ số</label>
            <input type="number" name="number_students" id="ip-number-students" required>
        </div>
        <div class="field-group">
            <label id="lb-room">Phòng học</label>
            <select name="room_id" id="sl-room">
                @foreach($rooms as $room)
                    <option value="{{$room->id}}">{{$room->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="field-group">
            <label id="lb-form-teacher">GVCN</label>
            <select name="teacher_id" id="sl-teacher">
                @foreach($teachers as $teacher)
                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="error">
            <span id="error-add-admin-message"></span>
        </div>
        <input type="submit" value="Submit">
    </form>
</div>
