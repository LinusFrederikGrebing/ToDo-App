<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lernhilfe Landing Page</title>
    <link rel="stylesheet" href="landingstyle.css">
</head>
<body id="Hintergrund">


<header>
<nav>
    <form method="post">
            <input type="submit" value="<" id="logout" name="logout">
    </form>
</nav>
    <h1 class="landingPage"> Lernhilfe </h1>
</header>

<main id="landingPage"> 
        <?php
        if ($_SESSION["user"]->getRolle() == "Student") {
            //ToDo Bereich wird zuätzlich geladen gladen
            ?>
            <div class="ToDo">
            <a href="?ToDo">
                <div class="funktionalität" id="ToDo">
                    <div class="fnktText">ToDo's</div>
                </div>
            </a>
            <div>
            <?php
        }
        ?>
    </div>
</main>

<footer>
    <div id="footerText">
      <p>Ein SW-Projekt des Fachbereichs IEM/MND</p>
    </div>
</footer>


</body>

</html>