<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo Anlegen</title>
    <!-- Absoluten Link für das Stylesheet je nach Umgebung (VM) setzen -->
    <link rel="stylesheet" href="../ToDoGUI/style_todo_Anlegen.css">
</head>
<body>
<header>
    <form method="post" action="">
        <button type="submit" name="back" class="leftArrow"><</button>
    </form>
    <h1>Neues ToDo</h1>
    <form method="POST" action="">
    <button type="submit" class="plusButton">+</button>
</header>
<hr  id="headline">
<div id="addForm">
    <label for="titel">Titel:</label>
    <input type="text" id="titel" name="titel" maxlength="30" required>
    <hr>
    <br>
    <label for="dauer">Dauer (in h):</label>
    <input type="number" id="dauer" name="zeitspanne" step="any">
    <hr>
    <br>
    <label for="deadline">Deadline:</label>
    <input type="datetime-local" id="deadline" name="deadline">
    <hr>
    <br>
    <label for="info">Info:</label>
    <input type="text" id="info" name="info" maxlength="300">
    <hr>
    <br>
    <br><br>
</div>
</form>
</body>
<footer>
</footer>
</html>