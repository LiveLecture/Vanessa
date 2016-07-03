<?php
	if(session_id()=='') {
		session_start();
	}
	
    if (!isset($_SESSION ["login"])) {
            $_SESSION = array();
            session_destroy();
            header('Location: index.php');
    }



?>