<?php
require_once("../Logik/ToDo_Logik.php");

$todoListe = todoListeErstellen();
error_reporting(0);


const delete = "delete";
const tID = "tID";
const add = "add";
const detail = "detail";
const back = "back";
const titel = "titel";

//GUI Funktionen:
if(isset($_POST[delete])) {
    if (isset($_POST[tID])) {
        todoLöschen($_POST[tID]);
        //header('Location:./?ToDo'); /*aktuelle seite wird geladen mit "ToDo" als GET Parameter im Link
        unset($_POST[delete]);
        header('Location:./?ToDo');
        return;
    } else {
        $_POST[delete] = false;
    }
    //todoLöschen($todoListe[$_POST[delete]]->getTID());
    //ToDo Liste anzeigen:
    unset($_POST[delete]);
} else if(isset($_POST[add])) {
    $_SESSION[add] = true;
} else if(isset($_POST[detail])){
    $_SESSION[detail] = $todoListe[$_POST[detail]];
}


if(isset($_SESSION[add])) {
    if(isset($_POST[titel])) {
        if(empty($_POST[titel])) {
            $_SESSION[add] = false;
            header('Location:./?ToDo'); /*aktuelle seite wird geladen mit "ToDo" als GET Parameter im Link */
            return;
        } else {
            todoAnlegen($_POST[titel], $_POST["deadline"], $_POST["zeitspanne"], $_POST["info"]);

            //Seiteninhalt (neu) Laden, z.B. unset($_POST["add"])
                unset($_SESSION[add]);
                header('Location:./?ToDo');
                return;
        }
    } else if(isset($_POST[back])) {
        unset($_SESSION[add], $_POST[add], $_POST[back]);
        header('Location:./?ToDo');
        return;
    } else {
        if($_SESSION[add]) {
            addToDoFormAnzeigen();
            if($_SESSION["toMuchToDo"]) {
                echo "Fehler: du hast zu viele ToDo's";
            }
        } else {
            // und das Formular weiterhin anzeigen bzw. Formular mit Fehlermeldung anzeigen:
            addToDoFormAnzeigen();
            echo "Fehler: Trage einen Titel ein!";
        }
    }
} else if(isset($_SESSION[detail])) {
    if(isset($_POST[back])) {
        unset($_POST[detail], $_POST[back], $_SESSION[detail]);
        header('Location:./?ToDo');
        return;
    }
    ToDoInhaltAnzeigen($_SESSION[detail]);
} else {
    todoListeAnzeigen($todoListe);
    if(isset($_POST[delete])) {
        if(!$_POST[delete]) {
            print "Es wurde kein ToDo ausgewählt";
        }
    }
    
} 


function todoListeAnzeigen($todoListe) {
    //Liste mit HTML Komponenten anzeigen
    require_once("../ToDoGUI/todo_Uebersicht_Page.php");
}

function addToDoFormAnzeigen( /* falls Feature ein ToDo bearbeiten implementiert werden soll: $titel = null, $deadline = null, $zeitspanne = null, $info = null */ ) {
    //(POST) Formular mit HTML komponenten anzeigen
    require_once("../ToDoGUI/todo_Anlegen.php");
}

function ToDoInhaltAnzeigen($todo) {
    //ToDo Parameter (titel, deadline, zeitspanne, info) anzeigen in Form von HTML Komponenten
    include_once("../ToDoGUI/todo_Detailsicht.php");
}
