<?php
require_once("ToDo.php");

    const toMuchToDo = "toMuchToDo";


//ToDo Logik Funktionen:
function todoListeErstellen() {
    //Array mit ToDo objekten füllen (schrittweise mit einer Schleife)
    //ToDo werden mit ToDo Nutzer Daten aus der DB grfüllt (mit einer Schleife

    //DB gibt 2D assoziatives Array (Map) zurück

    // Zugangsdaten zur Datenbank
    $DB_HOST = "localhost"; // Host-Adresse
    $DB_NAME = "lernhilfe"; // Datenbankname
    $DB_BENUTZER = "root"; // Benutzername
    $DB_PASSWORT = ""; // Passwort


    try {
        // Verbindung zur Datenbank aufbauen
        $conn = mysqli_connect($DB_HOST, $DB_BENUTZER, $DB_PASSWORT, $DB_NAME);
        $user = $_SESSION[user]->getUid();
        $sqlSelect = "Call toDoAuslesen('$user');";
        $result = mysqli_query($conn, $sqlSelect);
        //$resultCheck = mysqli_num_rows($result);
    }
    catch (PDOException $e) {
        // Bei einer fehlerhaften Verbindung eine Nachricht ausgeben
        exit("Verbindung fehlgeschlagen! " . $e->getMessage());
    }


    $todoListe = array(
        //new ToDo($tID, $title, $deadline, $zeitspanne, $info);
        //...
    );

    while($row = $result->fetch_row()) {
        $todoListe[] = new ToDo($row[0], $row[1], $row[2], $row[3], $row[4]);
        //print_r($row);
    }



    return $todoListe;
    //möglichkeit zum Sortieren, nach nächster Deadline:
    //return quicksort($todoListe);
}

function quicksort($array) {
    if (count($array) < 2) {
        return $array;
    }
    $left = $right = array();
    reset($array);
    $pivot_key = key($array);
    $pivot = array_shift($array);
    foreach ($array as $k => $v) {
        if ($v->getDeadline() <= $pivot->getDeadline()) {
            $left[$k] = $v;
        } else {
            $right[$k] = $v;
        }
    }
    return array_merge(quicksort($left), array($pivot_key => $pivot), quicksort($right));
}


function todoAnlegen($title, $deadline = null, $zeitspanne = null, $info = null) {
    // Zugangsdaten zur Datenbank
    $DB_HOST = "localhost"; // Host-Adresse
    $DB_NAME = "lernhilfe"; // Datenbankname
    $DB_BENUTZER = "root"; // Benutzername
    $DB_PASSWORT = ""; // Passwort
    try {
        // Verbindung zur Datenbank aufbauen
        $conn = mysqli_connect($DB_HOST, $DB_BENUTZER, $DB_PASSWORT, $DB_NAME);
        $user = $_SESSION[user]->getUid();
        $sqlSelect = "Call MAXToDo('$user');";          
        $result = mysqli_query($conn, $sqlSelect);
        //$resultCheck = mysqli_num_rows($result);
    }
    catch (PDOException $e) {
        // Bei einer fehlerhaften Verbindung eine Nachricht ausgeben
        exit("Verbindung fehlgeschlagen! " . $e->getMessage());
    }

    $maxToDo = $result->fetch_row()[0];
    if($maxToDo < 20 ) {
        $_SESSION[toMuchToDo] = false;

        $conn = mysqli_connect($DB_HOST, $DB_BENUTZER, $DB_PASSWORT, $DB_NAME);
        $user = $_SESSION[user]->getUid();
        $sqlInsert = "Call InsertIntoToDo('$user', '$title', '$deadline', '$zeitspanne', '$info');";
        $result = mysqli_query($conn, $sqlInsert);

    } else {
        $_SESSION[toMuchToDo] = true;
    }

}

function todoLöschen($tIDs){
    // Zugangsdaten zur Datenbank
    $DB_HOST = "localhost"; // Host-Adresse
    $DB_NAME = "lernhilfe"; // Datenbankname
    $DB_BENUTZER = "root"; // Benutzername
    $DB_PASSWORT = ""; // Passwort

    try {
        // Verbindung zur Datenbank aufbauen
        $conn = mysqli_connect($DB_HOST, $DB_BENUTZER, $DB_PASSWORT, $DB_NAME);
        $user = $_SESSION[user]->getUid();
        foreach ($tIDs as $tID) {
            $sqlSelect = "Call DeleteToDo('$user', '$tID');";
            $result = mysqli_query($conn, $sqlSelect);
            //$resultCheck = mysqli_num_rows($result);
        }
    }
    catch (PDOException $e) {
        // Bei einer fehlerhaften Verbindung eine Nachricht ausgeben
        exit("Verbindung fehlgeschlagen! " . $e->getMessage());
    }

}

?>