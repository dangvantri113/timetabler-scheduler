<!doctype html>
<html lang="en" style="height: auto">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body background="/images/background-login.jpg">
<form id="login-form" class="form-container" action="/login" method="post">
    @csrf
    <div class="field-group">
        <input placeholder="Email" type="email" name="email" id="ip-email" required>
    </div>
    <div class="field-group">
        <input placeholder="Password" type="password" name="password" id="ip-email">
    </div>
    <div class="error text-danger">
        <span id="error-login-message">{{session('error_login_message')}}</span>
    </div>
    <div class="field-group">
        <input type="submit" value="LOGIN">
    </div>
</form>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="/js/bootstrap/bootstrap.min.js"></script>
</html>
