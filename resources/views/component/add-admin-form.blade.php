<form action="/admin/add-admin" method="post">
    @csrf
    <div class="field-group">
        <label id="lb-email">Email</label>
        <input type="email" name="email" id="ip-email" required>
    </div>
    <label id="lb-name">Name</label>
    <input type="name" name="name" id="ip-name" required>
    <div class="error">
        <span id="error-add-admin-message"></span>
    </div>
    <input type="submit" value="ADD">
</form>
