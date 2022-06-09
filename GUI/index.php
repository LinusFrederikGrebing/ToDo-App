<?php
require_once("../Login/Login_Logik.php");
if (isset($_SESSION["user"])) {
    if(isset($_GET["ToDo"])) {
        require_once("ToDo_GUI-Logik.php");
    } else {
        //Die Landingpage (PHP mit HTML framework) laden
        require_once("Landing_GUI.php");
        if(isset($_SESSION["add"])){
            unset($_SESSION["add"]);
        }
        if(isset($_SESSION["detail"])){
            unset($_SESSION["detail"]);
        }
    }
} else {
    //Login HTML Seite (PHP mit HTML framework) mit PostFoumular laden:
    // Bsp.
    if(isset($_GET_["registr"])){
        require_once("");
    } else {
        require_once("Login_GUI.php");
    }
}
?>
