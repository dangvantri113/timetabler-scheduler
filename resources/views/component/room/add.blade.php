<div class="form-container">
    <form id="form-room" action="/admin/room/add" method="post">
        @csrf
        <input type="number" name="id" id="ip-id" value="-1" hidden>
        <div class="field-group">
            <label id="lb-name">Phòng Học</label>
            <input type="name" name="name" id="ip-name" required>
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
