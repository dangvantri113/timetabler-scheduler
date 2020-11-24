<div class="form-container">
    <form id="add-admin-form" action="/admin/add-admin" method="post">
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
            <label id="lb-name">Password</label>
            <input type="password" name="password" id="ip-password" required>
        </div>
        <div class="error">
            <span id="error-add-admin-message"></span>
        </div>
        <div class="field-group">
            <label></label>
            <input type="submit" value="ADD">
        </div>
    </form>
</div>
