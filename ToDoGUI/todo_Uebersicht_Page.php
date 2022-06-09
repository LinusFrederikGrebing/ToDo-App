<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo Übersicht - Lernhilfe</title>
    <!-- Absoluten Link für das Stylesheet je nach Umgebung (VM) setzen -->
    <link rel="stylesheet" href="../ToDoGUI/style_todo_Uebersicht_Page.css">
</head>
<header>
<a href="?"><i class="leftArrow"><</i></a>
    <h1>To Do's</h1>
    <form method="post" action="">
        <input type="submit" name="add" value="+" class="plusButton">
    </form>
</header>
<body>
<form action='' method='POST'>

    <?php
    if (sizeof($todoListe) > 0) {
        $i = 0;
        foreach ($todoListe as $row) {
    //hier die idToDo aus der Datenbank holen
    ?>
            <hr>
            <div class='eintragToDo'>

            <input type="checkbox" name="tID[]" value="<?php echo $row->getTID(); //$row['idtodo']; ?>" class="checkboxOfToDo">
            <label for="checkboxOfToDo5">
            <?php
            echo $row->getTitel() . "<br>";
            ?>
            </label>

                <button type="submit" value="<?php echo $i ?>" name="detail"> > </button>


            </div>
    <?php
            $i++;
        }
    }

    echo "<input type='submit' name='delete' value='Löschen' style='float: right'>";
    //error_reporting(0);


    ?>
</form>
</body>
<footer>
</footer>
</html>