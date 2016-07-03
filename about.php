<?php require_once("inc/session_allgemein.php"); ?>


<!DOCTYPE html>
<html>

<?php include("inc/head.php"); ?>

<body>

<?php
if (!isset($_SESSION["login"])) {
    include("inc/navbar_loggedout.php");
} else {
    switch (isset($_SESSION["login"])) {
        case 1:
            $_SESSION ["login"] = 1;
            include("inc/navbar_loggedin_dozent.php");
            break;
        case 2:
            $_SESSION ["login"] = 2;
            include("inc/navbar_loggedin_admin.php");
            break;
    }
}
?>

<div id="about" class="container panel hauptbereich seite-fuellen">
    <h1 class="panel-heading col-sm-offset-4 col-sm-4 text-center">About us</h1>

    <div class="panel-body col-sm-12">
        <p>
            Unser Team besteht aus drei Studentinnen des Studiengangs Online-Medien-Management an, die im
            Web-/Medienprojekt dieses Abstimmungstool für Dozenten entwickelt hat. Auf unserer Website haben Dozenten
            die Möglichkeit mit den Studierenden in Echtzeit zu interagieren. Dabei bekommt jeder Dozent persönliche Zugangsdaten,
            mit denen er sich in seinem LiveLecture-Bereich bewegen kann. Es besteht die Möglichkeit für jede Lehrveranstaltung
            beliebig viele Umfragen anzulegen und diese in der Lehrveranstaltung live freizuschalten. Dabei kann vom Dozent
            zusätzlich ein Bild hochgeladen werden, das die Frage der Abstimmung unterstützt. Der Nutzen der Lehrveranstaltung
            kann durch LiveLecture gesteigert werden, indem der Dozent die Studierenden aktiv in die Lehrveranstaltung miteinbezieht
            und damit die Motivation zur allgemeinen Beteiligung steigert. Zudem kann er die Inhalte seiner Lehrveranstaltung an den,
            durch die Umfragen gezeigten Wissensstand der Studierenden anpassen und ebenso die bisherigen Resultate analysieren.
            Ebenso eignet sich dieses Tool zu Evaluationszwecken, da die Studierenden unabhängig, schnell und anonym ihre
            Meinung zu Themen äußern können.
        </p>

    </div>

</div>

<?php include("inc/footer.php") ?>

</body>
</html>



