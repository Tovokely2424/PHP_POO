<?php
    require 'config/DB_conect.php';
    require 'src/Model/Utilisateur.php';
    require 'src/model/UtilisateurManager.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP Gestion espace membre en POO</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <?php
            include 'src/View/header.php';
        ?>
        <section class="principale">
            <div class="container_body">
                <div class="head_body">

                </div>
                <div class="realcontent">
                    <div id="menu_body">
                        <h3>Menu de notre Site</h3>
                        <ol>
                            <?php
                            if (isset($_SESSION['id'])) {
                            ?>
                            
                            <li><a href="admin.php">Admin</a></li>
                           <?php } ?>
                            <li><a href="membre.php">Membre</a></li>
                            <li><a href="">Table de matières</a></li>
                        </ol>
                    </div>
                    <article class="article">
                        <h3>Titre de ce contenu</h3>
                        <p>
                            Ici on affiche notre article.
                        </p>
                    </article>
                </div>
            </div>
        </section>
        <footer id="pied">

        </footer>
    </div>
    
</body>
</html>