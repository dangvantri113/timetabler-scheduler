<form action="/login" method="post">
    @csrf
    <div class="field-group">
        <label id="lb-email">Email</label>
        <input type="email" name="email" id="ip-email" required>
    </div>
    <div class="field-group">
        <label id="lb-password">Password</label>
        <input type="password" name="password" id="ip-email" required>
    </div>
    <div class="error">
        <span id="error-login-message"></span>
    </div>
    <input type="submit" value="LOGIN">
</form>
