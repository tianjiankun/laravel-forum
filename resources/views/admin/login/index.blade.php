<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{ url('auth/admin/login') }}" method="post">
账号:
<input type="text" name="login_name">
密码:
<input type="password" name="password">
    <button type="submit">登录</button>
</form>
</body>
</html>