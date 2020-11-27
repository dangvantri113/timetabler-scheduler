<div class="form-container">
    <form id="form-subject-level" action="/admin/subject-level/add" method="post">
        @csrf
        <input type="number" name="id" id="ip-id" value="-1" hidden>
        <div class="field-group">
            <label id="lb-form-level">Khối</label>
            <select name="level_id" id="sl-level">
                @foreach($levels as $level)
                    <option value="{{$level->id}}">{{$level->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="field-group">
            <label id="lb-form-subject">Môn học</label>
            <select name="subject_id" id="sl-subject">
                @foreach($subjects as $subject)
                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="field-group">
            <label id="lb-units">Số giờ học</label>
            <input type="number" name="units" id="ip-units" required>
        </div>
        <div class="error">
            <span id="error-add-admin-message"></span>
        </div>
        <div class="field-group">
            <label></label>
            <input type="submit" value="Submit">
        </div>
    </form>
</div>
