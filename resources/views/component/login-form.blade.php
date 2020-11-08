<form id="login-form" class="form-container" action="/login" method="post">
    @csrf
    <div class="field-group">
        <label id="lb-email">Email</label>
        <input type="email" name="email" id="ip-email" required>
    </div>
    <div class="field-group">
        <label id="lb-password">Password</label>
        <input type="password" name="password" id="ip-email">
    </div>
    <div class="error text-danger">
        <span id="error-login-message">{{session('error_login_message')}}</span>
    </div>
    <div class="field-group">
        <label></label>
        <input type="submit" value="LOGIN">
    </div>
</form>
