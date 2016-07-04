<?php
    require_once("Mapper/DozentManager.php");
    require_once("Mapper/AdminManager.php");
    require_once("Mapper/ErrorHandler.php");
 
    $errorHandler = new ErrorHandler();
 
    if(!isset($_POST["login"]) || !isset($_POST["password"])) {
        $errorHandler->storeError("fehler", "Es wurden nicht alle POST Felder angegeben. Bitte wenden Sie sich an den Administrator.");
        header("Location: fehler.php");
        exit();
    }
 
    if(session_id()=="") {
        session_start();
    }
 
    $login = htmlspecialchars($_POST["login"], ENT_QUOTES, "UTF-8");
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");
 
    if(!empty($login) && !empty($password)) {
        $dozentManager = new DozentManager();
        $dozent = $dozentManager->findByLogin($login, $password);
 
        if($dozent == null) {
            $adminManager = new AdminManager();
            $admin = $adminManager->findByLogin($login, $password);
 
            if($admin == null) {
                $errorHandler->storeError("login", "Die Logindaten stimmen mit keinem Benutzer überein!");
                header('Location: index.php');
                exit();
            }
 
            $_SESSION ['admin'] = $admin;
            $_SESSION ['login'] = 2;
 
            header('Location: dozentuebersicht.php');
            exit();
        }
        $_SESSION ['dozent'] = $dozent;
        $_SESSION ['login'] = 1;
 
        header('Location: vorlesungsverzeichnis.php');
    } else {
        $errorHandler->storeError("login", "Bitte alle Felder ausfüllen!");
 
        header('Location: index.php');
    }
?>
