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
            include("inc/navbar_loggedin_dozent.php");
            break;
        case 2:
            // TODO: navbar admin
            break;
    }
}
?>

<div id="about" class="container panel hauptbereich seite-fuellen">
    <h1 class="panel-heading col-sm-offset-4 col-sm-4 text-center">Impressum</h1>

    <div class="panel-body col-sm-12 text-center">

        <h3 class="panel-heading">Kontakt</h3>
        <p>
            Online-Medien-Management
        </p>

        <p>
            Nobelstraße 10
            70569 Stuttgart
        </p>

        <p>
            Tel.: 0711/ 892310
        </p>

    </div>

    <div class="panel-body col-sm-12 text-center">

        <h3 class="panel-heading">Verantwortlichkeiten</h3>
        <p>
            Vanessa Allgeyer:   va011@hdm-stuttgart.de
        </p>

        <p>
            Annika Bader:       ab188@hdm-stuttgart.de
        </p>

        <p>
            Anna-Lena Geßler:   ag114@hdm-stuttgart.de
        </p>

    </div>



</div>

<?php include("inc/footer.php") ?>

</body>
</html>



