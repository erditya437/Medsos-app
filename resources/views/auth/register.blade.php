<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="/css/register.css">
</head>
<body>

  <form method="POST" action="/register">
    @csrf
    <h1>Register</h1>

    @if(session('success')) 
      <p style="color:green">{{ session('success') }}</p> 
    @endif

    <input type="text" name="name" placeholder="Nama" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>

    <button type="submit">Register</button>

    <p>Sudah punya akun? <a href="/login">Login</a></p>
  </form>

</body>
</html>
