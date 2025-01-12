<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="assets/css/stylewithForm.css">
</head>
<body>
    <div class="container">
        <header class="entete">
            <div id="marque">
                <p id="logo"><a href="index.php">CNTMAD</a></p>
            </div>
            <div id="menu">
            </div>
        </header>
        <section class="principale">
            <div id="conteneur_form">
                <div class="titre">
                    <h1><?=ucfirst($_GET['page']) ?? 'Formulaire' ?></h1>
                </div>
                <?php
                if (!empty($message_error)) {
                    
                ?>
                <div class="error_message">
                    <?php 
                        echo $message_error;
                    ?>
                </div>
                <?php } elseif (!empty($message_success)) {
                    
                ?>
                <div class="success_message">
                    <?php 
                        echo $message_success;
                        echo $lien; 
                    ?>
                </div>
                <?php } ?>
                <div class="champs">
                    <?php 
                        if (isset($_GET['page'])) {
                            require 'src/View/'.$_GET['page'].'.php';
                        }
                        else{
                            echo 'Page innexistante';
                        }
                    ?>
                </div>
            </div>
        </section>
        <footer id="pied">

        </footer>
    </div>
    
</body>
</html>