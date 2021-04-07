<?php
    ob_start();

    if (isset($_POST['adminConnect'])) {
        if ($_POST['adminLogin'] !== "" && $_POST['adminPassword'] !== "") {   
            include_once($_SERVER['DOCUMENT_ROOT']."/functions/admin/loginAdmin.php");
        }else {
            echo "<p class='error-msg'>Merci de bien vouloir remplir tout les champs.</p>";
        }
    }

    ob_end_flush();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="<?php echo $link ?>/styles/common/loginStyle.css">
		<?php
			include_once($_SERVER['DOCUMENT_ROOT']."/assets/header.php");
		?>
        <title>NewsBullet - Login</title>
    </head>
    <body>
        <main>
            <?php    
                ob_get_contents();
            ?>
            <form method="post">
                <label for="admin-login">Nom d'Utilisateur</label>
                <label for="admin-password">Mot de Passe</label>
                <input id="admin-login" type="text" name="adminLogin" value="">
                <input id="admin-password" type="password" name="adminPassword" value="">
                <input class="connexion-button" type="submit" name="adminConnect" value="Connexion">
            </form>
        </main>        
    </body>
</html>