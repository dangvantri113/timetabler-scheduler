<div class="form-container">
    <form id="form-teacher" action="/admin/teacher/add" method="post">
        @csrf
        <div class="field-group">
            <label id="lb-email">Email</label>
            <input type="email" name="email" id="ip-email" required>
        </div>
        <div class="field-group">
            <label id="lb-name">Tên</label>
            <input type="name" name="name" id="ip-name" required>
        </div>
        <div class="field-group">
            <label id="lb-name">Giới Tính</label>
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
            <label>Môn dạy</label>
            <div class="checkbox-container">
                <div><input class="cb" type="checkbox" name="subjects[]"><label>Toán</label></div>
                <div><input class="cb" type="checkbox" name="subjects[]"><label>Tiếng Việt</label></div>
                <div><input class="cb" type="checkbox" name="subjects[]"><label>Tiếng Anh</label></div>
                <div><input class="cb" type="checkbox" name="subjects[]"><label>Đạo đức</label></div>
                <div><input class="cb" type="checkbox" name="subjects[]"><label>Tự nhiên xã hội</label></div>
                <div><input class="cb" type="checkbox" name="subjects[]"><label>Lịch sử</label></div>
                <div><input class="cb" type="checkbox" name="subjects[]"><label>Địa lý</label></div>
                <div><input class="cb" type="checkbox" name="subjects[]"><label>Khoa Học</label></div>
                <div><input class="cb" type="checkbox" name="subjects[]"><label>Tin</label></div>
                <div><input class="cb" type="checkbox" name="subjects[]"><label>Thể dục</label></div>
                <div><input class="cb" type="checkbox" name="subjects[]"><label>Nhạc</label></div>
                <div><input class="cb" type="checkbox" name="subjects[]"><label>Vẽ</label></div>
                <div><input class="cb" type="checkbox" name="subjects[]"><label>Công nghệ</label></div>
                <div><input class="cb" type="checkbox" name="subjects[]"><label>Tiếng Nhật</label></div>
            </div>
        </div>
        <div class="field-group">
            <label>Chức vụ</label>
            <select name="position" id="sl-class">
                <option value="HEAD">Hiệu Trưởng</option>
                <option value="SUBHEAD">Hiệu Phó</option>
                <option value="CHARGE">Tổng Phụ Trách</option>
                <option value="" selected>Not selected</option>
            </select>
        </div>
        <div class="error">
            <span id="error-add-admin-message"></span>
        </div>
        <div class="field-group">
            <label></label>
            <input type="submit" value="SUBMIT">
        </div>
    </form>
</div>
