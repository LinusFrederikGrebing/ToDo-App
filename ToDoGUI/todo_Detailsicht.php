<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo Anlegen - Lernhilfe</title>
    <!-- Absoluten Link für das Stylesheet je nach Umgebung (VM) setzen -->
    <link rel="stylesheet" href="../ToDoGUI/style_todo_Detailansicht.css">
</head>
<header>
    <form method="post" action="">
        <button type="submit" name="back" class="leftArrow"><</button>
    </form>
    <h1>Detailansicht</h1>
</header>
<body>
<hr>
<div class="detailtodo">
    <label for="titel">Titel:</label>
    <p><?php echo $todo->getTitel(); ?></p>
    <?php

    ?>
    <hr>
    <br>
    <label for="dauer">Dauer:</label>
    <p> <?php if($todo->getZeitspanne() != 0) echo $todo->getZeitspanne()." h";?> </p>
    <?php

    ?>
    <hr>
    <br>
    <label for="deadline">Deadline:</label>
    <p> <?php if($todo->getDeadline() != "0000-00-00 00:00:00") echo $todo->getDeadline();?> </p>
    <?php

    ?>
    <hr>
    <br>
    <label for="info">Info:</label>
    <p> <?php echo $todo->getInfo(); ?> </p>
    <br>
    <?php

    ?>
</div>
</body>
<footer>
</footer>
</html>