<div class="form-container">
    <form id="form-subject" action="/admin/subject/add" method="post">
        @csrf
        <input type="number" name="id" id="ip-id" value="-1" hidden>
        <div class="field-group">
            <label id="lb-name">Môn Học</label>
            <input type="name" name="name" id="ip-name" required>
        </div>
        <div class="field-group">
            <label id="lb-number-hours">Số giờ học</label>
            <input type="number" name="number_hours" id="ip-number-hours" required>
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
