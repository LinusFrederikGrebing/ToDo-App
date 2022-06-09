<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In </title>
    <link rel="stylesheet" href="style_Login_Page.css">
</head>
<body>
<h1>Log In</h1>
<form method="post">
    <div class="container">
        <label for="userName"></label>
        <input type="text" placeholder="Username" name="uid" required>
        <label for="userPassword"></label>
        <input type="password" placeholder="Password" name="password" required>
        <!-- noch ohne Funktion -->
        <input type="checkbox" checked="checked" name="remember">Passwort merken</label>
        </label>
        <button type="submit">Log In</button>
    </div>
</form>
<div class="andereLinks">
    <a href="">Warum Lernhilfe?</a>
    </br>
    <a href="">Über uns</a>
</div>
</body>
<footer>
    &copy; Lernhilfe
</footer>
</html>