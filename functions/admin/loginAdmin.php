<?php

    include_once($_SERVER['DOCUMENT_ROOT']."/functions/connexion.php");
    $db = connect();

    $request = "SELECT * FROM admins
                WHERE email = $1 AND password = $2";

    $result =  pg_query_params(
        $db,
        $request,
        array(
            $_POST['adminLogin'],
            hash("sha256", $_POST['adminPassword'])
        )
    );

    $rows = pg_fetch_all($result);

    if (empty($rows)) {
         print "false";
    }else {
          $row = $rows[0];
          $cookieOptions = array (
            'expires' => time() + 60*60*24*30,
            'path' => '/',
            'secure' => true,
            'httponly' => true,
            'samesite' => 'Strict'
        );
        setcookie("SESSION_ID", $row['session_id'], $cookieOptions);
        
        echo "<script>window.location.assign('https://".$_SERVER['HTTP_HOST']."')</script>";
    }

?>