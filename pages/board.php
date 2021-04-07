<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="<?php echo $link ?>/styles/common/boardStyle.css">
        <script>
			var server = "https://" + window.location.hostname;
        </script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<?php
			include_once($_SERVER['DOCUMENT_ROOT']."/assets/header.php");
		?>
        <title>NewsBullet - Board</title>
    </head>
    <body>
        <main>
            <ul>
                <li>
                    <?php
                        include_once($_SERVER['DOCUMENT_ROOT']."/assets/sections/contacts.php");
                    ?>
                </li>
                <li>
                    <?php
                        include_once($_SERVER['DOCUMENT_ROOT']."/assets/sections/listing.php");
                    ?>
                </li>
                <li>
                    <?php
                        include_once($_SERVER['DOCUMENT_ROOT']."/assets/sections/campaign.php");
                    ?>
                </li>
            </ul>
        </main>
        <script>
            listingUpdated()
            contactsUpdated()
            campaignsUpdated()
		</script>
		<script type="text/javascript" src="<?php echo $link ?>/scripts/board.js"></script>
    </body>
</html>