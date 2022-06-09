<?php

require_once("THM_Mitglied.php");

session_start();

const user = "user";
const password = "password";
const uid = "uid";

if (isset($_POST["logout"])) {
    unset($_SESSION[user]); //Session löschen
}

if (isset($_POST[uid]) && isset($_POST[password])) {
    $uid = $_POST[uid]; // eingegebene User ID wird gesetzt
    $password = $_POST[password]; // eingegebenes Passwort wird gesetzt

    $rolle = sucheRolle($uid, $password); // Rolle des User wird, mit hilfe des Passworts und der uid, gesucht (da die User Rolle bzw. userClass ein privates attribut ist);

    if($rolle != null){
        $_SESSION[user] = new THM_Mitglied($uid, $rolle); //rolle und uid in dem Objekt $user kapseln und Objekt der Session übergeben
    }

}


//Login Funktionen:
function sucheRolle ($uid, $password) {

    $rolle = null;

    // die Rolle des Users suchen, um sie der Session zu übergeben
    $rolle = getUserClassFrom($uid, $password);

    return $rolle;
}


function getUserClassFrom($uid, $password){

// Zugangsdaten zur Datenbank
    $DB_HOST = "localhost"; // Host-Adresse
    $DB_NAME = "lernhilfe"; // Datenbankname
    $DB_BENUTZER = "root"; // Benutzername
    $DB_PASSWORT = ""; // Passwort


    try {
        // Verbindung zur Datenbank aufbauen
        $conn = mysqli_connect($DB_HOST, $DB_BENUTZER, $DB_PASSWORT, $DB_NAME);
        $sqlSelect = "SELECT Rolle FROM thmmitglied WHERE Username = '$uid' and Passwort = '$password';";
        $result = mysqli_query($conn, $sqlSelect);
    }
    catch (PDOException $e) {
        // Bei einer fehlerhaften Verbindung eine Nachricht ausgeben
        exit("Verbindung fehlgeschlagen! " . $e->getMessage());
    }

    error_reporting(0);
    return $result->fetch_row()[0];
}

