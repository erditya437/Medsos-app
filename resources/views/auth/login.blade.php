<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="/css/login.css">
</head>
<body>

  <form method="POST" action="/login">
    @csrf
    <h1>Login</h1>

    @if(session('error')) 
      <p style="color:red">{{ session('error') }}</p> 
    @endif

    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>

    <button type="submit">Login</button>

    <p>Belum punya akun? <a href="/register">Daftar</a></p>
  </form>

</body>
</html>
