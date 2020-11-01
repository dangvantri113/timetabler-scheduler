<div>
    <form action="/admin/teacher/add" method="post">
        @csrf
        <div class="field-group">
            <label id="lb-email">Email</label>
            <input type="email" name="email" id="ip-email" required>
        </div>
        <div class="field-group">
            <label id="lb-name">Name</label>
            <input type="name" name="name" id="ip-name" required>
        </div>
        <div class="field-group">
            <label id="lb-name">Gender</label>
            <input type="radio" id="ip-male" name="gender" value="1">
            <label for="male">Male</label>
            <input type="radio" id="ip-female" name="gender" value="0">
            <label for="female">Female</label>
        </div>
        <div class="field-group">
            <label id="lb-name">Birthday</label>
            <input type="date" name="birthday" id="ip-birthday">
        </div>

        <div class="field-group">
            <label id="lb-name">Class</label>
            <select name="class" id="sl-class">
                <option value="1">1A</option>
                <option value="2">1B</option>
                <option value="3">1C</option>
                <option value="4">2A</option>
                <option value="5">2B</option>
                <option value="6">2C</option>
                <option value="7">3A</option>
                <option value="8">3B</option>
                <option value="9">3C</option>
                <option value="10">4A</option>
                <option value="11">4B</option>
                <option value="12">4C</option>
                <option value="13">5A</option>
                <option value="14">5B</option>
                <option value="15">5C</option>
            </select>
        </div>
        <div class="field-group">
            <label>Position</label>
            <select name="position" id="sl-class">
                <option value="HEAD">Hiệu Trưởng</option>
                <option value="SUBHEAD">Hiệu Phó</option>
                <option value="CHARGE">Tổng Phụ Trách</option>
            </select>
        </div>
        <div class="error">
            <span id="error-add-admin-message"></span>
        </div>
        <input type="submit" value="ADD">
    </form>
</div>
